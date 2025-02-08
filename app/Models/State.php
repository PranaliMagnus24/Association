<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $fillable = [
       'name','country_id','country_code','fips_code','iso2','type','latitude','longitude','flag',
    ];

    public function companyPro()
{
    return $this->belongsTo(CompanyPro::class, 'state', 'id');
}

public function user()
{
    return $this->belongsTo(User::class, 'state', 'id');
}
public function jobs()
{
    return $this->hasMany(Job::class, 'state', 'id');
}
public function eventform()
    {
        return $this->hasMany(EventForm::class, 'state', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'state', 'id');
    }

    public function razorpay()
    {
        return $this->hasMany(RazorpayPayment::class, 'state', 'id');
    }
}
