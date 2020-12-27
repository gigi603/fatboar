@extends('layouts.background')
@section('title', 'Contact')
@section('content')
    {{-- Contact page --}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-6">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <p class="card-title title-block text-center">
                                <strong>Nous contacter</strong>
                            </p>
                            <hr class="my-4" />
                            <div class="text-center small">
                                Vouz avez une question ? Nous sommes &agrave; votre &eacute;coute.
                            </div>
                            <form method="post" action="{{route('contactAdminByGuest.envoyer')}}">
                                @csrf
                                @if (Session::has('success_message'))
                                    <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{ Session::get('success_message') }}
                                    </div>
                                @endif
                                @if (Session::has('error_message'))
                                    <div class="alert alert-danger">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{ Session::get('error_message') }}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="inputNom">Nom</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control @error('nom') is-invalid @enderror"
                                            id="inputNom"
                                            placeholder="Dupond"
                                            name="nom"
                                            value="{{ old('nom') }}"
                                        />
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPrenom">Prenom</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                            </span>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control @error('prenom') is-invalid @enderror"
                                            id="inputPrenom"
                                            placeholder="Jean"
                                            name="prenom"
                                            value="{{ old('prenom') }}"
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
                                            <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input
                                            type="email"
                                            class="form-control @error('email_expediteur') is-invalid @enderror"
                                            id="inputEmail"
                                            name="email_expediteur"
                                            placeholder="dupond@email.com"
                                            value="{{ old('email_expediteur') }}"
                                        />
                                        @error('email_expediteur')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSujet">Sujet</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <i class="fas fa-clipboard"></i>
                                            </span>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control @error('message') is-invalid @enderror"
                                            id="inputSujet"
                                            placeholder="Sujet"
                                            name="sujet"
                                            value="{{ old('sujet') }}"
                                        />
                                        @error('sujet')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputMessage">Message</label>
                                    <textarea
                                    class="form-control @error('message') is-invalid @enderror"
                                    id="inputMessage"
                                    name="message"
                                    rows="6"
                                    placeholder="Message"
                                    value="{{ old('message') }}"
                                    >
                                    </textarea>
                                    @error('message')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-primary btn-generic btn-block text-uppercase"
                                >
                                    Envoyer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End contact page --}}
@endsection
