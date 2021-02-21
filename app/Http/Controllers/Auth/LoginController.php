<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


//    public function showAdminLoginForm()
//    {
//
//        return view('auth.login',[ 'role' => 'admin']);
//    }
//
//    public function adminLogin(Request $request)
//    {
//
//
//        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
////            dd('ok');
//            return redirect()->route('dashboard');
//        }
//        else{
//            dd('failed');
//            return back()->withInput($request->only('email'));
//        }
//
//    }
}
