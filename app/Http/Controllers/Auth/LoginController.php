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

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function loginFunction(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        $account = Account::where('email', '=', $request->email)->first();
        if ($account) {
            if (Hash::check($request->password, $account->password)) {
                $role = Account::where('role', '=', 'ADMIN');
                if ($role) {
                    $request->session()->put('loginName', $account->fullName);
                    return redirect('MainDashboard');
                } else {
                    return back()->with('fail', 'Your Account Only Have Access To VIEW !');
                }
            } else {
                return back()->with('fail', 'Wrong Password Entered, Please Try Again!');
            }
        } else {
            return back()->with('fail', 'This Email Address Is NOT Registered!');
        }
    }
    public function showlogin()
    {
        return view('auth.login');
    }
    public function logOutUser()
    {
        if (session()->has('loginName')) {
            session()->pull('loginName');
            return redirect('/');
        }
    }
}
