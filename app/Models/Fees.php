<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fees extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'fees';
    protected $fillable = [
        'application_fee',
        'subscription_fee',
        'desc',
        'status',
    ];

    public function membership()
    {
        return $this->belongsTo(Membership::class, 'membership_id', 'id');
    }
}
