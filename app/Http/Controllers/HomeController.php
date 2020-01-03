<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($source = null)
    {
        return view('layouts.app');
        return view('home', [
            'students' => Student::all(),
            'professors' => Professor::all(),
            'subjects' => Subject::all(),
            'source' => $source
        ]);
    }
}
