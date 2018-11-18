<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    protected $table = 'divisions';

    protected $fillable = [
        'no',
        'name',
    ];

    public $timestamps = false;

    public function medical()
    {
        return $this->hasMany('App\Models\Medical', 'division_main_id', 'division_vice_id');
    }
}
