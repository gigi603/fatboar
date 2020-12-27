@extends('layouts.demo')
@section('title', 'Récompense')
@section('content')
    {{-- User prize page --}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-4">
					<div class="box text-center">
						<div class="title">
							<h2>Gagnant</h2>
                        </div>
                        <i class="fas fa-car fa-6x"></i>
						<div class="text">
							<span>
                                @if($gagnant->provider_id == 0)
                                    <p>Nom : {{$gagnant->nom}}</p>
                                    <p>Pr&eacute;nom : {{$gagnant->prenom}}</p>
                                    <p>Email : {{$gagnant->email}}</p>
                                    <p>T&eacute;l&eacute;phone : {{$gagnant->telephone}}</p>
                                @else
                                    <p>Nom complet : {{$gagnant->name}}</p>
                                    <p>Email : {{$gagnant->email}}</p>
                                    <p>T&eacute;l&eacute;phone : {{$gagnant->telephone}}</p>
                                @endif
                            </span>
						</div>
						<a href="{{URL::previous()}}">&larr; Retour</a>
                     </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End user prize page --}}
@endsection