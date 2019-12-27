<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th colspan="2">Actions</th>
        <th scope="col"><a href="{{ route('professors.create') }}" class="btn btn-success">New Professor</a></th>
    </tr>
    </thead>
    <tbody>
    @foreach($professors as $professor)
        <tr>
            <td>{{ $professor->id }}</td>
            <td>{{ $professor->first_name }}</td>
            <td>{{ $professor->last_name }}</td>
            <td>{{ $professor->email }}</td>
            <td>
                <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <button type="button" class="btn btn-danger ml-0 delete" value="{{$professor->id}}" route_name="professors">Delete</button>
            </td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
