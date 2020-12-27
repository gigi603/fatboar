
@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="inbox"></span>
                        Messages du personnel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('manager.participants')}}">
                        <span data-feather="inbox"></span>
                        Statistiques des participants
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('manager.dashboard')}}">
                        <span data-feather="inbox"></span>
                        Statistiques des récompenses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('manager.statistiques')}}">
                        <span data-feather="inbox"></span>
                        Statistiques récompenses détaillés
                        </a>
                    </li>
                </ul>
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

                <h2>STATISTIQUES DES RECOMPENSES</h2>
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
                    <table class="table table-striped table-hover table-sm">
                        <thead>
                            <tr>
                            <th>Nombre de participants maximum</th>
                            <th>Nombre de participants ayant activé leurs tickets </th>
                            <th>Nombre de participants ayant récupéré leur gains</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{$total_tickets}}</th>
                                <th>{{$total_tickets_active}}</th>
                                <th>{{$total_tickets_recupere}}</th>
                        </tbody>
                    </table>
                </div>
                <div id="canvas-holder" width="400" height="400">
                    <canvas id="chart-area"></canvas>
                </div>
                <div class="float-sm-right mb-3 mt-3">
                    <button type="button" class="btn btn-sm btn-warning">
                        <span data-feather="chevron-left"></span>
                    </button>
                    <button type="button" class="btn btn-sm btn-warning">
                            <span data-feather="chevron-right"></span>
                    </button>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset("js/Chart.min.js") }}"></script>
    <script src="{{ asset("js/utils.js") }}"></script>
    
    <script>
		let EntreeOuDessertAuChoixRecuperer = function() {
            let entreeOuDessertAuChoix = {!! $nombreEntreeOuDessertAuChoix_recupere !!};
			return entreeOuDessertAuChoix;
        };
        
        let BurgerAuChoixRecuperer = function() {
            let burgerAuChoix = {!! $nombreBurgerAuChoix_recupere !!};
			return burgerAuChoix;
        };

        let MenuDuJourRecuperer = function() {
            let menuDuJour = {!! $nombreMenuDuJour_recupere !!};
			return menuDuJour;
        };

        let MenuAuChoixRecuperer = function() {
            let menuAuChoix = {!! $nombreMenuAuChoix_recupere !!};
			return menuAuChoix;
        };

        let ReductionRecuperer = function() {
            let reduction = {!! $nombreReduction_recupere !!};
			return reduction;
        };

		var config = {
			type: 'line',
			data: {
				datasets: [{
					data: [
						EntreeOuDessertAuChoixRecuperer(),
						BurgerAuChoixRecuperer(),
						MenuDuJourRecuperer(),
                        MenuAuChoixRecuperer(),
                        ReductionRecuperer()
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Entrée ou dessert au choix',
					'Burger au choix',
					'Menu du jour',
					'Menu au choix',
					'70% de réduction',
				]
			},
			options: {
				responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            min: 0,
                            max: 100
                        }    
                    }]
                }
            }
        };

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
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
@endsection
        
