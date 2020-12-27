
@extends('layouts.gris')
@section('content')
<div class="bg-block-gris">
    <div class="contact-admin-block">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-6">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h1 class="text-center font-weight-light my-4">Détails du message</h1></div>
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <h3>Message de {{$message->nom}} {{$message->prenom}}</h3>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <p> De : {{$message->nom}} {{$message->prenom}}  {{$message->email_expediteur}}</p> 
                                        <p> A  : {{$message->email_destinataire}} </p>
                                        <p>Sujet:   {{$message->sujet}}</p>
                                        <p>Message:   {{$message->message}}</p>                              
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection