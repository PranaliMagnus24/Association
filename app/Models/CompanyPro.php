<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CompanyPro extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'companyprofile';
    protected $fillable = [
'company_type','company_name','aadharcard_number','address_one','address_two','registration_date','renewal_date','city','state','country','landline','employee_number','company_year','about_company','website_url','technologies','company_logo','state_id','city_id','zip_id','country_id','tech_id','user_id', 'membership_year','membership_id','membership_type','membershiptype_id','default_year',
    ];

    public function technologies()
{
    return $this->hasMany(Technology::class, 'tech_id', 'id');
}

public function cities()
{
    return $this->hasMany(City::class, 'city_id', 'id');
}
public function states()
{
    return $this->hasMany(State::class, 'state_id', 'id');
}
public function countries()
{
    return $this->hasMany(Country::class, 'country_id', 'id');
}

public function zips()
{
    return $this->hasMany(Zipcode::class, 'zip_id', 'id');
}

public function user()
{
    return $this->hasMany(User::class, 'user_id', 'id');
}

public function membershipyear()
{
    return $this->hasMany(Membershipyear::class, 'membershipyear_id', 'id');
}

public function membershiptype()
{
    return $this->hasMany(Membership::class, 'membershiptype_id', 'id');
}


    public function Userone()
{
    return $this->belongsTo(User::class, 'membershiptype_id', 'id');
}





//auro increment
protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastMembershipId = self::max('membership_id');
            $model->membership_id = $lastMembershipId ? $lastMembershipId + 1 : 1001;
        });
    }

}
