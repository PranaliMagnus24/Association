<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipPlan extends Model
{
    use HasFactory;
    protected $table = 'membershipplan';
    protected $fillable = [
       'package_title','plan_price','package_term','trial','meta_keyword','plan_image','meta_description','status','yearly_fee','numberof_year',
    ];

    public function membershipYears()
    {
        return $this->hasMany(Membershipyear::class);
    }
}
