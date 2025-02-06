<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = [
       'name','iso3','numeric_code','iso2','phonecode','capital','currency','currency_name','currency_symbol','tld','native','region','region_id','subregion','subregion_id','nationality','timezones','translations','latitude','emoji','emojiU','flag'
    ];

    public function companyPro()
{
    return $this->belongsTo(CompanyPro::class, 'country', 'id');
}
public function user()
{
    return $this->belongsTo(User::class, 'country', 'id');
}

public function jobs()
    {
        return $this->hasMany(Job::class, 'country', 'id');
    }
    public function eventform()
    {
        return $this->hasMany(EventForm::class, 'country', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'city', 'id');
    }
}
