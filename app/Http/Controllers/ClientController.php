<?php

namespace App\Http\Controllers;
use Session;
use App\Room;
use App\RoomBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index (){
        $rooms = Room::where('state', 1)->latest()->paginate(20);

        return view('client.home', [ 'data' => $rooms ]);
    }

    public function registerForm(){
        return view('auth.register');
    }
    public function roomBookStore (Request $request){

        $user_id = Auth::user()->id;
        $room_book = new RoomBook();
        $room_book->room_id = $request->room_id;
        $room_book->start_date = $request->start_date;
        $room_book->user_id = $user_id;
        $room_book->state = 0;

        $room_book->save();

        if ($room_book->save()){
            $room = Room::findorFail($request->room_id);
            $room->state = 0;
            $room->save();
            if ( $room->save()){

                Session::flash('success',' Đăng ký phòng thành công!');
                return redirect()->route('client.home');
            }else {
                Session::flash('error', ' Đăng ký phòng thất bại!');
                return redirect()->route('client.home');
            }
            return redirect()->route('client.home');
        }


    }
}
