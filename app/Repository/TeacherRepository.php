<?php

namespace App\Repository;

use App\Models\Teacher;
use App\Models\Subject;
use App\Models\Teacher_subject;
use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use Illuminate\Support\Facades\DB;

class TeacherRepository
{
    public function getAllTeachers()
    {
        return Teacher::all();
    }

    
    // public function StoreTeachers($request)
    // {

    //     try {
    //         Teacher::create([
               
    //             'firstname' =>$request->firstname,
    //           'secondname' =>$request->secondname,
    //           'age' => $request->age,
    //           'gender' =>$request->gender,
    //           'subject_id' =>$request->subject_id,
    //           'class_id' =>$request->class_id,
    //           'phonenumber'=>$request->phonenumber,
    //           'Address' =>$request->Address,
    //         ]);
            

    //         toastr()->success('messages.success');
    //         return redirect('teachers')->with('success', 'Teachers created successfully.');
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    //     }
    // }
    public function StoreTeachers(array $data)
    {
        return Teacher::create($data);
    }


      public function editTeachers($id)
      {
          return Teacher::findOrFail($id);
      }


   
        public function update(Teacher $teacher, TeacherRequest  $request)
        {
            $teacher->update($request->all());
            return redirect('teachers')->with('success', 'Teacher updated successfully.');
        }


      public function DeleteTeachers($request)
      {
          Teacher::findOrFail($request->id)->delete();
          toastr()->error('messages.Delete');
          return redirect('teachers')->with('warning', 'Teachers Deleted successfully.');
      }
}
