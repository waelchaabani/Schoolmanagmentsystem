<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Http\Requests\StudentRequest;
use App\Repository\StudentRepository;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Classes;

class studentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = new Student();
        $totalStudent = $students->count();
        $accountModel = new Account();
        $totalAccount = $accountModel->count();
        $teacherModel = new Teacher();
        $totalTeacher = $teacherModel->count();
        return view('dashboard', compact('totalStudent', 'totalAccount', 'totalTeacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
         $classes = Classes::get();

         return view('addNewStudent', compact('classes'));
     }

    /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\StudentRequest  $request
      * @return \Illuminate\Http\Response
      */

    public function store(StudentRequest $request, StudentRepository $studentRepository)
    {
        $validated = $request->validated();
        $student = $studentRepository->create($validated);
        return redirect('MainDashboard')->with('success', 'Student created successfully.');
    }



    /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
    public function show(Student $student)
    {
        $teacher = $student->teacher;
        $classes = Classes::all();

        return view('addNewStudent', compact('student', 'teacher', 'classes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $students)
    {
        $classes = Classes::get();

        return view('updateStudent', ['students'=>$students], compact('classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StudentRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function update(StudentRequest $request, Student $students)
     {
         $this->studentRepository->update($students, $request->validated());
         return redirect('MainDashboard')->with('success', 'Student Updated successfully.');
     }




    /**
          * Remove the specified resource from storage.
          *
          * @param  int  $id
          * @return \Illuminate\Http\Response
          */
    public function destroy(Student $students)
    {
        $students->delete();
        return redirect('MainDashboard')->with('warning', 'Student Deleted successfully.');
    }
}
