
@extends('layouts.gris')
@section('title', 'Trouver ticket')
@section('content')
    {{-- Search page --}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 my-3">
                    <div class="jumbotron is-info">
                        <h1 class="display-4">Bonjour, 
                            @if(Auth::user()->prenom == "") 
                                {{Auth::user()->name}}.
                            @else
                                {{Auth::user()->prenom}}.
                            @endif
                        </h1>
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-9 col-md-7 col-lg-5">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>Trouver ticket</strong>
                            </h2>
                            <hr class="my-4" />
                            <form action="{{route('caissiere.getSearchTickets') }}" method="get">
                                @csrf
                                <div class="form-group">
                                    <label class="" for="ticket">Ticket</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-ticket-alt"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control @error('numero_ticket') is-invalid @enderror"
                                        id="ticket"
                                        minlength="10"
                                        maxlength="10"
                                        placeholder="numéro de ticket ..."
                                        name="numero_ticket"
                                        value="{{ old('numero_ticket') }}"
                                    />
                                    @error('numero_ticket')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="email">E-mail</label>
                                    <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-envelope"></i>
                                        </span>
                                    </div>
                                    <input
                                        type="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        id="email"
                                        name="email"
                                        placeholder="dupond@email.com"
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
                                    CHERCHER
                                </button>
                            </form>
                            <hr>
                            <form method="get" action="{{route('caissiere.generateTicketCaisse')}}">
                                <button
                                    type="submit"
                                    class="btn btn-lg btn-primary btn-block text-uppercase"
                                >
                                    GENERER UN NUMERO GAGNANT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if($ticketsNonUtilisees == null || $ticketsUtilisees == null)
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Numero de ticket gagnant </th>
                                <th>Statut</th>
                                <th>Récompense</th>
                                <th>Utilisateur</th>
                                <th>Date d'activation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>                            
                            @foreach($ticketsNonUtilisees as $ticketNonUtilisee)      
                                <tr>
                                    <td>{{$ticketNonUtilisee->numero_ticket}}</td>
                                    <td>  
                                        <span class="badge badge-pill-custom badge-danger">
                                            <i class="far fa-pause-circle"></i>
                                                Non utilisé
                                        </span>
                                    </td>
                                    <td>{{$ticketNonUtilisee->nom_recompense}}</td>
                                    <td>Pas d'utilisateur lié</td>
                                    <td>Ticket non activé</td>
                                    <td>Pas d'action à effectuer</td>
                                </tr>
                            @endforeach
                            @foreach($ticketsUtilisees as $ticketUtilisee)
                                @if($ticketUtilisee->status == 1)
                                    <tr>
                                        <td>{{$ticketUtilisee->numero_ticket}}</td>
                                        <td>  
                                            <span class="badge badge-pill-custom badge-danger">
                                                <i class="far fa-pause-circle"></i>
                                                    Attente
                                            </span>
                                        </td>
                                        <td>{{$ticketUtilisee->nom_recompense}}</td>
                                        <td>{{$ticketUtilisee->nom}} {{$ticketUtilisee->prenom}}</td>
                                        <td>{{$ticketUtilisee->updated_at}}</td>
                                        <td>
                                            <form method="POST" action="/recompense/recuperer/{{$ticketUtilisee->ticket_id}}">
                                                @csrf
                                                <input type="submit"class="btn btn-primary btn-block btn-register-login" value="Récupérer"/>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @if($ticketUtilisee->status == 2)
                                    <tr>
                                        <td>{{$ticketUtilisee->numero_ticket}}</td>
                                        <td>
                                            <span class="badge badge-pill-custom badge-success">
                                                <i class="far fa-check-circle"></i>
                                                Récupéré
                                            </span>
                                        </td>
                                        <td>{{$ticketUtilisee->nom_recompense}}</td>
                                        <td>{{$ticketUtilisee->nom}} {{$ticketUtilisee->prenom}}</td>
                                        <td>{{$ticketUtilisee->updated_at}}</td>
                                        <td>Pas d'action à effectuer</td>
                                    </tr>
                                @endif
                            @endforeach
                            {{-- <div class="float-sm-right mb-3 mt-3">
                                <span>{{ $ticketsUtilisees->links() }}</span>
                            </div> --}}
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </main>
@endsection

        
