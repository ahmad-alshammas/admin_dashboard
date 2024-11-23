@extends('admin.layout');

@section ('title') Sections @endsection

@section ('content')

<div class="card shadow mb-4">

{{--     
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div> --}}
    <div class="card-body">
        <div class="table-responsive">

            <a href="{{route('sections.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New Section</button></a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>order</th>
                        <th>Total</th>
                        <th>course</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($sections as $section)
                <tr>
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->title }}</td>
                    <td>{{ $section->order }}</td>
                    <td>{{ $section->total }}</td>
                    <td>{{ $section->course->title }}</td>
                    <td>
                        <a href="{{route('sections.edit', $section->id)}}"><button type="button" class="btn btn-info">Edit</button></a>
                        
                        <form action="{{route('sections.destroy', $section->id) }}" method="POST" style="display: inline;">
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