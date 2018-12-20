<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    protected $table = 'missions';

    protected $fillable = [
        'parent_id',
        'requester_id',
        'provider_id',
        'type_id',
        'status_id',
        'method',
        'group_name',
        'vip_card_no',
        'type_name',
        'requester_name',
        'provider_name',
        'status_name',
        'date',
        'description',
        'mission_score',
        'provider_score',
        'suggestion',
        'issued_at',
        'took_at',
        'finished_at',
        'visitAddress',
    ];

    public $timestamps = false;
    
    public function parent()
    {
        return $this->belongsTo('App\Models\Mission', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\Mission', 'parent_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Models\Type', 'type_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'mission_id');
    }

    public function progresses()
    {
        return $this->hasMany('App\Models\Progress', 'mission_id');
    }

    public function provider()
    {
        return $this->belongsTo('App\Models\User', 'provider_id');
    }

    public function requester()
    {
        return $this->belongsTo('App\Models\User', 'requester_id');
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($mission) {
            $mission->issued_at = strtotime('now');
            $mission->issued_at -= rand(0,100);
        });
    }

    public function close()
    {
        $this->update(['finished_at' => strtotime('now')]);
        $this->update(['status_name' => "完成"]);
    }
}
