<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasFactory, Notifiable,Sortable;

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
    public $sortable = [
        'id',
        'f_name',
        'l_name',
        'email',
        'contact_no',
        'country_code',
    ];

    public function getFullNameAttribute(): string
    {
        return "{$this->f_name} {$this->l_name}";
    }

    public function getPhoneNumberAttribute(): string
    {
        return "{$this->country_code} {$this->contact_no}";
    }

    public function address(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Address::class, 'user_id', 'id');
    }

    public function ProfilePicture(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Profile_picture::class, 'user_id', 'id');
    }

    public function country(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Country::class,'country_code','country_code');
    }

    public function getCounty_NameAttribute()
    {
        $country = Country::where('country_code',$this->country_code)->first();
        return $country;

    }
}
