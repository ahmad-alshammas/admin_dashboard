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
        // Validate the input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Name is required, must be a string, and maximum 255 characters
            'email' => 'required|email|unique:users,email', // Email is required, must be valid, and unique in the "users" table
            'password' => [
                'required', // Password is required
                'string', // Must be a string
                'min:8', // Minimum length is 8 characters
                'regex:/[a-z]/', // Must contain at least one lowercase letter
                'regex:/[A-Z]/', // Must contain at least one uppercase letter
                'regex:/[0-9]/', // Must contain at least one number
                'regex:/[@$!%*?&]/', // Must contain at least one special character
             //   'confirmed', // Must match the "password_confirmation" field
            ],
        ], [
            // Custom error messages
            'password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.', // Message for invalid password format
            'password.confirmed' => 'The password confirmation does not match.', // Message for mismatched password confirmation
        ]);
    
        // Create a new user and hash the password before storing it
        User::create([
            'name' => $validatedData['name'], // Store the validated name
            'email' => $validatedData['email'], // Store the validated email
            'password' => bcrypt($validatedData['password']), // Hash and store the validated password
        ]);
    
        // Redirect back to the users list with a success message
        return redirect()->route('users.index')->with('successAdd', 'User added successfully!');
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
        // $gender = request()->gender;
        // $role = request()->role;
        $find_user = User::findOrFail($id);

        $find_user -> update([
            'name' => $name,
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
