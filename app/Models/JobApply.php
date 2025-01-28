<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApply extends Model
{
    use HasFactory;
    protected $table = 'jobapply';
    protected $fillable = [
'to','message','subject','name','phone','company_id','job_id'
    ];
}
