<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class classesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accountModel = new Account();
        $totalAccounts = $accountModel->count();
        $studentModel = new Student();
        $totalStudents = $studentModel->count();
        $teacherModel = new Teacher();
        $totalTeachers = $teacherModel->count();
        return view('classDashboard', compact('totalAccounts', 'totalStudents', 'totalTeachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addNewClass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $classes = new Classes($request->validate([
         'class'=>'required',
         'group'=>'required'
        ]));
        $classes->save();
        return redirect('class')->with('success', 'Class created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        return view('updateClass', ['classes'=>$classes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        $classes->update($request->all());
        return redirect('class')->with('success', 'Classes Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        $classes->delete();
        return redirect('class')->with('warning', 'Classes Deleted successfully.');
    }
}
