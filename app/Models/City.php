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
        return $this->belongsTo(CompanyPro::class, 'city_id', 'id');
    }

}
