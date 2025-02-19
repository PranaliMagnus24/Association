<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table ='category';
    protected $fillable = [
        'category_name',
        'description',
        'status',
    ];

    public function subcategory()
    {
        return $this->hasMany(SubCategory::class,'company_type');
    }

    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id', 'id');
    }

    public function companies()
{

    return $this->hasMany(CompanyPro::class, 'company_type', 'category_name');
}


}
