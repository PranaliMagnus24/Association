<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentupload extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'documentuploads';
    protected $fillable = [
        'company_id','file_name','file_type',
    ];



}
