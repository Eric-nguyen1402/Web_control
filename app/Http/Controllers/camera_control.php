<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\tanker_control_xy;
use App\tanker_camera_name;
use App\move_control;
use App\home_users;
use App\User;
use App\gy25;
use App\record_gps;
use DB;

use Illuminate\Http\Request;

class camera_control extends Controller
{
    public function up_camera(Request $request)
    {
        $id_camera = $request->data;
        $action = $request->data1;
        # if button up camera is press
        if($action == "up"){
            $start = tanker_control_xy::find($id_camera);
            $start->down = 0; $start->left = 0; $start->right = 0; $start->home = 0;

            if($start->up == 0){
                $start->up = 1;
                $start->save();
                return response()->json($start);
            }
            else{
                $start->up = 0;
                $start->save();
                return response()->json($start);
            }
        }
        # if button down camera is press
        if($action == "down"){
            $start = tanker_control_xy::find($id_camera);
            $start->up = 0; $start->left = 0; $start->right = 0; $start->home = 0;

            if($start->down == 0){
                $start->down = 1;
                $start->save();
                return response()->json($start);
            }
            else{
                $start->down = 0;
                $start->save();
                return response()->json($start);
            }
        }
        # if button left camera is press
        if($action == "left"){
            $start = tanker_control_xy::find($id_camera);
            $start->up = 0; $start->down = 0; $start->right = 0; $start->home = 0;

            if($start->left == 0){
                $start->left = 1;
                $start->save();
                return response()->json($start);
            }
            else{
                $start->left = 0;
                $start->save();
                return response()->json($start);
            }
        }
        # if button right camera is press
        if($action == "right"){
            $start = tanker_control_xy::find($id_camera);
            $start->up = 0; $start->down = 0; $start->left = 0; $start->home = 0;

            if($start->right == 0){
                $start->right = 1;
                $start->save();
                return response()->json($start);
            }
            else{
                $start->right = 0;
                $start->save();
                return response()->json($start);
            }
        }
        # if button home camera is press
        if($action == "home"){
            $start = tanker_control_xy::find($id_camera);
            $start->up = 0; $start->down = 0; $start->left = 0; $start->right = 0;

            if($start->home == 0){
                $start->home = 1;
                $start->save();
                return response()->json($start);
            }
            else{
                $start->home = 0;
                $start->save();
                return response()->json($start);
            }
        }
    }

    public function tank_control(Request $request){
        $level = $request->data;
        $tank_level = move_control::find(1);
        $tank_level->level = $level;
        $tank_level->save();
        return response()->json($tank_level);
    }

    public function update_led(Request $request){
        $led_level = $request->data;
        $level = move_control::where('id', 1)->first();
        if($level == null){
            $led_level = 0;
            $level = $led_level;
        }
        else{
            $level -> led_level = $led_level;
        }
        $level->save();
        return response()->json($level);
        
    }

    public function updatetime(Request $request){

        $time = $request;
        // update time ở bảng move_control 
        $updatetime = move_control::all();
        $updatetime = $updatetime[0];
        $updatetime->requests_time = $time->data;
        $updatetime->save();

        $user = Auth::user();
        // update time ở bảng home_usersusers
        $home_users = home_users::where('id_user',$user->id)->first();
        $home_users ->requests_time = $time->data;
        $home_users ->save();
        // kiểm tra xem có còn admin hay không 
        $find_admin = home_users::where('permission_level',1)->first();
        // nếu không có admin thì 
        if($find_admin == null){
            $send_admin = 0;
        }
        // nếu có admin thì
        else{
            $send_admin = 1;
        }

        // kiểm tra xem có ai xin cấp quyền admin cho user
        $find_user = home_users::where('requests_time_2',1)->first();
        
        if($find_user == null){
            $send_user = 0;
            $name_user = 0;
        }
        else{
            $send_user = 1;
            $name_user = User::where('id',$find_user->id_user)->first();

        }

        $request_permission = home_users::where('requests_permission',1)->first();

        if($request_permission == null){
            $request_permission = 0;
        }

        $location = gy25::all();
        $location1 = $location[0];

        $record_data = record_gps::all();

        return response()->json(array(
            'updatetime' => $updatetime,
            'user' => $user,
            'home_user' => $home_users,
            'admin' => $send_admin,
            'send_user' => $send_user,
            'name_user' => $name_user,
            'request_permission' => $request_permission,
            'location' => $location,
            'location1' => $location1,
            'record_data' =>$record_data,
        ));
    }

    public function updatetime_1s(Request $request){
        $time = $request;
        $user = Auth::user();

        $home_users = home_users::where('id_user',$user->id)->first();
        $home_users ->requests_time_2 = $time->data;
        $home_users ->save();
        
        return response()->json($home_users);
    }

    public function updatestate(Request $request){
        $user = Auth::user();
        $user ->state_sp = 0;
        $user->save();

        return response()->json($user);
    }

    public function updatelogin(Request $request){
        if($request->data == "User"){
            //
        }
        if($request->data == "Admin"){
            $user = Auth::user();
            $home_user = home_users::where('id_user', $user->id)->first();
            if($home_user->permission == 0){
                $home_user ->requests_time_2 = 1;
                $home_user ->save();
            }
        }
        return response()->json($request);
    }

    public function requests_permisstion(Request $request){
        if($request->data == 1){
            $find_admin = home_users::where('permission_level',1)->first();
            $find_admin ->permission_level = 0;
            $find_admin ->save();

            $find_user = home_users::where('requests_time_2',1)->first();
            $find_user ->requests_time_2 = 0;
            $find_user ->permission_level = 1;
            $find_user ->requests_permission = 1;
            $find_user ->save();
            $send = "Ok";
        }
        else {
            $find_user = home_users::where('requests_time_2',1)->first();
            $find_user ->requests_time_2 = 0;
            // $find_user ->requests_permission = 0;
            $find_user ->save();
            $send = "No";
        }
        return response()->json($send);
    }

    public function request_permission(Request $request){
        $request_permission = home_users::where('requests_permission',1)->first();
        if($request_permission == null){
            $request_permission == 2;
        }
        else {
            $request_permission ->requests_permission = 0;
            $request_permission ->save();
        }
        
        return response()->json($request_permission);
    }

    public function update_gy25(Request $request){
        
        $gy25 = gy25::all();
        return response()->json($gy25);
    }

    
}
