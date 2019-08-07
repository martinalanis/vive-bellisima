<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'last_name2', 'curp', 'city', 'state', 'address', 'phone', 'level', 'team_leader', 'email', 'password', 'status',
    ];

    /**
     * The custom attributes used for accessors.
     *
     * @var array
     */
    protected $appends = ['full_name', 'level_name'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
    }

    public function setLastName2Attribute($value)
    {
        $this->attributes['last_name2'] = ucwords($value);
    }

    public function setCurpAttribute($value)
    {
        $this->attributes['curp'] = strtoupper($value);
    }

    public function setCityAttribute($value)
    {
        $this->attributes['city'] = strtolower($value);
    }

    public function setStateAttribute($value)
    {
        $this->attributes['state'] = strtolower($value);
    }

    public function setAddressAttribute($value)
    {
        $this->attributes['address'] = strtolower($value);
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->last_name} {$this->last_name2}";
    }

    public function getLevelNameAttribute()
    {
        switch( $this->level ) {
            case 1: return 'Director';
            case 2: return 'Promotor';
            case 3: return 'Vendedor';
            case 4: return 'Cliente';
            default: return 'nivel no asignado';
        }
    }
}
