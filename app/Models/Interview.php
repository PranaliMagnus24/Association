<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    use HasFactory;
    protected $table = 'interviews';
    protected $fillable = [
'applicant_id','action','interview_date','interview_time','interview_address','interview_instruction'
    ];
}
