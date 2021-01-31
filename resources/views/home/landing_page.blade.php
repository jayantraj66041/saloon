@extends('home.base')    
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-3">
                <div class="list-group">
                    <div class="list-group-item list-group-item-action active">
                        <strong>Filter</strong>
                    </div>
                </div>
                <div class="list-group">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">All</a>
                </div>
                <div class="list-group">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Available</a>
                </div>
                <div class="list-group">
                    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Near By</a>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach ($saloons as $saloon)
                    <div class="col-lg-4 mb-3 px-2">
                        <a href="{{route('saloon', $saloon->id)}}" class="nav-link p-0">
                            <div class="card shadow-sm">
                                @if ($saloon->logo==Null)
                                    <img src="{{ asset('default-store.png') }}" class="card-img-top">
                                @else
                                    <img src="{{ asset('logo/'.$saloon->logo) }}" class="card-img-top">
                                @endif
                                <div class="card-body text-center text-muted">
                                    <h3 class="text-muted h5">{{$saloon->name}}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection