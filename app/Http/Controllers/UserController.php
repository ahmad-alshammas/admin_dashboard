<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index',['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request -> validate([
        //     'title' => 'required | max:255 | string',
        //     'description' => 'required | max:255 | string',
        //     'price' => 'required | numeric',
        //     'image' => 'required | mimes:png,jpg,jpeg',
        // ]);

        User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
            'gender' => $request -> gender,
            'role' => $request -> role,
        ]);

            return redirect()->route('users.index')->with('successAdd','users Added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id){
        $name = request()->name;
        $gender = request()->gender;
        $role = request()->role;
        $find_user = User::findOrFail($id);

        $find_user -> update([
            'name' => $name,
            'gender' => $gender,
            'role' => $role,
        ]);

        return redirect()->route('users.index',$id)->with('successUpdate', 'User updated successfully!');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('successDelete', 'User deleted successfully!');
    }
}
