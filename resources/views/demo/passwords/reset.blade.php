@extends('layouts.demo')
@section('title', 'Changer mot de passe')
@section('content')
    {{-- Reset page --}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>R&eacute;initialisez votre mot de passe</strong>
                            </h2>
                            <hr class="my-4" />
                            <form method="post" action="{{-- route('password.email') --}}">
                                @csrf
                                <input type="hidden" name="token" value="{{-- $token --}}">
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
