<?php

namespace App\Http\Controllers;

use App\Attendee;
use App\Consultation;
use App\Professor;
use App\Room;
use Illuminate\Http\Request;

class ConsultationsController extends Controller
{
    public function index()
    {
        return view('consultations.index', [
            'consultations' => Consultation::all()
        ]);
    }

    public function create()
    {
        return view('consultations.create', [
            'professors' => Professor::orderBy('first_name')->orderBy('last_name')->get(),
            'rooms' => Room::orderBy('name')->get()
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'professor_id' => 'required|exists:professors,id',
            'room_id' => 'required|exists:rooms,id',
            'time_from' => 'required|date',
            'time_to' => 'required|date'
        ]);

        Consultation::create(request()->all());
        return redirect(route('consultations.index'));
    }

    public function edit($id)
    {
        return view('consultations.edit', [
            'consultation' => Consultation::findOrFail($id),
            'professors' => Professor::orderBy('first_name')->orderBy('last_name')->get(),
            'rooms' => Room::orderBy('name')->get()
        ]);
    }

    public function update($id)
    {
        $validated = request()->validate([
            'professor_id' => 'required|exists:professors,id',
            'room_id' => 'required|exists:rooms,id',
            'time_from' => 'required|date',
            'time_to' => 'required|date'
        ]);

        Consultation::find($id)->update($validated);
        return redirect(route('consultations.index'));
    }

    public function destroy($id)
    {
        Consultation::findOrFail($id)->delete();
    }
}
