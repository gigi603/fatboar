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
                                <p>Pr&eacute;nom : User-prenom</p>
                                <p>Email : user@email.com</p>
                                <p>T&eacute;l&eacute;phone : 0612549738</p>
                            </span>
						</div>
						<a href="{{--route('user.gains')--}}">&larr; Retour</a>
                     </div>
                </div>
            </div>
        </div>
    </main>
    {{-- End user prize page --}}
@endsection
