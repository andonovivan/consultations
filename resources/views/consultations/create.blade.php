@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Consultations</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('consultations.index') }}" class="btn btn-outline-success">&larr; Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            New Consultation
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('consultations.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="professor_id">Professor</label>
                        <select
                            class="custom-select @error('professor_id') is-invalid @enderror"
                            name="professor_id"
                            id="professor_id">
                            @foreach($professors as $professor)
                                <option
                                    value="{{$professor->id}}">{{$professor->first_name . ' ' . $professor->last_name}}</option>
                            @endforeach
                        </select>

                        @error('professor_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="room_id">Room</label>
                        <select
                            class="custom-select @error('room_id') is-invalid @enderror"
                            name="room_id"
                            id="room_id">
                            @foreach($rooms as $room)
                                <option
                                    value="{{$room->id}}">{{$room->name}}</option>
                            @endforeach
                        </select>

                        @error('room_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="time_from">From</label>
                        <input type="datetime-local" class="form-control" id="time_from" value="2020-01-01T00:00"
                               name="time_from"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="time_to">To</label>
                        <input type="datetime-local" class="form-control" id="time_to" value="2020-01-01T00:00"
                               name="time_to"/>
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
