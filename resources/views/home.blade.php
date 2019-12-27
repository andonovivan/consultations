@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ $source === null || $source === 'students' ? 'active' : ''}}" id="students-tab"
               data-toggle="tab" href="#students" role="tab"
               aria-controls="students"
               aria-selected="true">Students</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $source === 'professors' ? 'show active' : ''}}" id="professors-tab" data-toggle="tab"
               href="#professors" role="tab"
               aria-controls="professors"
               aria-selected="false">Professors</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $source === 'subjects' ? 'show active' : ''}}" id="subjects-tab" data-toggle="tab"
               href="#subjects" role="tab" aria-controls="subjects"
               aria-selected="false">Subjects</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade {{ $source === null || $source === 'students' ? 'show active' : ''}}" id="students"
             role="tabpanel"
             aria-labelledby="students-tab">
            @include('students.index')
        </div>
        <div class="tab-pane fade {{ $source === 'professors' ? 'show active' : ''}}" id="professors" role="tabpanel"
             aria-labelledby="professors-tab">
            @include('professors.index')
        </div>
        <div class="tab-pane fade {{ $source === 'subjects' ? 'show active' : ''}}" id="subjects" role="tabpanel"
             aria-labelledby="subjects-tab">
            @include('subjects.index')
        </div>
    </div>
@endsection
