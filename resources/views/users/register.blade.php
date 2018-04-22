@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            <div class="card bg-danger">
                <div class="card-body">
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                    @if(Session::has('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    <h3 class="card-title text-white">Inscription</h3>
                    <form action="{{route('users.store')}}" method="post">
                        <div class="form-group">
                            <label for="nom" class="text-white">Nom*</label>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <input type="text" name="nom" id="firstname" placeholder="Nom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="prenom" class="text-white">Prénom*</label>
                            <input type="text" name="prenom" id="lastname" placeholder="Prénom" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="adress" class="text-white">Adresse*</label>
                            <input type="text" name="adress" id="adress" placeholder="Adresse" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="zipcode" class="text-white">Code postal*</label>
                            <input type="number" name="zipcode" id="zipcode" placeholder="Code postal" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="city" class="text-white">Ville*</label>
                            <input type="text" name="city" id="city" placeholder="Ville" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">Email*</label>
                            <input type="email" name="email" id="email" placeholder="E-mail" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Mot de passe*</label>
                            <input type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger btn-general" name="submit" type="submit">Valider</button>
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
