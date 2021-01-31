<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saloon | Control Panel | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>
    <nav class="navbar-expand-lg navbar navbar-dark py-0 bg-dark sticky-top">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand"><i class="bi bi-scissors"></i> Saloon</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="bi bi-power"></i> LogOut
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    <nav class="navbar-expand-lg navbar p-0 navbar-dark bg-secondary sticky-top">
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_home')}}" class="nav-link"><i class="bi bi-speedometer2"></i> Dashboard</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_home')}}" class="nav-link"><i class="bi bi-clock-history"></i> History</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_home')}}" class="nav-link"><i class="bi bi-graph-up"></i> Analysis</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_profile')}}" class="nav-link"><i class="bi bi-person-circle"></i> Profile</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_profile')}}" class="nav-link"><i class="bi bi-chat-dots"></i> Messages</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_profile')}}" class="nav-link"><i class="bi bi-bookmark-star"></i> Saved</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_profile')}}" class="nav-link"><i class="bi bi-star"></i> Feedback</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_profile')}}" class="nav-link"><i class="bi bi-blockquote-right"></i> Blog</a>
                </li>
                <li class="nav-item mx-3">
                    <a href="{{route('saloon_setting')}}" class="nav-link"><i class="bi bi-gear-wide"></i> Setting</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <form action="{{route('saloon_isonline')}}" method="POST">
                        @csrf
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="isonline" name="isonline" onchange="this.form.submit()" @if ($saloon->getOrder)
                                {{'checked'}}
                            @endif>
                            <label class="form-check-label" for="isonline"><strong>@if ($saloon->getOrder)
                                {{'Online'}}
                            @else
                                {{'Offline'}}
                            @endif</strong></label>
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    @yield('content')
</body>
</html>