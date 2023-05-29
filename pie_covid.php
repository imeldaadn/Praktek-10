<?php
include('koneksi_covid.php');
$data = mysqli_query($koneksi,"select * from tb_penderita");
while($row = mysqli_fetch_array($data)){
	$nama_cases[] = $row['country'];
	
	$query = mysqli_query($koneksi,"select total_cases from tb_penderita where id_country='".$row['id_country']."'");
	$row = $query->fetch_array();
	$jumlah_cases[] = $row['total_cases'];
}
?>
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_cases); ?>,
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
                    'rgb(255, 230, 255)',
                    'rgb(230, 255, 243)',
                    'rgb(204, 255, 255)',
                    'rgb(204, 255, 204)',
                    'rgb(204, 230, 255)',
                    'rgb(217, 255, 179)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
                    'rgb(255, 153, 255)',
                    'rgb(179, 255, 218)',
                    'rgb(153, 255, 255)',
                    'rgb(179, 255, 179)',
                    'rgb(153, 179, 255)',
                    'rgb(191, 255, 128)'
					],
					label: 'Grafik Total Cases Covid-1'
				}],
				labels: <?php echo json_encode($nama_cases); ?>},
			options: {
				responsive: true
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
</body>

</html>