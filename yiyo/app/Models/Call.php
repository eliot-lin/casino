<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $table = 'calls';

    protected $fillable = [
        // 'user_id',
        'api_key',
        'session_id',
        'token',
        'room_name',
    ];

    public $timestamps = false;

    // public function users()
    // {
    //     return $this->hasMany('App\Models\User', 'user_id');
    // }
}
