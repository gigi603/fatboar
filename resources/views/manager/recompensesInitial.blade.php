
@extends('layouts.gris')
@section('content')
<div class="bg-block-gris">
    <div class="block">
        <div id="content" class="p-4 p-md-5">
            <div class="float-sm-right mb-3"></div>
			<h1>STATISTIQUES DES RECOMPENSES INITIALES</h1>
			<div class="block-stat">
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead class="thead-dark">
							<tr>
								<th>Nombre d'entrée ou desserts</th>
								<th>Nombre de burger au choix</th>
								<th>Nombre de menus au choix </th>
								<th>Nombre de menus du jour</th>
								<th>Nombre de reductions sur un produit</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<th>{{$tickets60PourCent}}</th>
								<th>{{$tickets20PourCent}}</th>
								<th>{{$tickets10PourCent}}</th>
								<th>{{$tickets6PourCent}}</th>
								<th>{{$tickets4PourCent}}</th>
							</tr>
						</tbody>
					</table>
				</div>
				<div id="canvas-holder" width="400" height="400">
					<canvas id="chart-area"></canvas>
				</div>
			</div>
			<script src="{{ asset("js/Chart.min.js") }}"></script>
			<script src="{{ asset("js/utils.js") }}"></script>
			
			<script>
				let EntreeOuDessertAuChoixRecuperer = function() {
					let entreeOuDessertAuChoix = {!! $tickets60PourCent !!};
					return entreeOuDessertAuChoix;
				};
				
				let BurgerAuChoixRecuperer = function() {
					let burgerAuChoix = {!! $tickets20PourCent !!};
					return burgerAuChoix;
				};

				let MenuDuJourRecuperer = function() {
					let menuDuJour = {!! $tickets10PourCent !!};
					return menuDuJour;
				};

				let MenuAuChoixRecuperer = function() {
					let menuAuChoix = {!! $tickets6PourCent!!};
					return menuAuChoix;
				};

				let ReductionRecuperer = function() {
					let reduction = {!! $tickets4PourCent !!};
					return reduction;
				};

				var config = {
					type: 'pie',
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
							'{!! $tickets60PourCent !!} Entrée ou dessert au choix',
							'{!! $tickets20PourCent !!} Burger au choix',
							'{!! $tickets10PourCent !!} Menu du jour',
							'{!! $tickets6PourCent !!} Menu au choix',
							'{!! $tickets4PourCent !!} réduction à 70%',
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
</div>
@endsection
        
