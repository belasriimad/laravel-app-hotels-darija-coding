@extends('layouts.main-layout')

@section('styles')

@endsection

@section('header')
    @include('includes.header')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{$error}}</div>
            @endforeach
            @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            <div class="card bg-danger">
                <div class="card-body">
                    <h3 class="card-title text-white">Connexion</h3>
                    <form action="{{route('user.auth')}}" method="post">
                        <div class="form-group">
                            <label for="email" class="text-white">Email*</label>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
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
