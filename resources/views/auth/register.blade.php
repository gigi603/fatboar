@extends('layouts.background')
@section('title', 'Inscription')
@section('content')
    {{-- Register page --}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-6">
                    <div class="card card-signin my-5">
                      <div class="card-body">
                        <p class="card-title title-block text-center">
                          <strong>S'inscrire</strong>
                        </p>
                        <hr class="my-4" />
                        @if ($success = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $success }}
                            </div>
                        @endif
                        <div class="text-center small">
                            Vous avez un compte ? <a href="{{route('register')}}">Connectez-vous !</a>
                        </div>
                        <form method="post" action="{{route('register')}}">
                            @csrf
                          <div class="form-group">
                            <label class="" for="inputLastName">
                              Nom
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input
                                    id="inputLastName"
                                    aria-describedby="lastnameHelp"
                                    class="form-control @error('nom') is-invalid @enderror"
                                    name="nom"
                                    placeholder="Ex: Trinidad"
                                    type="text"
                                    value="{{ old('nom') }}"
                                    autofocus
                                    />
                                    @error('nom')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="" for="inputFirstName">
                              Pr&eacute;nom
                            </label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                      <i class="fas fa-user"></i>
                                    </span>
                                </div>
                                <input
                                    id="inputFirstName"
                                    aria-describedby="prenomHelp"
                                    class="form-control @error('prenom') is-invalid @enderror"
                                    name="prenom"
                                    placeholder="Ex: Gilbert"
                                    type="text"
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
                            <label class="" for="inputTelephone">
                              T&eacute;l&eacute;phone
                            </label>
                            <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fas fa-mobile-alt"></i>
                                </span>
                              </div>
                              <input
                                id="inputTelephone"
                                aria-describedby="telephoneHelp"
                                class="form-control @error('telephone') is-invalid @enderror"
                                name="telephone"
                                placeholder="0612345678"
                                type="text"
                                maxlength="10"
                                value="{{ old('telephone') }}"
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
                                value="{{ old('date_naissance') }}"
                                />
                                <!--<input type="date" name="date_naissance">-->
                                @error('date_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="" for="inputEmailAddress">
                              E-mail
                            </label>
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
                          <div class="form-group @error('g-recaptcha-response') is-invalid @enderror">
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group form-check">
                            <input
                              type="checkbox"
                              class="form-check-input @error('majeur') is-invalid @enderror"
                              id="adultCheck"
                              name="majeur"
                              value="1"{{ old('majeur') === '1' ? 'checked' : '' }}"
                            />
                            <label class="form-check-label" for="adultCheck">
                                Je c&eacute;rtifie &ecirc;tre majeur ou avoir l'autorisation des parents
                            </label>
                            @error('majeur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group form-check">
                            <input
                              type="checkbox"
                              class="form-check-input @error('cgu') is-invalid @enderror"
                              id="cguCheck"
                              name="cgu"
                              value="1" {{ old('cgu') === '1' ? 'checked' : '' }}"
                            />
                            <label class="form-check-label" for="cguCheck">
                                Je confirme avoir pris connaissance et accepter les <a href="{{route('cgu')}}">Conditions G&eacute;n&eacute;rales</a>
                            </label>
                            @error('majeur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group form-check">
                            <input
                              type="checkbox"
                              class="form-check-input @error('newsletter') is-invalid @enderror"
                              id="newsCheck"
                              name="newsletter"
                              value="1" {{ old('newsletter') === '1' ? 'checked' : '' }}"
                            />
                            <label class="form-check-label" for="newsCheck">
                                Je souhaite recevoir gratuitement la newsletter de Fatboar par e-mail
                            </label>
                            @error('newsletter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <button
                            type="submit"
                            class="btn btn-lg btn-primary btn-generic btn-block text-uppercase"
                          >
                            Inscription
                          </button>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End register page --}}
@endsection
