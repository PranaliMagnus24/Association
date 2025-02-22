<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogCategory extends Model
{
    use HasFactory;
    protected $table ='catalog-category';
    protected $fillable = [
     'catalog_category_name','description','status','parent_id','image',
    ];
}
