@extends('admin.layout');

@section ('title') Edit lesson @endsection

@section ('content')
<div class="ml-4">
  

    <form action="{{ route('lessons.update', $lesson->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="mb-3">
            <label for="section_id" class="form-label">Section</label>
            <select name="section_id" id="section_id" class="form-control">
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" 
                        {{ $lesson->section_id == $section->id ? 'selected' : '' }}>
                        {{ $section->title }}
                    </option>
                @endforeach
            </select>
        </div>

        
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $lesson->title }}" required>
        </div>



      
        <div class="mb-3">
            <label for="order" class="form-label">Order</label>
            <input type="number" name="order" id="order" class="form-control" value="{{ $lesson->order }}" required>
        </div>

      
        <button type="submit" class="btn btn-primary">Update Lesson</button>
    </form>
</div>

@endsection