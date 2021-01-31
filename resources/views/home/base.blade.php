<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saloon | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar-expand-lg navbar navbar-dark bg-warning sticky-top">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand"><i class="bi bi-scissors"></i> Saloon</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="bi bi-house-door"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link"><i class="bi bi-file-earmark"></i> Register</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link"><i class="bi bi-lock"></i> Login</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link"><i class="bi bi-shield-check"></i> Privecy Policy</a>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>