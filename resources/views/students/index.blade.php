@extends('layouts.app')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('students.create') }}" class="btn btn-outline-success">New Student</a>
        </div>
    </div>

    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Year Enrolled</th>
            <th scope="col">Years Of Study</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->enrollment_year }}</td>
                <td>{{ $student->years_of_study}}</td>
                <td class="text-center">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger ml-0 delete" value="{{$student->id}}"
                            route_name="students">
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $students->render() !!}
    </div>

@endsection

@section('custom_scripts')
    <script type="text/javascript">
        document.querySelector('table').addEventListener('click', function (e) {
            if (e.target.classList.contains('delete')) {
                const makeDelete = () => {
                    try {
                        return axios.delete('/' + e.target.getAttribute('route_name') + '/' + e.target.value);
                    } catch (error) {
                        console.log(error);
                    }
                };

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

