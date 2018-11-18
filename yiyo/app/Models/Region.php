<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';
    
        protected $fillable = [
            'name',
            'no',
        ];
    
        public $timestamps = false;

        public function cities()
        {
            return $this->hasMany('App\Models\City', 'region_id');
        }
}
