<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table ='subcategory';

    protected $fillable = [
        'subcategory_name',
        'description',
         'status',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['category_name' => 'N/A']);
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
