<x-guest-layout>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri Plan - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Existing styles from the login page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            color: #fff;
            background-color: #4285f4;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            margin-top: 20px;
        }

        .btn-login:hover {
            background-color: #357ae8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            font-size: 16px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }

        .left-section {
            width: 50%;
            background-image: url('images/limso1.png');
            background-size: 40vmin;
            background-position: 8px;
            position: relative;
        }

        .left-section .content {
            color: #fff;
            padding: 20px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            text-align: center;
        }

        .login-container {
            display: flex;
            background: #fff;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
            width: 150%;
            max-width: 900px;
        }

        .right-section {
            width: 50%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right-section form {
            width: 100%;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
            color: #4285f4;
            text-decoration: none;
            cursor: pointer;
        }

    </style>
</head>
    <!-- Login Module -->
    <div class="login-container">
        <div class="left-section"> </div>
        <div class="right-section">
        
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Login Form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="form-group">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-group mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <!-- Log in Button -->
                <button type="submit" class="btn-login mb-2">
                    {{ __('Log in') }}
                </button>

                <!-- Sign Up Link -->
                <div class="text-center">
                    <p>Don't have an account? 
                        <a class="signup-link" href="register" id="signupBtn">{{ __('Sign up') }}</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
