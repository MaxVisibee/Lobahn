<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name', 'last_name', 'name', 'email', 'password',
    ];

    protected $dates = ['created_at', 'updated_at', 'dob', 'package_start_date', 'package_end_date'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getName()
    {
        $html = '';
        if (!empty($this->first_name))
            $html .= $this->first_name;

        if (!empty($this->last_name))
            $html .= ' ' . $this->last_name;

        return $html;
    }

    public function state(){
        return $this->belongsTo('App\Models\Area','state_id');
    }
    public function city(){
        return $this->belongsTo('App\Models\District','city_id');
    }
    public function industry(){
        return $this->belongsTo('App\Models\Industry','industry_id');
    }
}
