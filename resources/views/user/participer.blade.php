@extends('layouts.gris')
@section('title', 'User Home')
@section('content')
    {{-- User home page--}}
    <main class ="bg-block-gris">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 my-3">
                    <div class="jumbotron is-info">
                        
                        <h1 class="display-4">Bonjour, 
                            @if(Auth::user()->prenom == "") 
                                {{Auth::user()->name}}.
                            @else
                                {{Auth::user()->prenom}}.
                            @endif</h1>
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <div class="card card-signin">
                        <div class="card-body text-center">
                          <p class="title">{{$nb_gains}}</p>
                          <p class="subtitle">Participations</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="card card-signin">
                        <div class="card-body text-center">
                          <p class="title">{{$nb_gainsRecuperer}}</p>
                          <p class="subtitle">Prix r&eacute;cup&eacute;rés</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="card card-signin">
                        <div class="card-body text-center">
                            <p class="title">{{$nb_gainsActive}}</p>
                            <p class="subtitle">Prix non r&eacute;cup&eacute;rés</p>
                        </div>
                    </div>
                </div>
            </div>
            @if($gagnant->isEmpty())
                <div class="row justify-content-center">
                    <div class="col-sm-9 col-md-7 col-lg-5">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h2 class="card-title text-center">
                                    <strong>Participer</strong>
                                </h2>
                                <hr class="my-4" />
                                <form method="post" action="{{route('user.gagner')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputTicket">Ticket</label>
                                        <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-ticket-alt"></i>
                                            </span>
                                        </div>
                                        <input
                                            aria-describedby="ticketHelp"
                                            type="text"
                                            class="form-control @error('numero_ticket') is-invalid @enderror"
                                            id="inputTicket"
                                            name="numero_ticket"
                                            placeholder="Ex: 10BEQ5k8A"
                                            value="{{ old('numero_ticket') }}"
                                        />
                                        @if (session('activated'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ session('activated') }}</strong>
                                            </span>
                                        @endif
                                        @error('numero_ticket')
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
                                        Participer
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 my-3">
                        <div class="jumbotron is-info">
                            <h1>Le jeu concours est fini vous ne pouvez plus participer</h1>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </main>
@endsection

