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


class EricController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        $motor = move_control::all();
        // $motor->battery;
        $user = Auth::user();

        $home_users = home_users::where('id_user', $user->id) ->first();

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
        
        return view('home',compact('motor', 'user'));
    }
}
