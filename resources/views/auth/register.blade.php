<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Register - e-kokuILPS</title>
    <style>
        body {
            background-color: #0d1117;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            overflow: hidden;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('image/ilp.jpg') }}'); /* Using Laravel asset helper */
            background-size: cover;
            background-position: center;
            z-index: -1;
            filter: blur(5px); /* Apply blur to the background */
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            background: rgba(22, 27, 34, 0.75); /* More transparency for a clearer background */
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 1;
            backdrop-filter: blur(5px); /* Add blur inside the container */
        }

        .form-check-label {
            font-size: 0.85rem;
            color: #c9d1d9;
        }

        .login-container h2 {
            font-size: 1.8rem;
            color: #c9d1d9;
            margin-bottom: 30px;
            text-align: center;
        }

        .login-container .form-group label {
            font-weight: bold;
            color: #c9d1d9;
        }

        .form-control {
            background-color: #0d1117;
            color: #c9d1d9;
            border: 1px solid transparent;
        }

        .form-control:focus {
            background-color: #161b22;
            color: #c9d1d9;
            border-color: #58a6ff;
            box-shadow: none;
        }

        .btn-primary {
            background-color: #238636;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2ea043;
        }

        .btn-link {
            color: #58a6ff;
            text-align: center;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo img {
            width: 150px;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .ms-4 {
            margin-left: 1rem;
        }
    </style>
</head>
<body>

<div class="background"></div> <!-- Parallax background -->

<div class="login-container">
    <div class="logo">
        <img src="{{ asset('image/apm.png') }}" alt="Logo"> <!-- Laravel asset helper for logo -->
    </div>
    <h2>Daftar Akaun</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control" name="name" :value="old('name')" required autofocus autocomplete="name">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group mt-4">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control" name="email" :value="old('email')" required autocomplete="username">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group mt-4">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group mt-4">
            <label for="password_confirmation">{{ __('Confirm Password') }}</label>
            <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="btn-link" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <button type="submit" class="btn btn-primary ms-4">
                {{ __('Register') }}
            </button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
