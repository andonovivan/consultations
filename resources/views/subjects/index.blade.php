<table class="table table-striped table-hover subjects" id="subjects">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Semester</th>
        <th colspan="2">Actions</th>
        <th scope="col"><a href="{{ route('subjects.create') }}" class="btn btn-success">New Subject</a></th>
    </tr>
    </thead>
    <tbody>
    @foreach($subjects as $subject)
        <tr tr-id="{{$subject->id}}">
            <td>{{ $subject->id }}</td>
            <td>{{ $subject->name }}</td>
            <td>{{ $subject->semester }}</td>
            <td>
                <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <button type="button" class="btn btn-danger ml-0 delete" value="{{$subject->id}}" route_name="subjects">
                    Delete
                </button>
            </td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
