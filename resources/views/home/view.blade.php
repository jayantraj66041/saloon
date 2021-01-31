@extends('home.base')

@section('title', 'Saloon')

@section('content')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-3">
                <div class="card">
                    @if ($saloon->logo==Null)
                        <img src="{{ asset('default-store.png') }}" class="card-img-top">
                    @else
                        <img src="{{ asset('logo/'.$saloon->logo) }}" class="card-img-top">
                    @endif
                </div>
            </div>
            <div class="col-lg-9 text-center">
                <h3 class="display-2 text-info">{{$saloon->name}}</h3>
                <p class="lead small">{{$saloon->location}}</p>
                <h4><strong class="text-danger mt-4">{{count($saloon->order)}}</strong> in Queue.</h4>
                <a href="#book" data-bs-toggle="modal" class="btn btn-success mt-4 btn-lg @if ($saloon->getOrder==False)
                    {{'disabled'}}
                @endif">Book Now</a>
            </div>
        </div>
    </div>
    @if ($saloon->getOrder)
    <div class="modal fade" id="book">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{route('book_order')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="p-0 m-0 small text-muted">Name*</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <input type="hidden" value="{{$saloon->id}}" name="user_id">
                        <div class="mb-3">
                            <label for="" class="p-0 m-0 small text-muted">Contact*</label>
                            <input type="number" class="form-control" name="contact" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="p-0 m-0 small text-muted">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="p-0 m-0 small text-muted">Message</label>
                            <textarea name="message" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary btn-lg" type="button" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-lg">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
@endsection