<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VIP extends Model
{
    protected $table = 'vips';

    protected $fillable = [
        'card_no',
        'membership',
        'group_id',
        'user_id',
        'occupation',
        'height',
        'weight',
        'blood_type',
        'Handicapped',
        'religion',
        'address_visit',
        'contact',
        'contact_relationship',
        'contact_phone',
        'contact_address',
        'medicine_records',
        'is_manager',
    ];

    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo('App\Models\Group', 'group_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function ph()
    {
        return $this->hasmany('App\Models\Past_Hospitals', 'user_id');
    }
}
