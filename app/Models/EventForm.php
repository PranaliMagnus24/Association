<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    use HasFactory;
    protected $table ='eventform';
    protected $fillable = [
        'event_id',
        'name',
        'email',
        'phone',
        'country',
        'state',
        'usergst_number',
        'city',
        'check_in',
        'check_out'
    ];

    // Relationships
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

        public function countries()
        {
            return $this->belongsTo(Country::class, 'country', 'id');
        }

        public function states()
        {
            return $this->belongsTo(State::class, 'state', 'id');
        }

        public function cities()
        {
            return $this->belongsTo(City::class, 'city', 'id');
        }

        public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
