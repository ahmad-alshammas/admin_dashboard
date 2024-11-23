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
                <td>{{ optional($enrollment->course)->title }}</td>
                <td>{{ $enrollment->created_at }}</td>
                <td>
                    <a href="{{ route('enrollments.edit', $enrollment->id) }}" class="btn btn-info">Edit</a>
                    <form id="delete-form-{{ $enrollment->id }}" action="{{ route('enrollments.destroy', $enrollment->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    
                    <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $enrollment->id }})">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(enrollmentId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`delete-form-${enrollmentId}`).submit();
            }
        });
    }
</script>


@endsection