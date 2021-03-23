<?php

namespace App\Http\Controllers;
use App\User;
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

    public function update (Request $request) {

        $user = User::findorFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->birthday = $request->birthday;
        $user->sex = $request->sex;
        $user->save();
        if ($user->save()){
            Session::flash('success', $user->name.' cập nhật thành công!');
            return redirect()->route('client.profile');
        }else {
            Session::flash('error', $user->name.' cập nhật thất bại!');
            return redirect()->route('client.profile');
        }


    }
    public function showProfile ()
    {

        $room_books = User::findorFail(Auth::user()->id)->roomBook;
//        dd($room_books);
        return view('client.users.profile', [ 'room_books' => $room_books ]);
    }

    public function roomBookStore (Request $request){

//        $request->validate([
//            'start_date' => 'after:yesterday|before_or_equal:tomorrow'
//        ],[
//            'start_date.after' => 'Chỉ có thể bắt đầu từ hôm nay trở đi.',
//            'start_date.before_or_equal' => 'Chỉ đặt trước 1 ngày'
//        ]);

            //        $request->validate([
//            'start_date' => 'after:tomorrow',
//            'end_date' => 'after:start_date'
//        ],[
//            'start_date.after' => 'Ngày bắt đầu không đúng.',
//            'end_date.after' => 'Ngày kết thúc không đúng.'
//        ]);

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
                return redirect()->route('client.profile');
            }else {
                Session::flash('error', ' Đăng ký phòng thất bại!');
                return redirect()->route('client.profile');
            }
            return redirect()->route('client.profile');
        }


    }
}
