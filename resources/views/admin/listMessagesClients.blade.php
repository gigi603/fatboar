@extends('layouts.gris')
@section('content')
<div id="content" class="p-4 p-md-5">
    <div class="float-sm-right mb-3">
        <div class="input-group float-sm-right mb-2 mt-2">
        </div>
    </div>
    <h1>Messages clients</h1>
    <div class="float-sm-right mb-3">
        <div class="input-group float-sm-right mb-3">
            <input type="text" class="form-control" placeholder="Filtrer..">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button">
                    <span data-feather="search"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="nav nav-tabs col-md-12">
        <a class="nav-item nav-link active" href="#messagesrecus" data-toggle="tab">Boite de réception</a>
        <a class="nav-item nav-link" href="#messagesenvoyes" data-toggle="tab">Messages envoyés</a>
    </div>
    <div class="tab-content">
        <div class="tab-pane active" id="messagesrecus">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th>Nom complet</th>
                        <th>expéditeur</th>
                        <th>sujet</th>
                        <th>Date de réception</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messagesRecus as $messageRecu)
                            <tr>
                                <td>
                                    @if($messageRecu->prenom == "testo")
                                        {{$messageRecu->nom}}</td>
                                    @else
                                        {{$messageRecu->nom}} {{$messageRecu->prenom}}
                                    @endif
                                <td>{{$messageRecu->email_expediteur}}</td>
                                <td>{{$messageRecu->sujet}}</td>
                                <td>{{$messageRecu->created_at}}</td>
                                <td><a href="{{route('admin.messageClient', $messageRecu->id)}}" class="btn btn-primary btn-block btn-register-login">Voir le message</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-sm-right mb-3 mt-3">
                <button type="button" class="btn btn-sm btn-warning">
                    <span data-feather="chevron-left"></span>
                </button>
                <button type="button" class="btn btn-sm btn-warning">
                        <span data-feather="chevron-right"></span>
                </button>
            </div>
        </div>
        <div class="tab-pane" id="messagesenvoyes">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th>Nom complet</th>
                        <th>expéditeur</th>
                        <th>destinataire</th>
                        <th>sujet</th>
                        <th>Date d'envoi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messagesEnvoyes as $messageEnvoye)
                            <tr>
                                <td>
                                    @if($messageEnvoye->prenom == "testo")
                                        {{$messageEnvoye->nom}}
                                    @else
                                        {{$messageEnvoye->nom}} {{$messageEnvoye->prenom}}
                                    @endif
                                </td>
                                <td>{{$messageEnvoye->email_expediteur}}</td>
                                <td>{{$messageEnvoye->email_destinataire}}</td>
                                <td>{{$messageEnvoye->sujet}}</td>
                                <td>{{$messageEnvoye->created_at}}</td>
                                <td><a href="{{route('admin.messageClient', $messageEnvoye->id)}}" class="btn btn-primary btn-block btn-register-login">Voir le message</a></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection