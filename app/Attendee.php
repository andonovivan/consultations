<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model
{
    protected $fillable = ['student_id', 'consultation_id'];
    protected $guarded = ['id'];
}
