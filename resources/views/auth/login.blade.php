<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <!-- تضمين Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* جعل الصورة بنفس ارتفاع النموذج */
        .login-image {
            height: 100%;
            width: 100%;
            object-fit: cover;
            border-radius: 10px; /* زوايا مدورة */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <!-- الصورة على اليسار -->
            <div class="col-md-6 d-none d-md-block">
                <img src="{{ asset('user_side/img/login.svg') }}" alt="Login Image" class="login-image">
            </div>

            <!-- نموذج تسجيل الدخول على اليمين -->
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Login') }}</h2>

                        <!-- رسالة حالة الجلسة -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- نموذج تسجيل الدخول -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- البريد الإلكتروني -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <!-- كلمة المرور -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                                @if ($errors->has('password'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <!-- تذكرني -->
                            <div class="form-check mb-3">
                                <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                <label for="remember_me" class="form-check-label">
                                    {{ __('Remember me') }}
                                </label>
                            </div>

                            <!-- زر تسجيل الدخول -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Log in') }}
                                </button>
                            </div>

                            <!-- زر التسجيل -->
                            <div class="text-center">
                                <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">{{ __('Register') }}</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- تضمين Bootstrap JS (اختياري) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>