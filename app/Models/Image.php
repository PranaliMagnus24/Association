<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'image';
    protected $fillable = [
        'page',
        'ctype',
        'start_datetime',
        'end_datetime',
        'name',
        'gallery_id',

    ];


    public function page()
    {
        return $this->hasMany(Page::class);
    }

    public function ctype()
    {
        return $this->hasMany(CType::class);
    }
    public function gallery()
    {
        return $this->hasMany(Gallery::class);
    }
    public function galleryimg()
    {
        return $this->hasMany(Gallery::class, 'gallery_id', 'id');
    }
}
