<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class SettingsController extends Controller
{
    //
    public function editSettings(Account $account)
    {
        return view('updateSettings', ['account'=>$account]);
    }
    public function updateSettings(Request $request, Account $account)
    {
        $updateAccount = Account::find($account->id);

        if($request->has('password')){
            $updateAccount->update([
                'fullName'=>$request->fullName,
                'username'=>$request->username,
                'email'=>$request->email,
                'password'=>bcrypt($request->password)
            ]);
        }else{
            $updateAccount->update([
                'fullName'=>$request->fullName,
                'username'=>$request->username,
                'email'=>$request->email,
            ]);
        }
        return redirect('MainDashboard');
    }
    public function deleteAccount(Account $account)
    {
        $account->delete();
        return redirect('MainDashboard');
    }
    // END ADMIN Account
}
