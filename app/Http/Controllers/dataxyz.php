<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\data_XYZ;
use App\move_control;
use DB;

class dataxyz extends Controller
{
    public function update_dataxyz(Request $request){

        $data1 = data_XYZ::latest('ID')->first();
        $data1 = $data1 -> ID;
        $data = data_XYZ::whereBetween('ID',[$data1 - 150,$data1])->get();
        if ($data1 >= 5000){
            data_XYZ::truncate();
        }
        return response()->json($data);
        
    }
}
