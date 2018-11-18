<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'occupations';

    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function medicals()
    {
        return $this->hasMany('App\Models\Medical', 'occupation_id');
    }
}
    