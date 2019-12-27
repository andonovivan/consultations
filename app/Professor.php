<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = ['first_name', 'last_name', 'email'];
    protected $guarded = ['id'];
}
