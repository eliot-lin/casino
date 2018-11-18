<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Past_Hospitals extends Model
{
    protected $table = 'past_hospitals';

    protected $fillable = [
        'user_id',
        'hospital',
        'division',
        'name',
        'finished_at',
    ];

    public $timestamps = false;
    
    public function vip()
    {
        return $this->belongsTo('App\Models\VIP', 'user_id');
    }
}
