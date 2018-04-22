@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <div class="card bg-light">
                <div class="card-body">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <h3 class="card-title text-white"></h3>
                    <ul class="list-goup">
                        <li class="list-group-item">Nom : {{Auth::user()->firstname}}</li>
                        <li class="list-group-item">Prénom :  {{Auth::user()->lastname}}</li>
                        <li class="list-group-item">Adresse :  {{Auth::user()->adress}}</li>
                        <li class="list-group-item">Ville : {{Auth::user()->city}}</li>
                        <li class="list-group-item">Email :  {{Auth::user()->email}}</li>
                        <li class="list-group-item"><a href="{{route('users.edit',['id'=>Auth::user()->id])}}" class="btn btn-link">Modifier mon compte</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
        @if(count(Auth::user()->bookings) > 0)
            <table class="table">
                <thead class="thead-danger">
                    <tr>
                        <th scope="col">Numéro</th>
                        <th scope="col">Etage</th>
                        <th scope="col">Résérvée par:</th>
                        <th scope="col">Date début</th>
                        <th scope="col">Date fin</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(Auth::user()->bookings as $book)
                    <tr>
                        <td>{{$book->room->numero}}</td>
                        <td>{{$book->room->floor}}</td>
                        <td> {{$book->user->firstname}} {{$book->user->lastname}}</td>
                        <td>
                            {{$book->date_in}}
                        </td>
                        <td>
                            {{$book->date_out}}
                        </td>
                        <td>
                            <a href="{{route('booking.delete',['id'=>$book->id])}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info">Aucune résérvation.</div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')

@endsection

@section('footer')
    @include('includes.footer')
@endsection
