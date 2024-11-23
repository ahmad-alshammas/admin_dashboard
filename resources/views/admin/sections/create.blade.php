@extends ('admin.layout')

@section('title') Create Course @endsection

@section ('content')

  <form action="{{ route('sections.store') }}" method="POST" class="ml-4">
      @csrf
      <div class="form-group">
          <label for="course_id">Course</label>
          <select name="course_id" id="course_id" class="form-control">
              @foreach ($courses as $course)
                  <option value="{{ $course->id }}">{{ $course->title }}</option>
              @endforeach
          </select>
      </div>
      <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" id="title" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="order">Order</label>
          <input type="number" name="order" id="order" class="form-control" required>
      </div>
      <div class="form-group">
          <label for="total">Total</label>
          <input type="number" name="total" id="total" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-success">Add Section</button>
  </form>
@endsection