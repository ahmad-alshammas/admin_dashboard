@extends('admin.layout');

@section ('title') Courses @endsection

@section ('content')

<div class="card shadow mb-4">

{{--     
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">

            <a href="{{route('courses.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New Course</button></a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>price</th>
                        <th>image</th>
                        <th>instructor</th>
                        <th>category</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->title}}</td>
                    
                    <td>{{$course->price}}</td>
                    <td>
                        <img src="{{asset($course->image)}}" width="100px" height="100px" alt="image">
                    </td>
                    <td>{{ $course->instructor->name}}</td>
                    <td>{{ $course->category ? $course->category->name : 'No Category' }}</td>
                    <td>
                        <a href="{{route('courses.edit', $course->id)}}"><button type="button" class="btn btn-info">Edit</button></a>
                        
                        <form action="{{route('courses.destroy', $course->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                            
                        
                    </td>
                </tr>
                @endforeach       
                </tbody>   
            </table>
        </div>
    </div>
</div>


@endsection