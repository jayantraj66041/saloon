@extends('saloon.base')

@section('title', 'Profile')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-3">
                <div class="card">
                    @if ($saloon->logo==NULL)
                        <img src="{{ asset('default-store.png') }}" class="card-img-top" alt="">
                    @else
                        <img src="{{ asset('logo/'.$saloon->logo) }}" alt="" class="card-img-top">
                    @endif
                    <div class="card-body p-0">
                        <form action="{{ route('saloon_update_logo_profile') }}" method="POST" enctype="multipart/form-data">
                            <div class="btn-group">
                                <input type="file" class="form-control form-control-sm" name="logo">
                                <input type="submit" title="Click to Update" value="Update" class="btn btn-sm btn-info">
                            </div>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form action="{{ route('saloon_update_profile') }}" method="POST">
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Shop Name</label>
                        <input type="text" class="form-control form-control-sm" value="{{ $saloon->name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Contact</label>
                        <input type="number" class="form-control form-control-sm" value="{{ $saloon->contact }}" name="contact">
                    </div>
                    <div class="mb-3">
                        <label for="" class="text-muted p-0 m-0 small">Email</label>
                        <input type="email" value="{{ $saloon->email }}" class="form-control form-control-sm" name="email" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Location</label>
                        <input type="text" class="form-control form-control-sm" name="location" value="{{ $saloon->location }}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Price</label>
                        <input type="text" class="form-control form-control-sm" name="price" value="{{ $saloon->price}}">
                    </div>
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Opening TIme</label>
                        <input type="time" class="form-control form-control-sm" name="opening_closing" disabled value="{{ $saloon->open_close }}">
                    </div>
                    @csrf
                    <div class="mb-3">
                        <label for="" class="p-0 m-0 small text-muted">Description</label>
                        <textarea class="form-control form-control-sm" name="description" rows="5">{{ $saloon->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-info">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection