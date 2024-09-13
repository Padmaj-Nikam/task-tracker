@extends('layouts.app')

@section('title', 'Welcome')


@section('content')
        <div class="container mt-4 text-center">
            <h1>Welcome to task-tracker</h1>
            <h6>Track your tasks and boost your and your team's productive 10x</h6>
        </div>
        <div class="container mt-4 px-10 text-center">
            <h3>Register or Login and have fun!</h3>
        </div>

        <!-- Footer -->
        <footer class="bg-light text-left text-lg-start mt-auto">
            <div class="container p-5">
                <div class="row">
                    <div class="col-md-6 px-10">
                        <p>&copy; {{ date('Y') }} task-tracker. All rights reserved with Padmaj Nikam but feel free to contribute.</p>
                    </div>
                    <div class="col-md-6 text-right">
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
@endsection

