<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\products;
use DB;

class ItemController extends Controller
{
    public function addItem(Request $request){
        
        $request->validate([
            "item_type"   => 'required',
            "location_id" => 'required|exists:locations,id',
            "tradeable"   => 'required',
            "user_id"     => 'required|exists:users,id',
            "status"      => 'required',            
            "is_active"   => 'required'
        ]);
        $item              = new Item();
        $item->item_type   = $request->item_type;
        $item->location_id = $request->location_id;
        $item->tradeable   = $request->tradeable;
        $item->user_id     = $request->user_id;
        $item->status      = $request->status;
        $item->is_active   = $request->is_active;
        $item->save();
        return response()->json([
            "status"  => 1,
            "message" => "Item added successfully",                
        ]);

     }
     public function allItem(){
        $result = Item::with(['location','user'])
                ->join('files','files.item_id',"=","items.id")
                ->join('products','products.item_id',"=","items.id")
                ->get(['items.*','files.file','products.*']);
        // $result = Item::with(['location','user'])
        //              ->rightJoin('products','items.id','=','products.item_id')
        //              ->get();   

        return response()->json([               
            "Results" => $result,                
        ]);
     }
}
