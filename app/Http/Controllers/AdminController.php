<?php

namespace App\Http\Controllers;

use App\RoomBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index () {
        return view('admin.layouts.main');
    }

    public function showAdminLoginForm()
    {

        return view('auth.login');
    }



    public function postLogin(Request $request)
    {
        //validate du lieu
//        $request->validate([
//            'email' => 'required|string|email|max:255',
//            'password' => 'required|string|min:6'
//        ]);

        $data = [
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ];

        // check success
        if (Auth::attempt($data)) {
            if (Auth::user()->state == 0){
                return redirect()->route('admin.login')->with('erorr' , 'tài khoản đã bị khóa hãy liên lạc với bạn quản trị để giải quyết');
            }
            if (Auth::user()->role != 'GUEST') {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('client.home');
            }

        }
        else {
            return redirect()->back()->with('error', 'Tên đăng nhập  hoặc mật khẩu không chính xác');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
