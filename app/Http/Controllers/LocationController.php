<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function addLocation(Request $request){
        
        $request->validate([
            "code"      => 'required',
            "country"   => 'required',
            "address_1" => 'required',
            "address_2" => 'required',
            "city"      => 'required',
            "zone"      => 'required',
            "state"     => 'required',
            "zipcode"   => 'required',
            "lat"       => 'required',
            "lng"       => 'required',
            "type"      => 'required',
            "added_by"  => 'required|exists:users,id'         
        ]);
        $location            = new Location();
        $location->code      = $request->code;
        $location->country   = $request->country;
        $location->address_1 = $request->address_1;
        $location->address_2 = $request->address_2;
        $location->city      = $request->city;
        $location->zone      = $request->zone;
        $location->state     = $request->state;
        $location->zipcode   = $request->zipcode;
        $location->lat       = $request->lat;
        $location->lng       = $request->lng;
        $location->type      = $request->type;
        $location->added_by  = $request->added_by;
        $location->save();
        return response()->json([
            "status" => 1,
            "message" => "Location added successfully",                
        ]);
    }
}
