<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table ='gallery';
    protected $fillable = [
        'name',
        'date',
        'location',
        'gallery',


    ];


    public function image()
    {
        return $this->belongsTo(Image::class);
    }
    public function imagegallery()
    {
        return $this->hasMany(Image::class, 'gallery_id', 'id');
    }
}
