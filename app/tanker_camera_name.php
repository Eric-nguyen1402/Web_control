<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanker_camera_name extends Model
{
    protected $table = 'taker_camera_name';
    public function camera_xy()
    {
        return $this->belongsTo('App\tanker_control_xy','id');
    }
}
