<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $table = 'hospitals';

    protected $fillable = [
        'city_id',
        'name',
        'address',
        'tel',
        'website',
        'level',
        'lat',
        'lng',
    ];

    public $timestamps = false;

    public function medical()
    {
        return $this->hasMany('App\Models\Medical', 'hospital_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }
}
