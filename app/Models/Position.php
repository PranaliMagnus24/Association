<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table ='position';
    protected $fillable = [
        'name',
        'status',
        ];
        public function committee()
        {
            return $this->belongsTo(Committee::class);
        }
}
