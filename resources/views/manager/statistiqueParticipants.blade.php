
@extends('layouts.gris')
@section('content')
<div class="bg-block-gris">
    <div class="block">
        <div id="content" class="p-4 p-md-5">
            <div class="float-sm-right mb-3"></div>
            <h1>STATISTIQUES DES PARTICIPANTS</h1>
            <div class="block-stat">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nombre de participants maximum</th>
                                <th>Nombre de participants restants</th>
                                <th>Nombre de participants ayant activé leurs tickets </th>
                                <th>Nombre de participants ayant récupéré leur gains</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{$total_tickets}}</th>
                                <th>{{$nombre_tickets_restants}}</th>
                                <th>{{$total_tickets_active}}</th>
                                <th>{{$total_tickets_recupere}}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="canvas-holder" width="400" height="400">
                    <canvas id="chart-area"></canvas>
                </div>
            </div>
        </div>
        <script src="{{ asset("js/Chart.min.js") }}"></script>
        <script src="{{ asset("js/utils.js") }}"></script>
        
        <script>
            let NombreParticipantsMax = function() {
                let NombreParticipantsMax = {!! $total_tickets !!};
                return NombreParticipantsMax;
            };
            let NombreParticipantsRestants = function() {
                let NombreParticipantsRestants = {!! $nombre_tickets_restants !!};
                return NombreParticipantsRestants;
            };

            var config = {
                type: 'pie',
                data: {
                    datasets: [{
                        data: [
                            NombreParticipantsMax(),
                            NombreParticipantsRestants(),
                        ],
                        backgroundColor: [
                            window.chartColors.blue,
                            window.chartColors.green,
                        ],
                        label: 'Dataset 1'
                    }],
                    labels: [
                        '{!! $total_tickets !!} Nombre de participants max',
                        '{!! $nombre_tickets_restants !!} Nombre de participants restants',
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true
                }
            };

            window.onload = function() {
                var ctx = document.getElementById('chart-area').getContext('2d');
                ctx.canvas.width = 1584;
                ctx.canvas.height = 450;
                window.myPie = new Chart(ctx, config);
            };

            document.getElementById('randomizeData').addEventListener('click', function() {
                config.data.datasets.forEach(function(dataset) {
                    dataset.data = dataset.data.map(function() {
                        return randomScalingFactor();
                    });
                });

                window.myPie.update();
            });

            var colorNames = Object.keys(window.chartColors);
            document.getElementById('addDataset').addEventListener('click', function() {
                var newDataset = {
                    backgroundColor: [],
                    data: [],
                    label: 'New dataset ' + config.data.datasets.length,
                };

                for (var index = 0; index < config.data.labels.length; ++index) {
                    newDataset.data.push(randomScalingFactor());

                    var colorName = colorNames[index % colorNames.length];
                    var newColor = window.chartColors[colorName];
                    newDataset.backgroundColor.push(newColor);
                }

                config.data.datasets.push(newDataset);
                window.myPie.update();
            });

            document.getElementById('removeDataset').addEventListener('click', function() {
                config.data.datasets.splice(0, 1);
                window.myPie.update();
            });
        </script>
    </div>
</div>
@endsection
        
