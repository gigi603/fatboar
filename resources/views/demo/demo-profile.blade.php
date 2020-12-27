@extends('layouts.demo')
@section('title', 'Profil')
@section('content')
    {{-- User home page--}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 my-3">
                    <div class="jumbotron is-info">
                        {{--
                        @if(Auth::user()->provider_id !== null)
                            <h1 class="display-4">Bonjour, {{Auth::user()->name}}.</h1>
                        @else
                            <h1 class="display-4">Bonjour, {{Auth::user()->prenom}}.</h1>
                        @endif
                        --}}
                        <h1 class="display-4">Bonjour, User.</h1>
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-5">
					<div class="box text-center">
						<div class="title">
							<h2>Gagnant</h2>
                        </div>
                        <i class="fas fa-user fa-6x"></i>
						<div class="text">
							<span>
                                <p>Pr&eacute;nom : User-prenom</p>
                                <p>Email : user@email.com</p>
                                <p>T&eacute;l&eacute;phone : 0612549738</p>
                            </span>
						</div>
						<a href="{{--route('user.gains')--}}">&larr; Retour</a>
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
                            <form method="post" action="{{-- route('user.edit', $user->id) --}}">
                                @csrf
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
                                        value="{{ old('nom') }}"
                                    />
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                {{-- @if(Auth::user()->provider_id != null) --}}
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
                                            value="{{ old('email') }}"
                                        />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    </div>
                                {{-- @endif --}}
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
                                        value="{{ old('telephone') }}"
                                    />
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-primary btn-block text-uppercase"
                                >
                                    Modifier
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End user home page --}}
@endsection
