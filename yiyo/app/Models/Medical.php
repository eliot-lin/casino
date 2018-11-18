<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medical extends Model
{
    protected $table = 'medicals';

    protected $fillable = [
        'user_id',
        'hospital_id',
        'occupation_id',
        'division_main_id',
        'division_vice_id',
        'type_id_array',
        'relationship',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function occupation()
    {
        return $this->belongsTo('App\Models\Occupation', 'occupation_id');
    }

    public function workTimes()
    {
        return $this->hasMany('App\Models\WorkTime', 'medical_id');
    }

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital', 'hospital_id');
    }

    public function mainDivision()
    {
        return $this->belongsTo('App\Models\Division', 'division_main_id');
    }
    
    public function viceDivision()
    {
        return $this->belongsTo('App\Models\Division', 'division_vice_id');
    }

    public function serviceType()
    {
        return $this->hasmany('App\Models\Service_type', 'medical_id');
    }
}
