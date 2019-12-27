@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Update Professor
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('professors.update', $professor->id)}}">
                @csrf
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text"
                           class="form-control @error('first_name') is-invalid @enderror"
                           id="first_name"
                           name="first_name"
                           value="{{ $professor->first_name }}"
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
                           value="{{ $professor->last_name }}"
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
                           value="{{ $professor->email }}"
                           placeholder="Enter Email Address">

                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
