
<x-layouts.app title="Students">
    <h1>Students</h1>

    <a class="btn" href="{{ route('students.create') }}">
        Create Student
    </a>

    @if($students->isEmpty())
        <p>No students found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            <a href="{{ route('students.show', $student) }}">View</a>
                            <a href="{{ route('students.edit', $student) }}">Edit</a>

                            <x-delete-form
                                :action="route('students.destroy', $student)"
                            />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</x-layouts.app>