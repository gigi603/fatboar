@extends('layouts.gris')
@section('title', 'Profil')
@section('content')
    {{-- User home page--}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 my-3">
                    <div class="jumbotron is-info">
                        @if(Auth::user()->provider_id !== null)
                            <h1 class="display-4">Bonjour, {{Auth::user()->prenom}}.</h1>
                        @else
                            <h1 class="display-4">Bonjour, {{Auth::user()->name}}.</h1>
                        @endif
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-5">
					<div class="box text-center">
						<div class="title">
                            @if(Auth::user()->role_id == 1)
                                <h2>Client</h2>
                            @endif
                            @if(Auth::user()->role_id == 2)
                                <h2>Caissiere</h2>
                            @endif
                            @if(Auth::user()->role_id == 3)
                                <h2>Manager</h2>
                            @endif
                            @if(Auth::user()->role_id == 4)
                                <h2>Admin</h2>
                            @endif
                        </div>
                        <i class="fas fa-user fa-6x"></i>
						<div class="text">
							<span>
                                @if($user->provider_id == 0)
                                    <p>Nom : {{Auth::user()->nom}}
                                    <p>Pr&eacute;nom : {{Auth::user()->prenom}}</p>
                                @else
                                    <p>Nom complet : {{$user->name}}</p>
                                @endif
                                <p>Email : {{Auth::user()->email}}</p>
                                <p>T&eacute;l&eacute;phone : {{Auth::user()->telephone}}</p>
                                <p>Date de naissance : {{ Carbon\Carbon::parse($user->date_naissance)->format('d/m/Y')}}</p>
                            </span>
						</div>
						<a href="{{ URL::previous() }}">&larr; Retour</a>
                     </div>
                </div>
                <div class="col-sm-8 col-md-5 my-4">
                    <div class="card card-signin">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>Modifier profil</strong>
                            </h2>
                            <hr class="my-4" />
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <form method="post" action="{{route('user.edit', $user->id)}}">
                                @csrf
                                @if(Auth::user()->provider_id == 0)
                                    <div class="form-group">
                                        <label for="inputNom">Nom</label>
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input
                                            aria-describedby="nameHelp"
                                            type="text"
                                            class="form-control @error('nom') is-invalid @enderror"
                                            id="inputTicket"
                                            name="nom"
                                            placeholder="Ex: Dupond"
                                            value="{{ $user->nom }}"
                                        />
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNom">Prenom</label>
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input
                                            aria-describedby="nameHelp"
                                            type="text"
                                            class="form-control @error('prenom') is-invalid @enderror"
                                            id="inputTicket"
                                            name="prenom"
                                            placeholder="Ex: Dupond"
                                            value="{{ $user->prenom }}"
                                        />
                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail">E-mail</label>
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input
                                            aria-describedby="emailHelp"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="inputEmail"
                                            name="email"
                                            placeholder="Ex: dupond@email.com"
                                            value="{{$user->email}}"
                                        />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <label for="inputNom">Nom complet</label>
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input
                                            aria-describedby="nameHelp"
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            id="inputTicket"
                                            name="name"
                                            placeholder="Ex: Dupond Jean"
                                            value="{{$user->name}}"
                                        />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="inputTelephone">T&eacute;l&eacute;phone</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-mobile"></i>
                                        </span>
                                    </div>
                                    <input
                                        aria-describedby="nameHelp"
                                        type="text"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        id="inputTelephone"
                                        name="telephone"
                                        placeholder="0612347891"
                                        maxlength="10"
                                        value="{{$user->telephone}}"
                                    />
                                    @error('telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="inputDateNaissance">
                                      Date de naissance
                                    </label>
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fas fa-calendar-alt"></i>
                                        </span>
                                      </div>
                                      <input
                                        id="inputDateNaissance"
                                        aria-describedby="dateHelp"
                                        class="form-control @error('date_naissance') is-invalid @enderror"
                                        name="date_naissance"
                                        placeholder="Ex: 12/01/1993"
                                        type="text"
                                        value="{{Carbon\Carbon::parse($user->date_naissance)->format('d/m/Y')}}"
                                        />
                                        <!--<input type="date" name="date_naissance">-->
                                        @error('date_naissance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button
                                        type="submit"
                                        class="btn btn-lg btn-primary btn-block text-uppercase"
                                    >
                                        Modifier
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End user home page --}}
@endsection
