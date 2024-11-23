@extends('admin.layout')

@section ('title') Enrollments @endsection

@section ('content')

<div class="ml-4">
    
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary mb-3">Add Enrollment</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th>Enrolled At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
            <tr>
                <td>{{ $enrollment->id }}</td>
                <td>{{ $enrollment->user->name }}</td>
                <td>{{ $enrollment->course->title }}</td>
                <td>{{ $enrollment->created_at }}</td>
                <td>
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-info">Edit</a>
                    <form action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection