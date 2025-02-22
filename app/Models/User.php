<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'date_birth',
        'gender',
        'profile_pic',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    const ROLE_SUPERADMIN = 'superadmin';
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';

    public function isSuperAdmin()
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isUser()
    {
        return $this->role === self::ROLE_USER;
    }


    public function company()
    {
        return $this->hasOne(CompanyPro::class);
    }
    public function companyprofile()
    {
        return $this->hasMany(CompanyPro::class, 'membershiptype_id', 'id');
    }


    public function cities()
{
    return $this->belongsTo(City::class, 'city', 'id');
}
public function states()
{
    return $this->belongsTo(State::class, 'state', 'id');
}
public function countries()
{
    return $this->belongsTo(Country::class, 'country', 'id');
}

public function zips()
{
    return $this->belongsTo(Zipcode::class, 'zip_id', 'id');
}

public function eventform()
{
    return $this->hasMany(EventForm::class, 'user_id', 'id');

}

public function reviews() {
    return $this->hasMany(CompanyReview::class, 'company_id');
}

}

