<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table ='events';
    protected $fillable = [
        'title',
        'introduction',
        'description',
        'eventstartdatetime',
        'eventenddatetime',
        'registerstartdatetime',
        'registerenddatetime',
        'type',
        'mode',
        'upload',
        'status',
    ];
    public function eventform()
    {
        return $this->hasMany(EventForm::class);
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
}
