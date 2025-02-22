<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopRegistration extends Model
{
    use HasFactory;
    protected $table = 'shop-registration';
    protected $fillable = [
        'shop_name','shop_location','shop_desc','shop_logo','user_id',
    ];

public function catalogs()
    {
        return $this->hasMany(Catalog::class, 'shop_id');
    }

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
