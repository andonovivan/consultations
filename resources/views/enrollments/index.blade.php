@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Enrollments</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('enrollments.create') }}" class="btn btn-outline-success">New Enrollment</a>
        </div>
    </div>

    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Student Name</th>
            <th scope="col">Professor Name</th>
            <th scope="col">Subject Name</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($enrollments as $enrollment)
            <tr>
                <td>{{$enrollment->id}}</td>
                <td>{{ $enrollment->student->first_name . ' ' . $enrollment->student->last_name }}</td>
                <td>{{ $enrollment->professor->first_name . ' ' . $enrollment->professor->last_name }}</td>
                <td>{{ $enrollment->subject->name }}</td>
                <td class="text-center">
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger ml-0 delete" value="{{$enrollment->id}}">
                        Delete
                    </button>
                </td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {!! $enrollments->render() !!}
    </div>
@endsection

@section('custom_scripts')
    <script>
        document.querySelector('.table').addEventListener('click', function (e) {
            if (e.target.classList.contains('delete')) {
                const makeDelete = () => {
                    try {
                        return axios.delete('/enrollments/' + e.target.value);
                    } catch (error) {
                        console.log(error);
                    }
                }

                (async () => {
                    makeDelete()
                        .then(response => {
                            if (response.status === 200) {
                                e.target.parentNode.parentNode.remove();
                            }
                        })
                        .catch(err => console.log(err))
                })();
            }
        });
    </script>
@endsection
