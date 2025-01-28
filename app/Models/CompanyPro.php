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
'company_type','company_name','aadharcard_number','address_one','address_two','registration_date','renewal_date','city','state','country','landline','employee_number','company_year','about_company','website_url','technologies','company_logo','state_id','city_id','zip_id','country_id','tech_id','user_id', 'membership_year','membership_id','membership_type','membershiptype_id','default_year','designation','services',
    ];

public function technologies()
{
    return $this->belongsTo(Technology::class, 'tech_id', 'id');
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

public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

public function membershipyear()
{
    return $this->belongsTo(Membershipyear::class, 'membershipyear_id', 'id');
}

public function membershiptype()
{
    return $this->belongsTo(Membership::class, 'membershiptype_id', 'id');
}


    public function Userone()
{
    return $this->belongsTo(User::class, 'membershiptype_id', 'id');
}

public function documents()
{
    return $this->hasMany(Documentupload::class, 'company_id');
}

public function jobs()
{
    return $this->hasMany(Job::class, 'company_id');
}







//auro increment
protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {

            $lastMembershipId = CompanyPro::withTrashed()->OrderBy('membership_id','desc')->first()->membership_id;
            // dd($lastMembershipId);
            // die();
            $model->membership_id = $lastMembershipId ? $lastMembershipId + 1 : 1001;
        });
    }

}
