@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create New Subject
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('subjects.store') }}">
                @csrf
                <div class="form-group">
                    <label for="first_name">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           id="name"
                           name="name"
                           placeholder="Enter Name">

                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <input type="number"
                           class="form-control @error('semester') is-invalid @enderror"
                           id="semester"
                           name="semester"
                           min="1"
                           max="10"
                           placeholder="Enter Semester">

                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
