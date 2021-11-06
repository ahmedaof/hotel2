<?php

namespace App\Http\Controllers\controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
  public function index(){
      $room = Room::with('location')->get();
      return response()->json($room);
  }


  public function store(Request $request){
    $room = new Room();
    if($request->bookingType == 'single'){
      $available = $request->number;
    }elseif($request->bookingType == 'dpuble'){
      $available = ($request->number)*2;
    }elseif($request->bookingType == 'suite'){
      $available = ($request->number)*3;
    }
    $room->number = $request->number;
    $room->status = $request->status;
    $room->price = $request->price;
    $room->bookingType = $request->bookingType;
    $room->location_id = $request->location;
    $room->available =$available;

    $room->name = $request->name;
    
    $room->save();  
  }
}
