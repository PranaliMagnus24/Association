<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInquiry extends Model
{
    use HasFactory;
    protected $table = 'product_inquiry';
    protected $fillable = [
      'wp_name','wp_phone','catalog_id','wp_message','shop_id',
    ];
}
