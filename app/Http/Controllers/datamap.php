<?php

namespace App\Http\Controllers;

use App\data_map;
use DB;
use App\move_control;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class datamap extends Controller
{
    public function update_datamap(Request $request){
        $data = data_map::latest('ID')->get();
        $data1 = data_map::latest('ID')->first();
        $data1 = $data1 -> ID;
        if ($data1 >= 5000){
            data_map::truncate();
        }
        return response()->json($data);
    }
    public function update_level(Request $request){
        $tank_level = move_control::where('id',1)->get(['level']);
        return response()->json($tank_level);
    }
}