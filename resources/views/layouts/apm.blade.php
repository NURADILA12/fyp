<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - ekokuILPS')</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Custom sidebar styling */
        body {
            min-height: 100vh;
            display: flex;
            transition: background-color 0.3s, color 0.3s;
            font-family: 'Poppins', sans-serif;
        }
        .sidebar {
            min-width: 250px;
            background-color: #212529;
            color: white;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            transition: all 0.3s ease;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
        }
        .sidebar a i {
            font-size: 20px;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #343a40;
            color: #f8f9fa;
        }
        .sidebar a:hover i {
            transform: scale(1.2);
            color: #f8f9fa;
        }
        .sidebar .brand-title h2 {
            font-weight: bold;
            text-transform: uppercase;
            color: #f8f9fa;
            margin-bottom: 1rem;
        }
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            transition: all 0.3s ease;
        }
        /* Additional styles for dark mode */
        .dark-mode {
            background-color: #121212;
            color: #ffffff;
        }
        .dark-mode .sidebar {
            background-color: #1c1c1c;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }
        .dark-mode .sidebar a:hover {
            background-color: #2a2a2a;
        }
        .dark-mode .sidebar a i {
            color: #9f9f9f;
        }
        .dark-mode .sidebar a:hover i {
            color: #ffffff;
        }
        .dark-mode .content {
            background-color: #212529;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar d-flex flex-column p-3">
        <div class="brand-title">
            <h2 class="text-center">ekokuILPS</h2>
        </div>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('apm.dashboard') }}">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('apm.kehadiran') }}">
                    <i class="bi bi-calendar-check"></i> Kehadiran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('apm.laporan') }}">
                    <i class="bi bi-file-earmark-text"></i> Laporan
                </a>
            </li>
        </ul>
        <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="mt-auto">
            @csrf
            <button type="submit" class="btn btn-danger btn-lg w-100">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
        
        <button class="btn btn-primary mt-3" id="darkModeToggle">
            <i class="bi bi-moon-stars"></i> Toggle Dark Mode
        </button>
        
    </nav>

    <!-- Main content -->
    <div class="content">
        @yield('content')
        
    </div>

    <!-- Scripts here -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
    <!-- Custom script for dark mode -->
    <script>
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;
        const storedTheme = localStorage.getItem('theme');

        // Check if dark mode is set in local storage
        if (storedTheme === 'dark') {
            body.classList.add('dark-mode');
        }

        // Toggle dark mode on button click
        darkModeToggle.addEventListener('click', () => {
            body.classList.toggle('dark-mode');
            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('theme', 'dark');
            } else {
                localStorage.setItem('theme', 'light');
            }
        });
    </script>
</body>
</html>
