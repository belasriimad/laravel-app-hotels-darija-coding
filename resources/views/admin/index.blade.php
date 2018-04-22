@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('booking.index')}}">
                        <div class="card mx-auto bg-danger text-center text-white">
                            <div class="card-body">
                                <i class="fas fa-book fa-4x d-block mb-3"></i>
                                <h2><span class="badge badge-light">{{count($bookings)}}</span></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('rooms.index')}}">
                        <div class="card mx-auto bg-danger text-center text-white">
                            <div class="card-body">
                                <i class="fas fa-bath fa-4x d-block mb-3"></i>
                                <h2><span class="badge badge-light">{{count($rooms)}}</span></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('hotels.index')}}">
                        <div class="card mx-auto bg-danger text-center text-white">
                            <div class="card-body">
                                <i class="fas fa-home fa-4x d-block mb-3"></i>
                                <h2><span class="badge badge-light">{{count($hotels)}}</span></h2>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3">
                    <a href="{{route('users.index')}}">
                        <div class="card mx-auto bg-danger text-center text-white">
                            <div class="card-body">
                                <i class="fas fa-user fa-4x d-block mb-3"></i>
                                <h2><span class="badge badge-light">{{count($users) - 1}}</span></h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('footer')
    @include('includes.footer')
@endsection
