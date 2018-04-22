@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row mt-4">
        @foreach($rooms as $room)
            <div class="col-md-3">
                <a href="{{route('hotels.show',['id'=>$room->hotel_id])}}">
                    <div class="card p-0">
                        <div class="card-body">
                            <h4 class="card-title">{{$room->hotel->name}}</h4>
                            <img src="{{URL::to('images/'.$room->hotel->photo)}}" height="100" width="200" class="mb-2" alt="">
                            <p><i>{{$room->hotel->city}}</i></p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')

@endsection

@section('footer')
    @include('includes.footer')
@endsection
