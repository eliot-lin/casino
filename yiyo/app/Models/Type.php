<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';

    protected $fillable = [
        'name',
        'color',
    ];

    public $timestamps = false;

    public function missions()
    {
        return $this->hasMany('App\Models\Mission', 'type_id');
    }

    public function serviceTypes()
    {
        return $this->hasMany('App\Models\Service_type', 'type_id');
    }
}
