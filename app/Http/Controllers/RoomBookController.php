<?php

namespace App\Http\Controllers;

use App\Room;
use App\RoomBook;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roombook = RoomBook::where('state' ,'<', 3 )->latest()->paginate(20);

        return view('admin.room_book.index', [ 'data' => $roombook]);
    }


    public function paymentForm ($id) {

        $roombook = RoomBook::findorFail($id);
        $start_date = new Carbon($roombook->start_date);
        $timeNow = Carbon::now();
        $number =  $timeNow->diffInDays($start_date);
        $price = $roombook->room->price;
        $totalPrice = $number * $price;
        $roombook->timeNow = $timeNow->toDateString();
        $roombook->totalPrice = $totalPrice;
        $roombook->cashier = Auth::user()->id;

        return view('admin.room_book.pay', [ 'data' => $roombook ]);


    }
    public function  payment (Request  $request, $id)
    {
//        dd($request->all());
        $roombook = RoomBook::findorFail($id);
        $roombook->cashier = Auth::user()->id;
        $roombook->end_date = $request->end_date;
        $roombook->total_price = $request->totalPrice;
        $roombook->state = 3;
        $roombook->save();
        if (  $roombook->save()) {
            $room = Room::findorFail($roombook->room_id);
            $room->state = 1;
            $room-> save();
            Session::flash('success', ' Khách hàng '.$roombook->khachhang->name.' thanh toán thành công!');
            return redirect()->route('admin.room.index');
        }else {
            Session::flash('error',  'khách hàng '.$roombook->khachhang->name.' thanh toán thất bại');
            return redirect()->route('admin.room.index');
        }
        return redirect()->route('admin.room-book.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics ()
    {

        $roombook = RoomBook::where('state' , 3 )->latest()->paginate(20);
        $price = 0;
        foreach ( $roombook as $key => $item){
           $price = $price + $item->total_price;
        }
        return view('admin.statistics.index', [ 'data' => $roombook , 'total_price' => $price]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
//        $id = $request->id;
//        $roomBook = RoomBook::findorFail($id);
//        $roomBook->state = 1;
//        $roomBook->save();
//
//        return redirect()->route('admin.room_book.index');
    }

    public function approveRoomBook(Request $request)
    {

        $id = $request->id_room_book;
        $roomBook = RoomBook::findorFail($id);
        $roomBook->state = 1;
        $roomBook->employee_id = Auth::user()->id;
        $roomBook->save();
        return redirect()->route('admin.room-book.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
