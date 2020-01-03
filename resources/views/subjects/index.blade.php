@extends('layouts.app')

@section('content')

    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Subjects</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('subjects.create') }}" class="btn btn-outline-success">New Subject</a>
        </div>
    </div>

    <table class="table table-striped table-hover table-sm">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Semester</th>
            <th colspan="2" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($subjects as $subject)
            <tr tr-id="{{$subject->id}}">
                <td>{{ $subject->id }}</td>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->semester }}</td>
                <td class="text-center">
                    <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <button type="button" class="btn btn-danger ml-0 delete" value="{{$subject->id}}"
                            route_name="subjects">
                        Delete
                    </button>
                </td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {!! $subjects->render() !!}
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
