<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login - e-kokuILPS</title>
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

        /* Static blurred background */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('image/ilp.jpg') }}'); /* Background image */
            background-size: cover;
            background-position: center;
            z-index: -1;
            filter: blur(5px); /* Apply blur to the background */
        }

        .login-container {
            max-width: 400px;
            width: 100%;
            padding: 40px;
            background: rgba(22, 27, 34, 0.75);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            z-index: 1;
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
    </style>
</head>
<body>

<div class="background"></div>

<div class="login-container">
    <div class="logo">
        <img src="{{ asset('image/apm.png') }}" alt="Logo">
    </div>
    <h2>Login ke e-kokuILPS</h2>
    
    <!-- Display error messages if login fails -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
        </div>
        <div class="form-group">
            <label for="password">Kata Laluan</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan kata laluan" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="remember" name="remember">
            <label class="form-check-label" for="remember">Remember Me</label>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
        <a href="{{ route('register') }}" class="btn btn-link btn-block">Daftar Akaun</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
