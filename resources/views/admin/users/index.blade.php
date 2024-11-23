@extends('admin.layout');

@section('title') users @endsection

@section('content')


<div class="card shadow mb-4">

    
   
    <div class="card-body">
        <div class="table-responsive">

           <a href="{{route('users.create')}}"><button type="button" class="btn btn-primary ml-4 mb-4 text-end">Add New User</button></a> 
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>role</th>
                        <th>Action</th>
                    </tr>
                </thead>
               
                <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->gender}}</td>
                    <td>{{$user->role}}</td>
                    
                    <td>
                       <a href="{{route('users.edit', $user->id)}}"> <button type="button" class="btn btn-info">Edit</button></a>
                       <form action="{{route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
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











