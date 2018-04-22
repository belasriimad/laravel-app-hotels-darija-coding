<nav class="navbar navbar-expand-lg navbar-light bg-danger main-nav">
  <a class="navbar-brand" href="{{url('/')}}">Hotel Marhaba</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('hotels.index')}}">Hôtels</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('booking.index')}}">Réservations</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Compte
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          @if(!Auth::user())
          <a class="dropdown-item" href="{{route('users.create')}}">Inscription</a>
          <a class="dropdown-item" href="{{route('user.login')}}">Connexion</a>
          @else
            @if(Auth::user()->isAdmin)
              <a class="dropdown-item" href="{{route('user.admin')}}">Admin</a>
            @endif
            <a class="dropdown-item" href="{{route('user.profile')}}">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a>
            <a class="dropdown-item" href="{{route('user.logout')}}">Déconnexion</a>
          @endif
        </div>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="{{route('hotel.search')}}">
      <input type="hidden" name="_token" value="{{Session::token()}}">
      <input class="form-control mr-sm-2" type="search" name="hotel" placeholder="Recherche" aria-label="Search">
      <button class="btn btn-danger my-2 my-sm-0" type="submit"><i class="fa fa-search fa-x2"></i></button>
    </form>
  </div>
</nav>