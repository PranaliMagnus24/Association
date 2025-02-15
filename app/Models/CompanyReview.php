<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyReview extends Model
{
    use HasFactory;
    protected $table = 'companyreview';
    protected $fillable = [
          'company_id','user_id','rating_name','email','contact','comment','star_rating','status','email_verified_at',
    ];

    public function companypro()
    {
        return $this->belongsTo(CompanyPro::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
