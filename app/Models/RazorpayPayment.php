<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazorpayPayment extends Model
{
    use HasFactory;
    protected $table = 'razorpaypayments';
    protected $fillable = [
                          'event_id','eventform_id','event_amount','payment_date','status','gst_amount','total_amount','igst_amount','sgst_amount','cgst_amount',
    ];

    public function states()
    {
        return $this->belongsTo(State::class, 'state', 'id');
    }
}
