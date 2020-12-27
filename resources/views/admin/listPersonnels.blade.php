@extends('layouts.gris')
@section('content')
    <div class="block">
        <div id="content" class="p-4 p-md-5">
            <div class="float-sm-right mb-3"></div>
            <div class="input-group float-sm-right mb-2 mt-2 col-md-3">
            </div>
            <h1>PERSONNELS</h1>
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
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nom </th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($personnels as $personnel)
                            <tr>
                                <td>{{$personnel->nom}}</td>
                                <td>{{$personnel->prenom}}</td>
                                <td>{{$personnel->email}}</td>
                                <td>{{$personnel->role->nom_role}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-sm-right mb-3 mt-3">
                <span>{{ $personnels->links() }}</span>
            </div>
        </div>
    </div>
@endsection