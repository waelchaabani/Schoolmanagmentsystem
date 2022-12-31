<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Http\Requests\SubjectRequest;
use App\Repository\SubjectRepository;
use App\Models\Teacher;

class subjectController extends Controller
{
    protected $Subject;

    public function __construct(SubjectRepository  $Subject)
    {
        $this->Subject = $Subject;
    }

    public function index()
    {
        $Subjects = $this->Subject->getAllSubjects();
        $students = new Student();
        $totalStudents = $students->count();
        $accountModel = new Account();
        $totalAccount = $accountModel->count();
        $totalTeacher = Teacher::count();


        return view('subjectDashboard', compact('Subjects', 'totalStudents', 'totalAccount', 'totalTeacher'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $teachers = Teacher::all();

        return view('addNewSubject', compact('subjects', 'teachers'));
    }


    public function store(SubjectRequest $request, SubjectRepository $repository)
    {
        return $this->Subject->StoreSubjects($request);
    }

    public function update(SubjectRequest $request, Subject $subjects)
    {
        return $this->Subject->update($subjects, $request->validated());
    }

    public function show($id)
    {
    }


    public function edit($id)
    {
        $subjects = $this->Subject->editSubjects($id);

        return view('updateSubject', compact('subjects'));
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Subject $subjects)
    {
        return $this->Subject->DeleteSubjects($subjects);
    }
}
