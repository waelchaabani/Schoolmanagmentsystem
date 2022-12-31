<?php

namespace App\Repository;

use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectRepository
{
    public function getAllSubjects()
    {
        return Subject::all();
    }

      public function StoreSubjects($request)
      {
          try {
              Subject::create([
                  'subject'=>$request->subject,
              ]);


              toastr()->success('messages.success');
              return redirect('subject')->with('success', 'subject created successfully.');
          } catch (\Exception $e) {
              DB::rollback();
              return redirect()->back()->withErrors(['error' => $e->getMessage()]);
          }
      }


      public function editSubjects($id)
      {
          return Subject::findOrFail($id);
      }

        public function update(Subject $subject, array $data)
        {
            $subject->update($data);
            toastr()->error('messages.Delete');
            return redirect('subject')->with('success', 'subject Updated successfully.');
        }



      public function DeleteSubjects($request)
      {
          Subject::findOrFail($request->id)->delete();
          toastr()->error('messages.Delete');
          return redirect('subject')->with('warning', 'subject Deleted successfully.');
      }
}
