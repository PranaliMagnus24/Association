<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membershipyear extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'membershipyear';
    protected $fillable = [
        'membership_year',
        'membership_fee',
        'numberof_year',
        'membership_plan_id',
        'default_year',
        'status',
    ];

    public function companyPro()
    {
        return $this->belongsTo(CompanyPro::class, 'membershipyear_id', 'id');
    }
}
