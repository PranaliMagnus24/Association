<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $fillable = [
        'name','state_id','state_code','country_id','country_code','latitude','longitude','flag'
    ];

    public function companyPro()
    {
        return $this->belongsTo(CompanyPro::class, 'city', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'city', 'id');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'city', 'id');
    }

    public function eventform()
    {
        return $this->hasMany(EventForm::class, 'city', 'id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'city', 'id');
    }
}
