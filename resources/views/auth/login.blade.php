@extends('home.base')

@section('title', 'Login')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-5 mx-auto">
                <h3 class="lead mb-3">Saloon Login</h3>
                <form action="{{ route('login') }}" method="POST">
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Email</label>
                        <input type="email" class="form-control" name="email" autofocus>
                    </div>
                    @csrf
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="remember" name="remember">
                        <label for="remember" class="text-muted">Remember me</label>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-info text-white"><i class="bi bi-key"></i> LogIn</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection