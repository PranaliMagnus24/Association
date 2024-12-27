<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'membership';
    protected $fillable = [
        'title',
        'desc',
        'status',
    ];

    public function fees()
    {
        return $this->hasMany(Fees::class, 'membership_id', 'id');
    }
}
