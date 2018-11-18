<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outsource extends Model
{
    //
    protected $table = 'outsources';
    
    protected $fillable = [
        'mission_id',
        'company_id',
        'requester_id',
        'price',
        'address',
        'requirement',
        'request_at',
        'getjob_at',
        'service_at',
    ];

    public $timestamps = false;
    
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'mission_id');
    }

    public function requester()
    {
        return $this->belongsTo('App\Models\User', 'requester_id');
    }
    
}
