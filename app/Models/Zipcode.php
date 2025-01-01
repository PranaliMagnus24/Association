<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zipcode extends Model
{
    use HasFactory;
    protected $table = 'zip_code';
    protected $fillable = [
       'officename','pincode','divisionname','regionname','circlename','Taluka','Districtname','statename','RelatedSuboffice','RelatedHeadoffice',
    ];

    public function companyPro()
    {
        return $this->belongsTo(CompanyPro::class, 'zip_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'zip_id', 'id');
    }
}
