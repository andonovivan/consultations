<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class StudentsController extends Controller
{
    protected $source = 'students';

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('students.index', ['students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        $validated = request()->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email|unique:students|unique:professors',
            'enrollment_year' => 'required|integer',
            'years_of_study' => 'required|integer'
        ]);

        Student::create($validated);

        return redirect(route('home', $this->source));
    }

    /**
     * Display the specified resource.
     *
     * @param Student $student
     * @return Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Factory|View
     */
    public function edit($id)
    {
        return view('students.edit', ['student' => Student::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update($id)
    {
        $student = Student::findOrFail($id);

        $validated = request()->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email',
            'enrollment_year' => 'required|integer',
            'years_of_study' => 'required|integer'
        ]);

        $student_emails = Student::where('id', '!=', $id)->pluck('email')->all();
        $professor_emails = Professor::get()->pluck('email')->all();

        if (in_array($validated['email'], $student_emails) || in_array($validated['email'], $professor_emails)) {
            return back();
        }

        $student->update($validated);

        return redirect(route('home', $this->source));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function destroy($id)
    {
        Student::findOrFail($id)->delete();
        return redirect(route('home', $this->source));
    }
}
