<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_type extends Model
{
    protected $table = 'service_types';

    protected $fillable = [
        'medical_id',
        'type_id',
    ];

    public $timestamps = false;

    public function medical()
    {
        return $this->belongsTo('App\Models\Medical', 'medical_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }
    
}
