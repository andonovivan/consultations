<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = ['student_id', 'professor_id', 'subject_id', 'grade'];
    protected $guarded = ['id'];

    protected function student()
    {
        return $this->hasOne('App\Student', 'id', 'student_id');
    }

    protected function professor()
    {
        return $this->hasOne('App\Professor', 'id', 'professor_id');
    }

    protected function subject()
    {
        return $this->hasOne('App\Subject', 'id', 'subject_id');
    }

}
