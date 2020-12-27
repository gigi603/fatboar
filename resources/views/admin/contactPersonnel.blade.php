@extends('layouts.gris')
@section('content')
<div id="content" class="p-4 p-md-5">
    <div class="float-sm-right mb-3"></div>
    <h1>Formulaire de contact</h1>
    <div class="card shadow-lg border-0 rounded-lg mt-5">
        <div class="card-header"><h3 class="text-center font-weight-light my-4">Envoyer un message</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.contacterPersonnel') }}">
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
                    <label class="small mb-1" for="inputSujet">Email</label>
                    <input class="form-control py-4 @error('email_destinataire') is-invalid @enderror" name="email_destinataire" type="text" placeholder="Email" value="{{ old('email_destinataire') }}"/>
                    @error('email_destinataire')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputSujet">Sujet</label>
                    <input class="form-control py-4 @error('sujet') is-invalid @enderror" name="sujet" type="text" placeholder="Sujet" value="{{ old('sujet') }}"/>
                    @error('sujet')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="inputMessage">Message</label>
                    <textarea class="form-control py-4 @error('message') is-invalid @enderror" name="message" placeholder="Message" value="{{ old('Message') }}"></textarea>
                    @error('message')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group mt-12 mb-0">
                    <button type="submit" class="btn btn-primary btn-block btn-register-login">
                        {{ __("Envoyer") }}
                    </button>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection
