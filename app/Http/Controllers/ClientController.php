<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index (){
        $rooms = Room::where('state', 1)->latest()->paginate(20);

        return view('client.home', [ 'data' => $rooms ]);
    }
}
