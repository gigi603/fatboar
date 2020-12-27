
@extends('layouts.gris')
@section('content')
    <div class="block">
        <div id="content" class="p-4 p-md-5">
            <div class="float-sm-right mb-3"></div>
        <h1>Utilisateurs</h1>
        <div class="input-group float-sm-right mb-2 mt-2">
            <input type="text" class="form-control" placeholder="Filtrer ..." />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    Rechercher
                </button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>
                            <div class="float-sm-right mb-2">
                                Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            @if($user->name == "")
                                <td>{{$user->nom}} {{$user->prenom}}</td>
                            @else
                                <td>{{$user->name}}</td>
                            @endif
                            <td>{{$user->email}}</td>
                            <td>{{$user->telephone}}</td>
                            <td>
                                <div class="float-sm-right mb-2">
                                    <a href="{{route('caissiere.gainsUser', $user->id)}}" class="btn btn-primary btn-block btn-register-login">Voir ses participations</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="float-sm-right mb-3 mt-3">
            <span>{{ $users->links() }}</span>
        </div>
    </div>
</div>
@endsection
        
