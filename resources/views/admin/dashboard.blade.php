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
                            @if(Auth::user()->provider_id != 0) 
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
                                    class="btn btn-lg btn-danger btn-block text-uppercase"
                                >
                                    GENERER UN NUMERO GAGNANT
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center my-3">
                    <div class="btn-group btn-group-lg" role="group" aria-label="Basic example">

                        {{--<button type="button" class="btn btn-success">Génerer gagnant</button>--}}
                        @if($gagnant->isEmpty())
                            <form action="{{route('groslot')}}" method="post">
                                @csrf
                                <button
                                type="submit"
                                class="btn btn-danger text-uppercase">
                                    Génerer le grand gagnant
                                </button>
                            </form>
                        @else
                        <a href="{{route('voir.gagnant')}}" class="btn btn-danger text-uppercase">
                            Voir le grand gagnant
                        </a>
                        @endif
                        <a href="{{route('export.users_newsletters')}}" class="btn btn-info text-uppercase">
                              Exporter clients
                        </a>
                        {{-- <form action="{{route('admin.find.champ')}}" method="post">
                            @csrf
                            <button
                            type="submit"
                            class="btn btn-warning text-uppercase">
                                Trouver gagnant
                            </button>
                        </form> --}}
                    </div>
                </div>
            </div>
            @if(!$ticket == null)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Numero de ticket gagnant </th>
                                <th>Statut</th>
                                <th>Récompense</th>
                                <th>Utilisateur</th>
                                <th>Date d'activation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($ticket->status == 0)
                                <tr>
                                    <td>{{$ticket->numero_ticket}}</td>
                                    <td>  
                                        <span class="badge badge-pill-custom badge-danger">
                                            <span data-feather="pause-circle"></span>
                                                Non utilisé
                                        </span>
                                    </td>
                                    <td>{{$ticket->nom_recompense}}</td>
                                    <td>Pas d'utilisateur lié</td>
                                    <td>Ticket non activé</td>
                                </tr>
                            @endif
                            @if($ticket->status == 1)
                                <tr>
                                    <td>{{$ticket->numero_ticket}}</td>
                                    <td>  
                                        <span class="badge badge-pill-custom badge-danger">
                                            <span data-feather="pause-circle"></span>
                                                Attente
                                        </span>
                                    </td>
                                    <td>{{$ticket->nom_recompense}}</td>
                                    <td>{{$ticket->nom}} {{$ticket->prenom}}</td>
                                    <td>{{$ticket->updated_at}}</td>
                                </tr>
                            @endif
                            @if($ticket->status == 2)
                                <tr>
                                    <td>{{$ticket->numero_ticket}}</td>
                                    <td>
                                        <span class="badge badge-pill-custom badge-success">
                                            <span data-feather="check-circle"></span>
                                            Récupéré
                                        </span>
                                    </td>
                                    <td>{{$ticket->nom_recompense}}</td>
                                    <td>{{$ticket->nom}} {{$ticket->prenom}}</td>
                                    <td>{{$ticket->updated_at}}</td>
                                </tr>
                            @endif
                        @else
                        @endif
                    {{-- @endforeach
                    <div class="float-sm-right mb-3 mt-3">
                        <span>{{ $tickets->links() }}</span>
                    </div>
                    @endif --}}
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection