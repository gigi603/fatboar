<nav class="navbar navbar-expand-lg navbar-white">
    <a class="navbar-brand" href="/"><img src="{{ asset('img/logo.png') }}" width="70" height="60" alt="" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav ml-auto">
            @if(Auth::check() && Auth::user()->provider == "facebook"
                    || Auth::check() && Auth::user()->provider == "google")
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile', Auth::User()->id) }}">
                        {{ __('Aller sur mon profile') }}
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Me déconnecter') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            @elseif(Auth::check() && Auth::user()->role_id == 1)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile', Auth::User()->id) }}">
                        <span class="fa fa-user"></span> Mon profile
                    </a>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.participer') }}">
                            <span class="fa fa-user"></span> Participer
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('user.gains') }}">
                            <span class="fas fa-money-bill-wave-alt"></span> Mes gains
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('communs.contact') }}">
                            <span class="fa fa-paper-plane"></span> Nous contacter
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt" aria-hidden="true">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </span>
                            Me déconnecter
                        </a>
                    </li>
            @elseif(Auth::check() && Auth::user()->role_id == 2)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile', Auth::User()->id) }}">
                        <span class="fa fa-user"></span> Mon profile
                    </a>
                    <li>
                        <li>
                            <a class="dropdown-item" href="{{route('caissiere.utilisateurs')}}">
                                <span class="fa fa-user"></span>
                                Utilisateurs
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('caissiere.dashboard')}}">
                                <span class="fas fa-money-bill-wave-alt"></span>
                                Participations
                            </a>
                        </li>
                        <a class="dropdown-item" href="{{route('caissiere.listMessages')}}">
                        <span class="fas fa-envelope"></span>
                        Messages du personnel
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('communs.contact') }}">
                            <span class="fa fa-paper-plane"></span> Contacter un administrateur
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt" aria-hidden="true">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </span>
                            Me déconnecter
                        </a>
                    </li>
            @elseif(Auth::check() && Auth::user()->role_id == 3)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile', Auth::User()->id) }}">
                        <span class="fa fa-user"></span>mon profile
                    </a>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.listMessages')}}">
                            <span class="fas fa-envelope"></span>
                            Messages du personnel
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.participants')}}">
                            <span class="fas fa-chart-bar"></span>
                            Statistiques des participants
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.statistiqueRecompensesInitiales')}}">
                            <span class="fas fa-chart-bar"></span>
                            Statistiques des récompenses initiales
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.dashboard')}}">
                            <span class="fas fa-chart-bar"></span>
                            Statistiques des récompenses récupérés
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('communs.contact') }}">
                            <span class="fa fa-paper-plane"></span> Contacter un administrateur
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt" aria-hidden="true">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </span>
                            Me déconnecter
                        </a>
                    </li>
            @elseif(Auth::check() && Auth::user()->role_id == 4)
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->nom }} {{ Auth::user()->prenom }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item" href="{{route('profile', Auth::user()->id)}}">
                            <span class="fa fa-user"></span>
                            Mon compte
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.messagesClients')}}">
                            <span class="fas fa-envelope"></span>
                            Messages clients
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.listMessages')}}">
                            <span class="fas fa-envelope"></span>
                            Messages du personnel
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.listRestaurants')}}">
                            <span class="fas fa-utensils"></span>
                            Restaurants
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.listPersonnels')}}">
                            <span class="fa fa-user"></span>
                            Personnels
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.utilisateurs')}}">
                            <span class="fa fa-user"></span>
                            Utilisateurs
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                            <span class="fas fa-money-bill-wave-alt"></span>
                            Participations
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                            <span class="fas fa-money-bill-wave-alt"></span>
                            Faire le tirage au sort du grand gagnant
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.participants')}}">
                            <span class="fas fa-chart-bar"></span>
                            Statistiques des participants
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.statistiqueRecompensesInitiales')}}">
                            <span class="fas fa-chart-bar"></span>
                            Statistiques des récompenses initiales
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{route('manager.dashboard')}}">
                            <span class="fas fa-chart-bar"></span>
                            Statistiques des récompenses récupérés
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <span class="fas fa-sign-out-alt" aria-hidden="true">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </span>
                            Me déconnecter
                        </a>
                    </li>
                </div>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __("Me connecter") }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __("M'inscrire") }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">{{ __('Nous contacter') }}</a></li>
            @endif
        </ul>
    </div>
</nav>
