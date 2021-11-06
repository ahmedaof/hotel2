<?php

namespace App\Http\Controllers\controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index(){
        $location = Location::get();
        return response()->json($location);
    }
    public function store(Request $request){
        $location = new Location();
  
        $location->location = $request->location;
        $location->branch = $request->branch;
     
      
        
        $location->save();  
      }
}
