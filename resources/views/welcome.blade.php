<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang ke e-kokuILPS</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background-color: #001233; /* Original background color */
            color: #fff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
        }

        .welcome-container {
            position: relative;
            z-index: 1;
            text-align: center;
            max-width: 800px;
        }

        .welcome-title {
            font-size: 4rem;
            font-weight: 700;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.7);
            animation: fadeInDown 1s ease-out;
        }

        .welcome-text {
            font-size: 1.8rem;
            margin-top: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
            animation: fadeIn 1.5s ease-in-out;
        }

        .buttons a {
            margin: 15px;
            padding: 15px 30px;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            border-radius: 50px;
        }

        .btn-primary {
            background-color: #4effa0;
            border: none;
            color: #000;
        }

        .btn-primary:hover {
            background-color: #2ecc71;
        }

        .btn-secondary {
            background-color: #fff;
            color: #001233;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #d9d9d9;
        }

        .carousel-item img {
            height: 350px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="background" id="particles-js"></div>

    <div class="container welcome-container">
        <h1 class="welcome-title">Selamat Datang ke e-kokuILPS!</h1>
        <p class="welcome-text">Sistem pengurusan yang direka untuk memudahkan pengalaman anda di ILPS.</p>

        <!-- Bootstrap Carousel -->
        <div id="imageCarousel" class="carousel slide my-4" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('image/apm1.jpg') }}" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/apm2.jpg') }}" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('image/apm3.jpg') }}" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="buttons">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg shadow">Log Masuk</a>
            <a href="{{ route('register') }}" class="btn btn-secondary btn-lg shadow">Daftar Akaun</a>
        </div>
    </div>

    <!-- Particles.js -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <!-- Particles.js -->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": { "value": 100, "density": { "enable": true, "value_area": 800 } },
            "color": { "value": "#4effa0" },
            "shape": { "type": "circle" },
            "opacity": { "value": 0.6 },
            "size": { "value": 4, "random": true },
            "line_linked": { "enable": true, "distance": 120, "color": "#4effa0", "opacity": 0.5, "width": 1 },
            "move": { "enable": true, "speed": 3, "direction": "none", "random": false, "straight": false, "out_mode": "out" }
        },
        "interactivity": {
            "events": {
                "onhover": { "enable": true, "mode": "grab" }, // Magnetic effect
                "onclick": { "enable": true, "mode": "push" },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 200,
                    "line_linked": { "opacity": 1 }
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });
</script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
