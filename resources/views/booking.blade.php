@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mt-4">
            <div class="card mx-auto bg-light">
                <div class="card-body">
                    @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <table class="table">
                        <thead class="thead-danger">
                            <tr>
                                <th scope="col">Numéro</th>
                                <th scope="col">Etage</th>
                                <th scope="col">Disponibilité</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rooms as $room)
                                <tr>
                                    <td>{{$room->numero}}</td>
                                    <td>{{$room->floor}}</td>
                                    <td>
                                        @if($room->status)
                                            <div class="reserv">Résérvé</div><span class="badge badge-pill badge-info mt-1 p-1">Sera disponible {{$room->date_out}}</span>
                                        @else
                                            @if(Auth::user())
                                                <button class="btn btn-outline-danger" data-toggle="modal" data-target="#bookingModal{{$room->numero}}">Résérver</button>
                                            @else
                                                <a href="{{route('user.login')}}" class="btn btn-outline-danger">Résérver</a>
                                            @endif
                                        @endif 
                                    </td>
                                </tr>
                                <div class="modal fade" id="bookingModal{{$room->numero}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Réserver chambre numéro {{$room->numero}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('booking.store')}}" method="post">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="dateDebut">Date debut:</label>
                                                        <input type="date" class="form-control" name="dateDebut">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="dateDebut">Date fin:</label>
                                                        <input type="date" class="form-control" name="dateFin">
                                                        <input type="hidden" name="room_id" value="{{$room->id}}">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                                    <button type="submit" class="btn btn-primary">Valider</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
