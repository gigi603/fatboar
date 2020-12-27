{{-- @extends('layouts.app')
@section('title', 'Changer votre mot de passe')
@section('content')
<div class="bg-block">
    <div class="login-block">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5 ">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Réinitialisez votre mot de passe</h3></div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer votre mot de passe') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Réinitialiser mon mot de passe') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.gris')
@section('title', 'Changer mot de passe')
@section('content')
    {{-- Reset page --}}
    <main class="bg-block-gris">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>R&eacute;initialisez votre mot de passe</strong>
                            </h2>
                            <hr class="my-4" />
                            <form method="post" action="{{route('password.update')}}">
                                @csrf
                                <input type="hidden" name="token" value="{{$token}}">
                                <div class="form-group">
                                    <label for="inputEmail">Email</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </div>
                                        <input
                                            name="email"
                                            type="email"
                                            aria-describedby="emailHelp"
                                            class="form-control @error('email') is-invalid @enderror"
                                            id="inputEmail"
                                            placeholder="Ex: gilbert.trinidad@gmail.com"
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
                                    <label class="" for="inputPassword">Mot de passe</label>
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fas fa-lock"></i>
                                        </span>
                                      </div>
                                      <input
                                        id="inputPassword"
                                        aria-describedby="passwordHelp"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="Saisir 8 caractères minimum"
                                        type="password"
                                        value="{{ old('password') }}"
                                        />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <label class="" for="inputConfirmPassword">Confirmer mot de passe</label>
                                    <div class="input-group mb-2">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text">
                                          <i class="fas fa-lock"></i>
                                        </span>
                                      </div>
                                      <input
                                        id="inputConfirmPassword"
                                        aria-describedby="emailHelp"
                                        class="form-control"
                                        name="password_confirmation"
                                        placeholder="Confirmer mot de passe"
                                        type="password"
                                        />
                                    </div>
                                  </div>
    
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-primary btn-block text-uppercase"
                                >
                                    R&eacute;initialiser
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End reset page --}}
@endsection

