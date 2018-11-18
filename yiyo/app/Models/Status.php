<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;
    
    public function missions()
    {
        return $this->hasMany('App\Models\Mission', 'status_id');
    }
}
