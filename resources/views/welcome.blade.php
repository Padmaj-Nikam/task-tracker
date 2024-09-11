<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task-tracker</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <!-- Navbar with Login and Register buttons -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">task-tracker</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Page content -->
    <div class="container mt-4">
        <h1>Welcome to task-tracker</h1>
        <h6>Track your tasks and boost your and your team's productive 10x</h6>
    </div>
    <div class="container mt-4">
        <h3>Register or Login and have fun!</h3>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center text-lg-start mt-auto">
        <div class="container p-5">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; {{ date('Y') }} task-tracker. All rights reserved with Padmaj Nikam but feel free to contribute.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li><a href="https://github.com/Padmaj-Nikam/task-tracker" target="_blank">Contribute at</a></li>
                        <li><a href="mailto:nikampadmaj@gmail.com">Write to Me</a></li>
                        <li><a href="https://github.com/Padmaj-Nikam" target="_blank">GitHub</a></li>
                        <li><a href="https://www.instagram.com/padmaj_nikam/" target="_blank">Instagram</a></li>
                        <li><a href="https://www.linkedin.com/in/nikampadmaj/" target="_blank">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

