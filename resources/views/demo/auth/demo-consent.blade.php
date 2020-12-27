@extends('layouts.demo')
@section('title', 'Confirmation')
@section('content')
    {{-- Consent page --}}
    <div class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>Confirmation</strong>
                            </h2>
                            <hr class="my-4" />
                            <form action="{{--route('consent.test')--}}" method="post">
                                @csrf
                                <div>
                                    <input
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    type="hidden"
                                    value="{{--$user->email--}}"
                                />
                                </div>

                                <div class="form-group form-check">
                                    <input
                                    type="checkbox"
                                    class="form-check-input py-4 @error('majeur') is-invalid @enderror"
                                    id="adultCheck"
                                    name="majeur"
                                    value="1"
                                    {{ old('majeur') === '1' ? 'checked' : '' }}
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
                                    class="form-check-input py-4 @error('cgu') is-invalid @enderror"
                                    id="cguCheck"
                                    name="cgu"
                                    value="1"
                                    {{ old('cgu') === '1' ? 'checked' : '' }}
                                    />
                                    <label class="form-check-label" for="cguCheck">
                                        Je confirme avoir pris connaissance et accepter les <a href="#">CGU</a> de Fatboar
                                    </label>
                                    @error('cgu')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group form-check">
                                    <input
                                    type="checkbox"
                                    class="form-check-input py-4 @error('newsletter') is-invalid @enderror"
                                    id="newsCheck"
                                    name="newsletter"
                                    value="1"
                                    {{ old('newsletter') === '1' ? 'checked' : '' }}
                                    />
                                    <label class="form-check-label" for="newsCheck">
                                    Je souhaite recevoir gratuitement la newsletter de Fatboar par email
                                    </label>
                                    @error('newsletter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
        </div>
    </div>
    {{-- End consent page --}}
@endsection
