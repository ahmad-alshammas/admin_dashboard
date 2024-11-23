@extends('admin.layout');

@section ('title') Edit Enrollment @endsection

@section ('content')

<div class="container">
    <h2>Edit Enrollment</h2>
    <form action="{{ route('enrollments.update', $enrollment->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- اختيار المستخدم -->
        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $enrollment->user_id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- اختيار الدورة -->
        <div class="mb-3">
            <label for="course_id" class="form-label">Course</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $enrollment->course_id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- تاريخ التسجيل -->
        <div class="mb-3">
            <label for="enrolled_at" class="form-label">Enrolled At</label>
            <input type="datetime-local" name="enrolled_at" id="enrolled_at" class="form-control" 
                   value="{{ date('Y-m-d\TH:i', strtotime($enrollment->enrolled_at)) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Enrollment</button>
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