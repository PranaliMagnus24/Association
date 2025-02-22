<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;
    protected $table ='catalog';
    protected $fillable = [
      'type', 'title','description','image','video','price','catalog_category_id','brands','meta_title','meta_keyword','status','shop_id',
    ];

public function category()
{
    return $this->belongsTo(CatalogCategory::class, 'catalog_category_id');
}


public function shop()
    {
        return $this->belongsTo(ShopRegistration::class, 'shop_id');
    }

}
