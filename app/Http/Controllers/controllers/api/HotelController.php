<?php

namespace App\Http\Controllers\controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelController extends Controller
{
    public function index(){
        $hotel = Hotel::with('location')->get();
        return response()->json($hotel);
    }
    public function store(Request $request){
        $hotel = new Hotel();
        $hotel2 = Hotel::get();
        $hotel->location_id = $request->location;
        $hotel->bookingType = $request->bookingType;
        $hotel->name = $request->name;

        foreach($hotel2 as $hotel1)
        if($hotel1->name == $request->name){

            $hotel->discount =5;
        }else{
            $hotel->discount = 0;
        }
     
      
        
        $hotel->save();  
      }


      public function logout(){
          Auth::logout();
      }
}
