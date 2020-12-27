@extends('layouts.gris')
@section('content')
<div class="block">
    <div id="content" class="p-4 p-md-5">
        <div class="float-sm-right mb-3"></div>
        <div class="input-group float-sm-right mb-2 mt-2 col-md-3">
            <a href="{{route('communs.contact')}}" class="btn btn-primary btn-block btn-register-login">Nouveau message</a>
        </div>
        <h1>Messages du personnel</h1>
        <div class="nav nav-tabs col-md-12">
            <a class="nav-item nav-link active" href="#messagesrecus" data-toggle="tab">Boite de réception</a>
            <a class="nav-item nav-link" href="#messagesenvoyes" data-toggle="tab">Messages envoyés</a>
        </div>
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
        <div class="tab-content">
            <div class="tab-pane active" id="messagesrecus">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>expéditeur</th>
                            <th>sujet</th>
                            <th>Date de reception</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messagesRecus as $messageRecu)
                                <tr>
                                    <td>{{$messageRecu->nom}}</td>
                                    <td>{{$messageRecu->prenom}}</td>
                                    <td>{{$messageRecu->email_expediteur}}</td>
                                    <td>{{$messageRecu->sujet}}</td>
                                    <td>{{$messageRecu->created_at}}</td>
                                    <td><a href="{{route('communs.message', $messageRecu->id)}}" class="btn btn-primary btn-block btn-register-login">Voir le message</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="tab-pane" id="messagesenvoyes">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>expéditeur</th>
                            <th>destinataire</th>
                            <th>sujet</th>
                            <th>Date d'envoi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($messagesEnvoyes as $messageEnvoye)
                                <tr>
                                    <td>{{$messageEnvoye->nom}}</td>
                                    <td>{{$messageEnvoye->prenom}}</td>
                                    <td>{{$messageEnvoye->email_expediteur}}</td>
                                    <td>{{$messageEnvoye->email_destinataire}}</td>
                                    <td>{{$messageEnvoye->sujet}}</td>
                                    <td>{{$messageEnvoye->created_at}}</td>
                                    <td><a href="{{route('communs.message', $messageEnvoye->id)}}" class="btn btn-primary btn-block btn-register-login">Voir le message</a></td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection