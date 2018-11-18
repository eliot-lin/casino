<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Hash;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = [
        'city_id',
        'type',
        'email_main',
        'email_vice',
        'password',
        'id_no',
        'name',
        'portrait',
        'score',
        'cell',
        'tel_home',
        'tel_office',
        'sex',
        'passport',
        'birthday',
        'nationality',
        'marital_status',
        'education',
        'language',
        'address',
        'hierarchy',
        'device_token',
    ];

    public $timestamps = false;

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function member()
    {
        if ('vip' == $this->type) {
            return $this->hasOne('App\Models\VIP', 'user_id');
        }
        return $this->hasOne('App\Models\Medical', 'user_id');
    }

    public function messages()
    {
        return $this->hasMany('App\Models\Message', 'from_id');
    }

    public function messagesTo()
    {
        return $this->hasMany('App\Models\Message', 'to_id');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function missions()
    {
        return $this->hasMany('App\Models\Mission', 'requester_id');
        // return $this->hasMany('App\Models\Mission', 'provider_id', 'requester_id');
    }

    public function login()
    {
        $login_at = strtotime('now');
        $this->attributes['login_at'] = $login_at;
        $token = Hash::make($this->attributes['email_main'] . $login_at);
        $this->attributes['bearer_token'] = $token;
        $this->save();
    }

    public function logout()
    {
        $this->attributes['login_at'] = 0;
        $this->attributes['bearer_token'] = '';
        $this->save();
    }
}
