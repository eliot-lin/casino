<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    
    protected $fillable = [
        'region_id',
        'name',
    ];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\Models\User', 'city_id');
    }

    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id');
    }

    public function hospitals()
    {
        return $this->hasMany('App\Models\Hospital', 'city_id');
    }
}
