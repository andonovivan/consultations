<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email', 'enrollment_year', 'years_of_study'];
    protected $guarded = ['id'];
}
