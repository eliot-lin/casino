<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progresses';
    
    protected $fillable = [
        'mission_id',
        'content',
        'issued_at',
        'color',
    ];

    public  $timestamps = false;

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'mission_id');
    }
}
