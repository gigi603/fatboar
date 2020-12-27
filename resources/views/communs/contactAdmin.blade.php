@extends('layouts.gris')
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
                                <strong>Contacter un admin</strong>
                            </p>
                            <hr class="my-4" />
                            <div class="text-center small">
                                Vouz avez une question ? Les admins sont à votre &eacute;coute.
                            </div>
                            <form method="post" action="{{route('contacterAdmin.envoyer')}}">
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
                                    <label for="inputSujet">Sujet</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                            <i class="fas fa-clipboard"></i>
                                            </span>
                                        </div>
                                        <input
                                            type="text"
                                            class="form-control @error('sujet') is-invalid @enderror"
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
