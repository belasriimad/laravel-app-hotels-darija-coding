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
            <div class="card mx-auto bg-light">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <a href="{{route('hotels.create')}}" class="btn btn-lg btn-primary float-md-right"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-danger">
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Chambres</th>
                                <th scope="col">Ville</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hotels as $hotel)
                            <tr>
                                <td><img src="{{URL::to('images/'.$hotel->photo)}}" width="50" height="50" alt=""></td>
                                <td>{{$hotel->name}}</td>
                                <td>{{$hotel->rooms}}</td>
                                <td>
                                    {{$hotel->city}}
                                </td>
                                <td>
                                <a href="{{route('hotels.edit',['id'=>$hotel->id])}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('hotel.delete',['id'=>$hotel->id])}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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
