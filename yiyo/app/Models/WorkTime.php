<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkTime extends Model
{
    protected $table = 'worktimes';

    protected $fillable = [
        'medical_id',
        'date',
        'period',
    ];

    public $timestamps = false;
    
    public function medical()
    {
        return $this->belongsTo('App\Models\Medical', 'medical_id');
    }
}
