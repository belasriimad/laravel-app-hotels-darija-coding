<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/fontawesome-all.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}">
    @yield('styles')
    <title>Hotel Marhaba</title>
</head>
<body>
    @yield('header')
    <div class="container">
        @yield('content')
    </div>
    @yield('footer')
    @yield('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>
    <script src=""></script>
</body>
</html>