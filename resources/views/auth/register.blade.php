@extends('home.base')

@section('title', 'Register')

@section('content')
    <div class="container">
        <div class="row my-5">
            <div class="col-lg-5 mx-auto">
                <h3 class="lead mb-3">Saloon SignUp</h3>
                <form action="{{ route('register') }}" method="POST">
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Saloon Name</label>
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Re-enter Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                    @csrf
                    <div class="mb-3">
                        <button type="submit" class="btn text-white btn-info"><i class="bi bi-globe"></i> SignUp</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection