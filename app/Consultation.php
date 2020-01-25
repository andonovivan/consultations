<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = ['professor_id', 'room_id', 'time_from', 'time_to'];

    public function professor()
    {
        return $this->hasOne('App\Professor', 'id', 'professor_id');
    }

    public function room()
    {
        return $this->hasOne('App\Room', 'id', 'room_id');
    }

    public function attendees()
    {
        return $this->hasMany('App\Attendee', 'consultation_id', 'id');
    }
}
