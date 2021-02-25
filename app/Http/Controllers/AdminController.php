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

    public function payment ($id) {

        $roombook = RoomBook::findorFail($id);
        $start_date = new Carbon($roombook->start_date);
        $timeNow = Carbon::now();
        $number =  $timeNow->diffInDays($start_date);
        $price = $roombook->room->price;
        $totalPrice = $number * $price;
        $roombook->timeNow = $timeNow->toDateString();
        $roombook->totalPrice = $totalPrice;

        dd($roombook);


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
            if (Auth::user()->role != 'GUEST') {
                return redirect()->route('dashboard');
            }else{
                return redirect()->route('client.home');
            }

        }
        else {
            return redirect()->back()->with('msg', 'tên đăng nhập  hoặc mật khẩu không chính xác');
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
