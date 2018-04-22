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
                    <h3 class="card-title text-white">Ajouter une chambre</h3>
                    <form action="{{route('rooms.store')}}" method="post">
                        <div class="form-group">
                            <label for="hotel_id" class="text-white">Hôtel*</label>
                            <select name="hotel_id" id="hotel_id" class="form-control">
                                @foreach($hotels as $hotel)
                                    <option value="{{$hotel->id}}">{{$hotel->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numero" class="text-white">Numéro*</label>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <input type="number" name="numero" id="numero" placeholder="Numéro" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="floor" class="text-white">Etage*</label>
                            <input type="number" name="floor" id="floor" placeholder="Etage" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status" class="text-white">Disponibilité*</label>
                            <select name="status" id="status" class="form-control">
                                <option value="1">Résérvée</option>
                                <option value="0" selected>Disponible</option>
                            </select>
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
