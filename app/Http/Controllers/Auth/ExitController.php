<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\Account;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\password_hash;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\session;

class ExitController extends Controller
{
   
    public function logOutUser(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');

        // if (session()->has('loginName')) {
        //     session()->pull('loginName');
        //     return redirect('/');
        // }
    }
}
