<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    protected $fillable = [
        'mission_id',
        'from_id',
        'to_id',
        'created_at',
        'source_type',
        'source',
    ];

    public  $timestamps = false;

    public function mission()
    {
        return $this->belongsTo('App\Models\Mission', 'mission_id');
    }
   
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'from_id');
    }

    public function userTo()
    {
        return $this->belongsTo('App\Models\User', 'to_id');
    }

}
