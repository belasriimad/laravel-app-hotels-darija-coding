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
                            <a href="{{route('rooms.create')}}" class="btn btn-lg btn-primary float-md-right"><i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                    <table class="table">
                        <thead class="thead-danger">
                            <tr>
                                <th scope="col">Hôtel</th>
                                <th scope="col">Numéro</th>
                                <th scope="col">Etage</th>
                                <th scope="col">Disponibilité</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                            <tr>
                                <td>{{$room->hotel->name}}</td>
                                <td>{{$room->numero}}</td>
                                <td>{{$room->floor}}</td>
                                <td>
                                    @if($room->status == 0) 
                                        <div class="dispo">Disponible</div>
                                    @else    
                                        <div class="reserv">Résérvé</div>
                                    @endif
                                </td>
                                <td>
                                <a href="{{route('rooms.edit',['id'=>$room->id])}}" class="btn btn-xs btn-warning"><i class="fas fa-pencil-alt"></i></a>
                                <a href="{{route('room.delete',['id'=>$room->id])}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
