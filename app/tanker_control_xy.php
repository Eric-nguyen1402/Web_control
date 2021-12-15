<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tanker_control_xy extends Model
{
    protected $table = 'taker_control_xy';
    public function camera_name()
    {
        return $this->belongsTo('App\tanker_camera_name','id_camera_name');
    }
}
