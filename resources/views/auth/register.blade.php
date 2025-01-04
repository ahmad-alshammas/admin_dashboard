<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- تضمين Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* جعل الصورة بنفس ارتفاع النموذج */
        .register-image {
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
                <img src="{{ asset('user_side/img/register.svg') }}" alt="Register Image" class="register-image">
            </div>

            <!-- نموذج التسجيل على اليمين -->
            <div class="col-md-6">
                <div class="card p-4">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">{{ __('Register') }}</h2>

                        <!-- نموذج التسجيل -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- الاسم -->
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Name') }}</label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                                @if ($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <!-- البريد الإلكتروني -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email') }}</label>
                                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @if ($errors->has('email'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <!-- كلمة المرور -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                                @if ($errors->has('password'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>

                            <!-- تأكيد كلمة المرور -->
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                @if ($errors->has('password_confirmation'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                @endif
                            </div>

                            <!-- زر التسجيل -->
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="text-decoration-none" href="{{ route('login') }}">
                                    {{ __('Already registered?') }}
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
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