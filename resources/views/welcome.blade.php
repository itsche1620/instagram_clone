<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Instagram Landing Page</title>
    <style>
        body {
            background: linear-gradient(135deg, #a7c6ed, #c3d9e3, #e4f1f9, #b3e0f9, #8fc1e8);
            color: #333;
        }

        .main-content {
            padding: 100px 20px;
            border-radius: 10px;
            background-color: linear-gradient(135deg, #ffb3ba, #ffdfba, #ffffba, #baffc9, #bae1ff);

        }

        .card {
            margin-top: 30px;
            border: none;
        }

        .btn-custom {
            background-color: #D1E9F6;
            /* Custom button color */
            color: rgb(10, 10, 10);
        }

        .btn-custom:hover {
            background-color: #8EACCD;
            /* Darker shade on hover */
        }

        .footer {
            position: relative;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 20px;
            background-color: linear-gradient(135deg, #ffb3ba, #ffdfba, #ffffba, #baffc9, #bae1ff);
            margin-top: 118px;

        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                                @auth
                                    <a href="{{ url('/home') }}" class="nav-link">Home</a>
                                @else
                                    <!-- Removed the login and register links from the navbar -->
                                @endauth
                            </div>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <main class="main-content text-center">
            <div class="container">
                <h1 class="display-4 font-weight-bold">Welcome to Instagram</h1>
                <p class="lead">Share your moments and connect with friends.</p>

                <div class="card mx-auto" style="max-width: 400px;">
                    <div class="card-body">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-custom btn-block">Go to Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-custom btn-block">Log in</a>
                                <a href="{{ route('register') }}" class="btn btn-custom btn-block">Register</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} Instagram Clone. All rights reserved.</p>
        </footer>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
