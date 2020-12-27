
@extends('layouts.gris')
@section('content')
    <div class="block">
        <div id="content" class="p-4 p-md-5">
            <div class="float-sm-right mb-3"></div>
            <div class="input-group float-sm-right mb-2 mt-2 col-md-3">
            </div>
            <h1>Utilisateurs</h1>
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
            <a href="{{route('export.users_newsletters')}}" class="btn btn-primary">Exporter les utilisateurs qui sont abonnés aux newsletter</a>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nom </th>
                            <th>Prenom</th>
                            <th>Email</th>
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
                                <td>{{$user->nom}}</td>
                                <td>{{$user->prenom}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    {{-- <div class="float-sm-right mb-2">
                                        <a href="{{route('caissiere.tickets', $user->id)}}" class="btn btn-primary btn-block btn-register-login">Voir ses participations</a>
                                    </div> --}}
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
        
