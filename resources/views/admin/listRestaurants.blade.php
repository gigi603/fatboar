@extends('layouts.gris')
@section('content')
    <div class="block">
        <div id="content" class="p-4 p-md-5">
            <div class="float-sm-right mb-3"></div>
            <h1>RESTAURANTS</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Adresse </th>
                            <th>Code postal</th>
                            <th>Ville</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($restaurants as $restaurant)
                            <tr>
                                <td>{{$restaurant->adresse}}</td>
                                <td>{{$restaurant->code_postal}}</td>
                                <td>{{$restaurant->ville}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="float-sm-right mb-3 mt-3">
                <span>{{ $restaurants->links() }}</span>
            </div>
        </div>    
    </div>
@endsection