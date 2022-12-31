<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Classes;
use App\Http\Requests\TeacherRequest;
use App\Repository\TeacherRepository;

class teacherController extends Controller
{
    protected $Teacher;

    public function __construct(TeacherRepository  $Teacher)
    {
        $this->Teacher = $Teacher;
    }

    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        $accountModel = new Account();
        $totalAccounts = $accountModel->count();
        $studentModel = new Student();
        $totalStudents = $studentModel->count();
        $teacherModel = new Teacher();
        $totalTeachers = $teacherModel->count();
        $teachers = Teacher::with('subject')->get();


        return view('TeacherDashboard', compact('teachers', 'Teachers', 'totalAccounts', 'totalStudents', 'totalTeachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $classes=Classes::all();

        return view('addNewTeacher', compact('subjects', 'classes'));
    }


    public function store(TeacherRequest $request, TeacherRepository $repository)
    {
        $validated = $request->validated();
        $teachers=$repository->StoreTeachers($validated);
            toastr()->success('messages.success');
            return redirect('teachers')->with('success', 'Teachers created successfully.');
    }


    public function update(TeacherRequest $request, Teacher $teachers)
    {
        return $this->Teacher->update($teachers, $request);
    }


    public function edit($id)
    {
        $subjects = Subject::all();
        $teachers = $this->Teacher->editTeachers($id);
        $teacher = Teacher::all();
        $classes=Classes::all();
        return view('updateTeacher', compact('teachers', 'teacher', 'subjects', 'classes'));
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Teacher $teachers)
    {
        return $this->Teacher->DeleteTeachers($teachers);
    }
}
