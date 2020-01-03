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
            <form method="post" action="{{ route('enrollments.update', $enrollment->id) }}">
                @method('PUT')
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="student_id">Student</label>
                        <select
                            class="custom-select @error('student_id') is-invalid @enderror"
                            name="student_id"
                            id="student_id">
                            <?php $chosen_student = $enrollment->student; ?>
                            @foreach($students as $student)
                                @if($student->id === $chosen_student->id)
                                    <option
                                        value="{{$student->id}}"
                                        selected>{{$student->first_name . ' ' . $student->last_name}}
                                    </option>
                                @else
                                    <option
                                        value="{{$student->id}}">{{$student->first_name . ' ' . $student->last_name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>

                        @error('student_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="professor_id">Professor</label>
                        <select
                            class="custom-select @error('professor_id') is-invalid @enderror"
                            name="professor_id"
                            id="professor_id">
                            <?php $chosen_professor = $enrollment->professor; ?>
                            @foreach($professors as $professor)
                                @if($professor->id === $chosen_professor->id)
                                    <option
                                        selected
                                        value="{{$professor->id}}">{{$professor->first_name . ' ' . $professor->last_name}}
                                    </option>
                                @else
                                    <option
                                        value="{{$professor->id}}">{{$professor->first_name . ' ' . $professor->last_name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>

                        @error('professor_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="subject_id">Subject</label>
                        <select
                            class="custom-select @error('subject_id') is-invalid @enderror"
                            name="subject_id"
                            id="subject_id">
                            <?php $chosen_subject = $enrollment->subject; ?>
                            @foreach($subjects as $subject)
                                @if($subject->id === $chosen_subject->id)
                                    <option
                                        selected
                                        value="{{$subject->id}}">{{$subject->name}}
                                    </option>
                                @else
                                    <option
                                        value="{{$subject->id}}">{{$subject->name}}
                                    </option>
                                @endif
                            @endforeach
                        </select>

                        @error('subject_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>


                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
