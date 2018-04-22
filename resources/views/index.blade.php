@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 mt-4">
            <img src="{{URL::to('images/hotel.jpg')}}" height="350" alt="">
        </div>
        <div class="col-md-4 mx-auto mt-4">
            <div class="card bg-light border-primary">
                <div class="card-body">
                    <form action="{{route('hotel.search')}}" method="post">
                        <div class="form-group">
                            <label for="date_in">Date debut:</label>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <input type="date" class="form-control" required name="date_in">
                        </div>
                        <div class="form-group">
                            <label for="date_out">Date fin:</label>
                            <input type="date" class="form-control" required name="date_out">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" name="submit">Recherche</button>
                        </div>
                    </form>
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
