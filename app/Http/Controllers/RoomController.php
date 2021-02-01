<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    public function index (){

        $rooms = Room::latest()->paginate(20);
        return view('admin.rooms.index', [ 'data' => $rooms ]);
    }

    public function create () {

        return view('admin.rooms.create');

    }

    public function store ( Request $request) {
//        dd($request->all());
//        $request->validate(
//            [
//                'name' => 'required',
//                'email' => 'required|email',
//            ],
//            [
//                'name.required' => 'Tên không được để trống',
//                'email.required' => 'Email không được để trống',
//                'email.email' => 'Email chưa đúng định dạng'
//            ]);


       $room = new Room();
       $room->name = $request->name;
       $room->state = true;
       $room->description = $request->description;
       $room->category = $request->category;

       $room->save();

       return redirect()->route('admin.room.index');

    }

    public function edit ($id) {

        $room = Room::findorFail($id);
        return view('admin.rooms.edit',[ 'room' => $room ]);
    }

    public function update (Request $request, $id) {

        $room = Room::findorFail($id);
        $room->name = $request->name;
        $room->state = true;
        $room->description = $request->description;
        $room->category = $request->category;

        $room->save();
        if (  $room->save()) {
            Session::flash('success', $room->name.' cập nhật thành công!');
            return redirect()->route('admin.room.index');
        }else {
            Session::flash('error', $room->name.' cập nhật thất bại!');
            return redirect()->route('admin.room.index');
        }
    }

    public function destroy ($id) {
        Room::destroy($id);
        // Trả về dữ liệu json và trạng thái kèm theo thành công là 200
        $dataResp = [
            'status' => true
        ];

        return response()->json($dataResp, 200);
    }
}

