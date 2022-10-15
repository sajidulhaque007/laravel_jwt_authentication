<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Files;

class FileController extends Controller
{
    public function addFile(Request $request){
        $request->validate([
            "item_id"    => 'required|exists:items,id',
            "file"       => 'required',       
            "is_primary" => 'required'
        ]);
        $files             = new Files();
        $files->item_id    = $request->item_id;
        $files->file       = $request->file;
        $files->is_primary = $request->is_primary;
        $files->save();
        return response()->json([
            "status"  => 1,
            "message" => "Files added successfully",                
        ]);
     }
}
