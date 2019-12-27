<?php

namespace App\Http\Controllers;

use App\Professor;
use App\Subject;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class SubjectsController extends Controller
{
    protected $source = 'subjects';

    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('subjects.index', ['subjects' => Subject::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('subjects.create');
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
            'name' => 'required|max:30|unique:subjects',
            'semester' => 'required|integer',
        ]);

        Subject::create($validated);

        return redirect(route('home', $this->source));
    }

    /**
     * Display the specified resource.
     *
     * @param Subject $subject
     * @return void
     */
    public function show(Subject $subject)
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
        return view('subjects.edit', ['subject' => Subject::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @return RedirectResponse|Redirector
     */
    public function update($id)
    {
        $subject = Subject::findOrFail($id);

        $validated = request()->validate([
            'name' => 'required|max:30',
            'semester' => 'required|integer',
        ]);

        $subject->update($validated);

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
        Subject::findOrFail($id)->delete();
        return redirect(route('home', $this->source));
    }
}
