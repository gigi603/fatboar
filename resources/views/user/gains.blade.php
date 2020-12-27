@extends('layouts.gris')

@section('content')
<div class="block">
    <div id="content" class="p-4 p-md-5">
        <div class="float-sm-right mb-3"></div>
        <div class="input-group float-sm-right mb-2 mt-2 col-md-3">
            <a href="{{route('user.participer')}}" class="btn btn-primary btn-block btn-register-login">Participer</a>
        </div>
        <h1>Mes gains</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Numero de ticket gagnant </th>
                    <th>Statut</th>
                    <th>Récompense</th>
                    <th>Date d'activation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users_tickets_recompenses as $user_tickets_recompenses)
                    <tr>
                        <td>{{$user_tickets_recompenses->numero_ticket}}</td>
                        <td>
                            @if($user_tickets_recompenses->status == 1)
                            <span class="badge badge-pill badge-success">
                                <i class="far fa-check-circle"></i>
                                    Activé
                                </span>
                            @endif
                            @if($user_tickets_recompenses->status == 2)
                                <span class="badge badge-pill-custom badge-success">
                                    <i class="far fa-check-circle"></i>
                                    Récupéré
                                </span>
                            @endif
                        </td>
                        <td>{{$user_tickets_recompenses->nom_recompense}}</td>
                        <td>{{$user_tickets_recompenses->updated_at}}</td>
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