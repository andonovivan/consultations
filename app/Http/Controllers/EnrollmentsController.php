<?php

namespace App\Http\Controllers;

use App\Enrollment;
use App\Professor;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class EnrollmentsController extends Controller
{

    public function index()
    {
        return view('enrollments.index', [
            'enrollments' => Enrollment::paginate(10)
        ]);
    }

    public function create()
    {
        return view('enrollments.create', [
            'students' => Student::orderBy('first_name')->orderBy('last_name')->get(),
            'professors' => Professor::orderBy('first_name')->orderBy('last_name')->get(),
            'subjects' => Subject::orderBy('name')->get()
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'students' => 'required',
            'professors' => 'required',
            'subjects' => 'required',
        ]);

        $students = $validated['students'];
        $professors = $validated['professors'];
        $subjects = $validated['subjects'];

        foreach ($students as $student) {
            foreach ($professors as $professor) {
                foreach ($subjects as $subject) {
                    Enrollment::updateOrCreate(
                        [
                            'student_id' => $student,
                            'professor_id' => $professor,
                            'subject_id' => $subject
                        ],
                        [
                            'student_id' => $student,
                            'professor_id' => $professor,
                            'subject_id' => $subject
                        ]);
                }
            }
        }

        return redirect(route("enrollments.index"));
    }

    public function edit($id)
    {
        return view('enrollments.edit', [
            'enrollment' => Enrollment::findOrFail($id),
            'students' => Student::orderBy('first_name')->orderBy('last_name')->get(),
            'professors' => Professor::orderBy('first_name')->orderBy('last_name')->get(),
            'subjects' => Subject::orderBy('name')->get(),
        ]);
    }

    public function update($id)
    {
        $enrollment = Enrollment::findOrFail($id);
        $enrollment->update(
            [
                'student_id' => request()->student_id,
                'professor_id' => request()->professor_id,
                'subject_id' => request()->subject_id
            ],
            [
                'student_id' => request()->student_id,
                'professor_id' => request()->professor_id,
                'subject_id' => request()->subject_id
            ]);
        return redirect(route('enrollments.index'));
    }

    public function destroy($id)
    {
        Enrollment::findOrFail($id)->delete();
    }
}
