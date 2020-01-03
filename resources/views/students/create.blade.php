@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('students.index') }}" class="btn btn-outline-success">&larr; Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            Create New Student
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('students.store') }}">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text"
                           class="form-control @error('first_name') is-invalid @enderror"
                           id="first_name"
                           name="first_name"
                           placeholder="Enter First Name">

                    @error('first_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text"
                           class="form-control @error('last_name') is-invalid @enderror"
                           id="last_name"
                           name="last_name"
                           placeholder="Enter Last Name">

                    @error('last_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"
                           class="form-control @error('email') is-invalid @enderror"
                           id="email"
                           name="email"
                           placeholder="Enter Email Address">

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="enrollment_year">Enrollment Year</label>
                    <select class="form-control @error('enrollment_year') is-invalid @enderror" id="enrollment_year"
                            name="enrollment_year">
                        @for($year = 2000; $year <= 2019; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>

                    @error('enrollment_year')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="years_of_study">Years Of Study</label>
                    <select class="form-control @error('years_of_study') is-invalid @enderror" id="years_of_study"
                            name="years_of_study">
                        @for($year = 1; $year <= 8; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
                    @error('years_of_study')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
@endsection
