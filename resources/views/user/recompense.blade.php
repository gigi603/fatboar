@extends('layouts.gris')
@section('title', 'Récompense')
@section('content')
    {{-- User prize page --}}
    <main class="bg-block-gris">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xs-12 col-sm-4">
					<div class="box text-center">
						<div class="title">
							<h3>Ticket {{$user_ticket_recompense->ticket->numero_ticket }}</h3>
                        </div>
                        @if($user_ticket_recompense->recompense_id == 1)
                            <i class="fas fa-ice-cream fa-6x"></i>
                            <div class="title">
                                <h4>Dessert ou entr&eacute;e au choix </h4>
                            </div>
                        @endif
                        @if($user_ticket_recompense->recompense_id == 2)
                            <i class="fas fa-hamburger fa-6x"></i>
                            <div class="title">
                                <h4>Burger au choix </h4>
                            </div>
                        @endif
                        @if($user_ticket_recompense->recompense_id == 3)
                            <i class="fas fa-utensils fa-6x"></i>
                            <div class="title">
                                <h4>Menu du jour </h4>
                            </div>
                        @endif
                        @if($user_ticket_recompense->recompense_id == 4)
                            <i class="far fa-question-circle fa-6x"></i>
                            <div class="title">
                                <h4>Menu au choix</h4>
                            </div>
                        @endif
                        @if($user_ticket_recompense->recompense_id == 5)
                            <i class="fas fa-percentage fa-6x"></i>
                            <div class="title">
                                <h4>70% de reduction</h4>
                            </div>
                        @endif
						<div class="text">
							<span>
							<p>
							Pour r&eacute;cup&eacute;rer votre prix rendez-vous dans n'importe quel restaurant Fatboar avec le num&eacute;ro du ticket.</p>
                        	<p>&Aacute; bientôt !</p>
                        </span>
						</div>
						<a href="{{route('user.gains')}}">Voir mes gains</a>
                     </div>

                </div>
            </div>
        </div>
    </main>
    {{-- End user prize page --}}
@endsection
