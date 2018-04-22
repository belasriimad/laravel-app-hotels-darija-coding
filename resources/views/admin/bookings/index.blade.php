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
                    <table class="table">
                        <thead class="thead-danger">
                            <tr>
                                <th scope="col">Hôtel</th>
                                <th scope="col">Numéro</th>
                                <th scope="col">Etage</th>
                                <th scope="col">Résérvée par:</th>
                                <th scope="col">Date début</th>
                                <th scope="col">Date fin</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $book)
                            <tr>
                                <td>{{App\Hotel::find($book->room->hotel_id)->name}}</td>
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
