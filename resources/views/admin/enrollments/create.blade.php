@extends('admin.layout');

@section ('title') Add Enrollment @endsection

@section ('content')

<div class="ml-4">
 

    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="user_id" class="form-label">Student</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>

<!------------------------------------------------------------------------------------->
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'updated Succsufully',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        });
        
    </script>
@endif

@if(session('successAdd'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Add Succsufully',
            text: '{{ session('successAdd') }}',
            showConfirmButton: false,
            timer: 3000
        });

        
    </script>
@endif

@if(session('successDelete'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'delete Succsufully',
            text: '{{ session('successDelete') }}',
            showConfirmButton: false,
            timer: 3000
        });

        
    </script>
@endif


@endsection