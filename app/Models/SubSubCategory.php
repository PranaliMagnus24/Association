<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubCategory extends Model
{
    use HasFactory;
    protected $table ='subsubcategory';

    protected $fillable = [
        'subsubcategory_name',
        'description',
         'status',
         'category_id',
         'subcategory_id',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault(['category_name' => 'N/A']);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class)->withDefault(['subcategory_name' => 'N/A']);;
    }
}
