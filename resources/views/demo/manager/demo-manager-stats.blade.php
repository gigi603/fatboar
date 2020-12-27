@extends('layouts.demo')
@section('title', 'Manager Home')
@section('content')
    {{-- Manager stats page--}}
    <main class="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 my-3">
                    <div class="jumbotron is-info">
                        {{--
                        @if(Auth::user()->provider_id !== null)
                            <h1 class="display-4">Bonjour, {{Auth::user()->name}}.</h1>
                        @else
                            <h1 class="display-4">Bonjour, {{Auth::user()->prenom}}.</h1>
                        @endif
                        --}}
                        <h1 class="display-4">Bonjour, Manager.</h1>
                        <p class="lead">Comment se passe votre journ&eacutee ?</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10 col-md-8 my-4">
                    <div class="card card-signin">
                        <div class="card-body">
                            <h2 class="card-title text-center">
                                <strong>Afficher Rapports</strong>
                            </h2>
                            <hr class="my-4" />
                            <canvas id="chartOne" height="200" ></canvas>
                        </div>
                        <div class="text-center">
                            <a href="{{--route('user.gains')--}}" style="color:red;">&larr; Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" type="text/javascript"></script>
    <script>
        let totalprizes = 100
        let totalparticipants = 7

        let ctxOne = document.getElementById("chartOne").getContext("2d");
        let chartOne = new Chart(ctxOne, {
            type: "pie",
            data: {
                labels: ["Participations", "Recompense"],
                datasets: [
                {
                    backgroundColor: ["#2ecc71", "#e74c3c"],
                    data: [totalparticipants, totalprizes],
                },
                ],
            },
            options: {
                responsive: true,
            },
        });
    </script>

    {{-- End manager stats page --}}
@endsection
