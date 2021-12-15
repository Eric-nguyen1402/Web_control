<?php


namespace App\Http\Controllers;
use App\tanker_control_xy;
use App\tanker_camera_name;
use App\move_control;
use App\User;
use App\home_users;
use App\gy25;
use DB;
use App\record_gps;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $record_data = record_gps::all();
        $motor = move_control::all();
        // $motor->battery;
        $user = Auth::user();

        $home_users = home_users::where('id_user', $user->id) ->first();
        $posision = gy25::all();

        if ($home_users == null){
            $home_user = new home_users;
            $home_user ->id_user = $user->id;
            $home_user ->status_user = 1;
            $home_user ->status_control = 1;
            $home_user ->save();
        }
        else{
            $home_users ->status_control = 1;
            $home_users ->save();
        }
        

        $admin = home_users::where('permission_level',1) ->first();
        if($admin == null){
            $home_users ->permission_level = 1;
            $home_users ->save();
        }
        
        return view('map',compact('motor', 'user','posision','record_data'));
    }

    public function findrecord(Request $request){
        $time1 = $request->data . " 00:00:00";
        $time2 = $request->data . " 23:59:59";
        $datetime = record_gps::whereBetween('created_at', [$time1, $time2])->get();
        return response()->json($datetime);
    }

    public function mylocation(Request $request){
        $mylocation = gy25::all();
        return response()->json($mylocation);
    }

    public function recordcontrol(Request $request){
        if($request ->data == 1){
            DB::update("UPDATE `GY25` SET `record_state` = 1 WHERE `GY25`.`ID` = 1;");
        }
        if($request ->data == 2){
            DB::update("UPDATE `GY25` SET `record_state` = 0 WHERE `GY25`.`ID` = 1;");
        }

        $state = gy25::all();
        return response()->json($state);
    }
}
