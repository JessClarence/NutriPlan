<x-guest-layout>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri Plan - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Existing styles from the login page */

        .already-registered {
            text-align: center;
            color: #4285f4;
            text-decoration: none;
            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
            background-size:58vmin;
            background-position:-76px;
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

    </style>
</head>
<body>
    <div class="login-container">
        <div class="left-section"> </div>
        <div class="right-section">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" 
                            required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="dob" :value="__('Date of Birth')" />
                    <x-text-input id="dob" class="block mt-1 w-full" type="date" name="dob" required />
                    <x-input-error :messages="$errors->get('dob')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="position" :value="__('Position')" />
                    <select id="position" name="position" class="block mt-1 w-full" required>
                        <option value="Nurse">{{ __('Nurse') }}</option>
                        <option value="Doctor">{{ __('Doctor') }}</option>
                        <option value="Dietitian">{{ __('Dietitian') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="already-registered" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</body>
</x-guest-layout>
