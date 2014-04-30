<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="The very silent database for deployments">

    <title>SilentDB.it</title>

    <!-- Bootstrap core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/style.css') }}
    @yield('styles')
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ URL::to('/')}}">SilentDB.it</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li class="active">{{ HTML::link('/', 'Accueil') }}</li>
              <li><a href="#about">Nouveautés</a></li>
              <li><a href="#contact">Contact</a></li>
          </ul>
        
          @if(Auth::check())
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <b class="caret"></b></a>
              <ul class="dropdown-menu">
                @if(Auth::user()->is_admin())
                <li>{{ HTML::link('admin', 'Administration') }}</li>
                @endif
                <li>{{ HTML::link('user/'.Auth::user()->id, 'Profil') }}</li>
                <li class="divider"></li>
                <li>{{ HTML::link('user/logout', 'Déconnexion') }}</li>
              </ul>
            </li>
          </ul>
          @else
          <div class="navbar-form navbar-right">
            {{ HTML::link('user/login', 'Connexion', array('class' => 'btn btn-success')) }}
            {{ HTML::link('user/create', 'Inscription', array('class' => 'btn btn-primary')) }}
          </div>
          @endif
        </div>
      </div>
    </div>

    <div class="content">
      @yield('jumbotron')

      <div class="container">
        <div class="row">
          @yield('title')
          @include('elements.alert')
          @yield('content')
          @include('elements.debug')
        </div>
        
        <hr>

        <footer>
          <p>&copy; Company 2014</p>
        </footer>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    {{ HTML::script('js/bootstrap.min.js') }}
    @yield('scripts')
  </body>
</html>
