<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = "groups";
    protected $fillable =[
        'name',   //付款人
        'type',   
        'level',  
        'count',
        'status', //未付款、開通、過期
        'token',
    ];

    public $timestamps = false;
    
    public function vips()
    {
        return $this->hasMany('App\Models\VIP', 'group_id');
    }
}
