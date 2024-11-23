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

            <a href="{{route('categories.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New Category</button></a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($categoires as $categoy)
                <tr>
                    <td>{{$categoy->category_id}}</td>
                    <td>{{$categoy->name}}</td>
                    <td>{{$categoy->description}}</td>
                    <td>
                        <a href="{{route('categories.edit', $categoy->category_id)}}"><button type="button" class="btn btn-info">Edit</button></a>
                        
                        <form action="{{route('categories.destroy', $categoy->category_id) }}" method="POST" style="display: inline;">
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