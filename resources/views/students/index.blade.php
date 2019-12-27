<table class="table table-striped table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Year Enrolled</th>
        <th scope="col">Years Of Study</th>
        <th colspan="2">Actions</th>
        <th scope="col"><a href="{{ route('students.create') }}" class="btn btn-success">New Student</a></th>
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
            <td>{{ $student->years_of_study }}</td>
            <td>
                <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">Edit</a>
            </td>
            <td>
                <form method="post" action="{{ route('students.destroy', $student->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ml-0">Delete</button>
                </form>
            </td>
            <td></td>
        </tr>
    @endforeach
    </tbody>
</table>
