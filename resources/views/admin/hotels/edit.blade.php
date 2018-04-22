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
                    <h3 class="card-title text-white">Modifier un hôtel</h3>
                    <form action="{{route('hotel.update',['id'=>$hotel->id])}}" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name" class="text-white">Libelé*</label>
                            <input type="hidden" name="_token" value="{{Session::token()}}">
                            <input type="text" name="name" id="name" placeholder="Libelé" class="form-control" value="{{$hotel->name}}">
                        </div>
                        <div class="form-group">
                            <label for="rooms" class="text-white">Chambres*</label>
                            <input type="number" name="rooms" id="rooms" placeholder="Chambres" class="form-control" value="{{$hotel->rooms}}">
                        </div>
                        <div class="form-group">
                            <label for="city" class="text-white">Ville*</label>
                            <input type="text" name="city" id="city" placeholder="Ville" class="form-control" value="{{$hotel->city}}">
                        </div>
                        <div class="form-group">
                            <label for="photo" class="text-white">Image*</label>
                            <input type="file" name="photo" id="file" class="form-control">
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
