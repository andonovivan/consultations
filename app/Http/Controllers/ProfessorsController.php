<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Student;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ProfessorsController extends Controller
{
    protected $source = 'professors';

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('professors.index', ['professors' => Professor::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('professors.create');
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
            'email' => 'required|email|unique:professors',
        ]);

        Professor::create($validated);

        return redirect(route('home', $this->source));
    }

    /**
     * Display the specified resource.
     *
     * @param Professor $professor
     * @return void
     */
    public function show(Professor $professor)
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
        return view('professors.edit', ['professor' => Professor::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update($id)
    {
        $professor = Professor::findOrFail($id);

        $validated = request()->validate([
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'email' => 'required|email',
        ]);

        $professor_emails = Professor::where('id', '!=', $id)->pluck('email')->all();
        $student_emails = Student::get()->pluck('email')->all();

        if (in_array($validated['email'], $student_emails) || in_array($validated['email'], $professor_emails)) {
            return back();
        }

        $professor->update($validated);

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
        Professor::findOrFail($id)->delete();
        return redirect(route('home', $this->source));
    }
}
