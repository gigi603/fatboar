@extends('layouts.demo')
@section('title', 'Manager Home')
@section('content')
    {{-- Manager home page--}}
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
                        <h1 class="display-4">Bonjour, Manager.</h1>
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8 col-md-5 my-4">
                    <div class="card card-signin">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>Afficher Rapports</strong>
                            </h2>
                            <hr class="my-4" />
                            <div>
                                <a
                                href="#"
                                class="btn btn-lg btn-success btn-block text-uppercase">
                                    Recompense intiale
                                </a>
                            </div>
                            <div>
                                <a
                                href="#"
                                class="btn btn-lg btn-primary btn-block text-uppercase my-2">
                                    Participations
                                </a>
                            </div>
                            <div>
                                <a
                                href="#"
                                class="btn btn-lg btn-warning btn-block text-uppercase">
                                    Recompenses r&eacute;cup&eacute;r&eacute;s
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End manager home page --}}
@endsection
