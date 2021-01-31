@extends('saloon.base')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <div class="row my-3">
            @if ($queue_count!=0)
            <div class="col-lg-4">
                <h2 class="h4 lead">Queue List</h2>
                <?php $i=2;?>
                @foreach ($queue as $item)
                    <div class="list-group shadow-sm">
                        <a href="#" class="list-group-item list-group-item-action disabled">{{$i}}. {{$item->name}}</a>
                        <?php $i++;?>
                    </div>
                @endforeach
                @if ($queue_count>10)
                <div class="list-group shadow-sm">
                    <a href="#" class="list-group-item list-group-item-action active">View All ({{$queue_count}})</a>
                </div>
                @endif
            </div>
            <div class="col-lg-4">
                @foreach ($current as $item)
                <div class="card py-4 text-center text-white bg-warning">
                    <div class="card-body">
                        <h3 class="display-2">
                            <i class="bi bi-person"></i>
                        </h3>
                        <h3>{{$item->name}}</h3>
                        <p class="lead">{{$item->otp}}</p>
                        <div class="btn-group mt-3">
                            <a href="{{ route('saloon_done', $item->id) }}" class="btn-success btn px-4" title="Done">
                                <i class="bi bi-check-circle"></i>
                            </a>
                            <a href="{{ route('saloon_pending', $item->id) }}" class="btn-info btn text-white px-4" title="Pending">
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                            <a href="{{ route('saloon_remove', $item->id) }}" class="btn-danger btn px-4" title="Remove">
                                <i class="bi bi-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="col-lg-8">
                <h2 class="h4 lead">Queue List</h2>
                <p class="small text-muted">No pending data.</p>
            </div>
            @endif
            <div class="col-lg-4">
                <h2 class="h4 lead">Pending List</h2>
                @if (count($pending)==0)
                    <p class="small text-muted">No pending data.</p>
                @endif
                <?php $c = 1;?>
                @foreach ($pending as $item)
                <div class="list-group">
                    <div class="list-group-item list-group-item-action">
                        <span>{{$c}}<?php $c++;?>. {{$item->name}}</span>
                        <a href="{{ route('saloon_remove', $item->id) }}" class="btn btn-sm btn-danger float-end px-3" title="Remove">
                            <i class="bi bi-trash"></i>
                        </a>
                        <a href="{{ route('saloon_done', $item->id) }}" class="btn btn-sm btn-success me-2 px-3 float-end" title="Done">
                            <i class="bi bi-check-circle"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection