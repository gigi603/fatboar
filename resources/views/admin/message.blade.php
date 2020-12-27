
@extends('layouts.gris')
@section('content')
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h2>Messages du personnel</h2>
        <div class="float-sm-right mb-3">
            <div class="input-group float-sm-right mb-3">
                <div class="input-group-append">
                </div>
            </div>
        </div>
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
    </main>             
@endsection