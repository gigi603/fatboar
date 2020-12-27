@extends('layouts.demo')
@section('title', 'Admin Home')
@section('content')
    {{-- Admin home page--}}
    <main class="">
        <div class="container">
            {{--@if($gagnant->isEmpty())--}}
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 my-3">
                    <div class="jumbotron is-info">
                        {{--<h1 class="display-4">Bonjour, {{Auth::user()->prenom}}.</h1> --}}
                        <h1 class="display-4">Bonjour, Admin.</h1>
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-4">
                    <div class="card card-signin">
                        <div class="card-body text-center">
                            <p class="title">{{--totalUsers--}}100</p>
                            <p class="subtitle">Utilisateurs</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="card card-signin">
                        <div class="card-body text-center">
                            <p class="title">{{--totalParticipants--}}80</p>
                            <p class="subtitle">Participants</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="card card-signin">
                        <div class="card-body text-center">
                            <p class="title">{{--totalPrizes--}}1000</p>
                            <p class="subtitle">Prix livr&eacute;es</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>Trouver ticket</strong>
                            </h2>
                            <hr class="my-4" />
                            <form action="{{-- route('???') --}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label class="" for="ticket">Ticket</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-ticket-alt"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control @error('numero_ticket') is-invalid @enderror"
                                        id="ticket"
                                        minlength="10"
                                        maxlength="10"
                                        placeholder="numéro de ticket ..."
                                        name="numero_ticket"
                                        value="{{ old('numero_ticket') }}"
                                    />
                                    @error('numero_ticket')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="email">E-mail</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        placeholder="dupond@email.com"
                                        value="{{ old('email') }}"
                                    />
                                    @error('email')
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
                                    Envoyer
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center my-3">
                    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">

                        {{--<button type="button" class="btn btn-success">Génerer gagnant</button>--}}

                        <form action="{{--route('admin.make.champ')--}}" method="post">
                            @csrf
                            <button
                            type="submit"
                            class="btn btn-danger text-uppercase">
                                Génerer gagnant
                            </button>
                        </form>
                        <form action="{{--route('admin.users.export')--}}" method="post">
                          @csrf
                          <button
                          type="submit"
                          class="btn btn-info text-uppercase">
                              Exporter clients
                          </button>
                        </form>
                        <form action="{{--route('admin.find.champ')--}}" method="post">
                            @csrf
                            <button
                            type="submit"
                            class="btn btn-warning text-uppercase">
                                Trouver gagnant
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            {{--@else
                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10 my-3">
                        <div class="jumbotron is-info">
                            <h1>Le jeu concours est fini vous ne pouvez plus participer</h1>
                        </div>
                    </div>
                </div>
            @endif--}}
        </div>
    </main>
    {{-- End cashier home page --}}
@endsection
