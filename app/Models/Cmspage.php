<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cmspage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'cmspages';
    protected $fillable = [
                'title','introduction','description','metatitle','metadescription','upload','upload_document','status',
    ];
}
