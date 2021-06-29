<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public const GENDER = [
        'female' => 'Female',
        'male' => 'Male',
        'other' => 'Other',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->f_name} {$this->l_name}";
    }

    public function getPhoneNumberAttribute(): string
    {
        return "{$this->country_code} {$this->contact_no}";
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

    public function ProfilePicture()
    {
        return $this->hasOne(Profile_picture::class, 'user_id', 'id');
    }
}
