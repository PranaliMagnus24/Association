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
        return $this->hasMany(SubCategory::class);
    }

    public function subsubcategory()
    {
        return $this->hasMany(SubSubCategory::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id', 'id');
    }
}
