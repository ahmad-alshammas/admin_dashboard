<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    @include('user_side.inc.bootstrap') <!-- Include Bootstrap if you are using it -->
    <style>
        .profile-image {
            width: 100%;
            max-width: 300px; /* Adjust the size as needed */
            height: auto;
            border-radius: 10px; /* Optional: Add rounded corners */
        }

        .col-md-10 {
           margin-top: 12%;
        }
    </style>
</head>
<body>
    <header class="main_menu home_menu">
        @include('user_side.inc.header') <!-- Include the Header -->
    </header>

    <div class="container mt-5 formProfile">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <div class="card-body">
                        <!-- Display success messages -->
                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success">
                                Profile updated successfully.
                            </div>
                        @endif

                        @if (session('status') === 'password-updated')
                            <div class="alert alert-success">
                                Password updated successfully.
                            </div>
                        @endif

                        <div class="row">
                            <!-- Static Image on the Left -->
                            <div class="col-md-6 text-center">
                                <img src="{{ asset('user_side/img/profile.svg') }}" alt="Static Image" class="profile-image">
                            </div>

                            <!-- Profile Information Form on the Right -->
                            <div class="col-md-6">
                                <form method="POST" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('PATCH') <!-- استخدام PATCH بدلاً من PUT -->

                                    <!-- Name Field -->
                                    <div class="form-group mb-3">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Email Field -->
                                    <div class="form-group mb-3">
                                        <label for="email">Email:</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Save Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>

                                <!-- Password Update Form -->
                                <hr class="my-4">
                                <h5 class="card-title">Update Password</h5>
                                <form method="POST" action="{{ route('profile.password.update') }}">
                                    @csrf
                                    @method('PUT')

                                    <!-- Current Password Field -->
                                    <div class="form-group mb-3">
                                        <label for="current_password">Current Password:</label>
                                        <input type="password" name="current_password" id="current_password" class="form-control" required>
                                        @error('current_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- New Password Field -->
                                    <div class="form-group mb-3">
                                        <label for="password">New Password:</label>
                                        <input type="password" name="password" id="password" class="form-control" required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <!-- Confirm New Password Field -->
                                    <div class="form-group mb-3">
                                        <label for="password_confirmation">Confirm New Password:</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                    </div>

                                    <!-- Save Button -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('user_side.inc.jquery') <!-- Include jQuery if you are using it -->
</body>
</html>