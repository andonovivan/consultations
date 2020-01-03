@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Enrollments</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('enrollments.index') }}" class="btn btn-outline-success">&larr; Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            New Enrollment
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('enrollments.store') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="students">Students</label>
                        <select
                            class="custom-select @error('students') is-invalid @enderror"
                            multiple
                            name="students[]"
                            id="students">
                            @foreach($students as $student)
                                <option
                                    value="{{$student->id}}">{{$student->first_name . ' ' . $student->last_name}}</option>
                            @endforeach
                        </select>

                        @error('students')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="professors">Professors</label>
                        <select
                            class="custom-select @error('professors') is-invalid @enderror"
                            multiple
                            name="professors[]"
                            id="professors">
                            @foreach($professors as $professor)
                                <option
                                    value="{{$professor->id}}">{{$professor->first_name . ' ' . $professor->last_name}}</option>
                            @endforeach
                        </select>

                        @error('professors')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="subjects">Subjects</label>
                        <select
                            class="custom-select @error('subjects') is-invalid @enderror"
                            multiple
                            name="subjects[]"
                            id="subjects">
                            @foreach($subjects as $subject)
                                <option
                                    value="{{$subject->id}}">{{$subject->name}}</option>
                            @endforeach
                        </select>

                        @error('subjects')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <button type="submit" class="btn btn-primary">Enroll</button>
            </form>
        </div>
    </div>
@endsection

