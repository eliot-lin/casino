<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = 'companys';

    protected $fillable = [
        'name',
        'phone',
        'type_id',
    ];

    public $timestamps = false;
    
    //has many outsource
    public function outsource()
    {
        return $this->hasmany('App\Models\Outsource', 'company_id');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

}
