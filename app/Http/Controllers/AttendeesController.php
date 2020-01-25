<?php

namespace App\Http\Controllers;

use App\Attendee;
use Illuminate\Http\Request;

class AttendeesController extends Controller
{
    public function create($consultation_id)
    {
        Attendee::create(['consultation_id' => $consultation_id, 'student_id' => 1]);
    }
}
