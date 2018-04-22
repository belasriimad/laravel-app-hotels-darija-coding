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
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Adresse:</th>
                                <th scope="col">Ville:</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->lastname}}</td>
                                <td> {{$user->adress}}</td>
                                <td>
                                    {{$user->city}}
                                </td>
                                <td>
                                    <a href="{{route('users.delete',['id'=>$user->id])}}" class="btn btn-xs btn-danger"><i class="fas fa-trash"></i></a>
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
