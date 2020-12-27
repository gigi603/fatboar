@extends('layouts.background')
@section('title', 'Connexion')
@section('content')
    {{-- Login page --}}
    <main class="bg-block">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <p class="card-title title-block text-center">
                                <strong>Se connecter</strong>
                            </p>
                            <hr class="my-4">
                            @if ($success = Session::get('success'))
                                <div class="alert alert-success">
                                    {{ $success }}
                                </div>
                            @endif
                            <div class="text-center small">
                                Vous n'avez pas de compte ? <a href="{{--route('register')--}}">Inscrivez-vous !</a>
                            </div>
                            <form  method="post" action="{{-- route('login') --}}">
                                @csrf
                                <div class="form-group">
                                    <label  for="inputEmailAddress">E-mail</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input
                                        id="inputEmailAddress"
                                        aria-describedby="emailHelp"
                                        class="form-control @error('email') is-invalid @enderror"
                                        name="email"
                                        placeholder="Ex: gilbert.trinidad@gmail.com"
                                        type="email"
                                        value="{{ old('email') }}"
                                    />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Mot de passe</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                        </span>
                                    </div>
                                    <input
                                        id="inputPassword"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        type="password"
                                        placeholder="Ex: motdepasse"
                                    />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-primary btn-generic btn-block text-uppercase"
                                >
                                    Connexion
                                </button>
                                <div class="text-center small">
                                    <a href="{{-- url('/password/reset') --}}">Mot de passe oubli&eacute; ?</a>
                                </div>
                            </form>
                            <hr class="my-4">
                            <p class="text-center">Ou se connecter avec</p>
                            <div class="form-group">
                                <div class="social-btn text-center">
                                    <a href="#" class="btn btn-primary btn-lg" title="Facebook">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                    <a href="#" class="btn btn-danger btn-lg" title="Google">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End Login --}}
@endsection
