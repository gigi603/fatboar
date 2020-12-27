@extends('layouts.background')
@section('title', 'Confirmation')
@section('content')
<div class="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <p class="card-title title-block text-center">
                            <strong>Confirmation</strong>
                        </p>
                        <hr class="my-4" />
                        <form action="{{route('get.consent')}}" method="post">
                            @csrf
                            <div>
                                <input
                                class="form-control"
                                id="email"
                                name="email"
                                type="hidden"
                                value="{{$user->email}}"
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
                                required
                                />
                                <label class="form-check-label" for="adultCheck">
                                  Je c&eacute;rtifie avoir 18 ans ou avoir l'autorisation de mes parents
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
                                required
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
                                required
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
</div>
@endsection
