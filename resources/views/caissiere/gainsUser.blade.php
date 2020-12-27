
@extends('layouts.gris')
@section('content')

<div class="block">
    <div id="content" class="p-4 p-md-5">
        <div class="float-sm-right mb-3"></div>
        <div class="input-group float-sm-right mb-2 mt-2 col-md-3">
        </div>
        <h1>Ses gains</h1>
        <div class="float-sm-right mb-3">
            <div class="input-group float-sm-right mb-3">
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Numero de ticket gagnant </th>
                        <th>Statut</th>
                        <th>Récompense</th>
                        <th>Date d'activation</th>
                        <th>Actions</th>
                    </tr>      
                </thead>
                <tbody>
                    @foreach($users_tickets_recompenses as $user_tickets_recompenses)
                        <tr>
                            <td>{{$user_tickets_recompenses->numero_ticket}}</td>
                            <td>
                                @if($user_tickets_recompenses->status == 1)
                                    <span class="badge badge-pill-custom badge-danger">
                                        <span data-feather="pause-circle"></span>
                                            Attente
                                    </span>   
                                @endif
                                @if($user_tickets_recompenses->status == 2)
                                    <span class="badge badge-pill-custom badge-success">
                                        <span data-feather="check-circle"></span>
                                        Récupéré
                                    </span>
                                @endif
                            </td>
                            <td>{{$user_tickets_recompenses->nom_recompense}}</td>
                            <td>{{$user_tickets_recompenses->updated_at}}</td>
                            <td>
                                @if($user_tickets_recompenses->status == 1)
                                    <form method="POST" action="/recompense/recuperer/{{$user_tickets_recompenses->ticket_id}}">
                                        @csrf
                                        <input type="submit"class="btn btn-primary btn-block btn-register-login" value="Récupérer"/>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-sm-right mb-3 mt-3">
            <span>{{ $users_tickets_recompenses->links() }}</span>
        </div>
    </div>
</div>
@endsection
        