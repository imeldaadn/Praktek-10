<?php
include('koneksi_covid.php');
$country = array();
$total_cases = array();
$total_deaths = array();
$total_recovered = array();
$active_cases = array();
$total_tests = array();

$data = mysqli_query($koneksi, "SELECT * FROM tb_penderita");

while($row = mysqli_fetch_array($data)) {
    $country[] = $row['country'];

    $query = mysqli_query($koneksi, "SELECT total_cases, total_deaths, total_recovered, active_cases, total_tests FROM tb_penderita WHERE id_country = '".$row['id_country']."'");

    $row = $query->fetch_array();
    $total_cases[] = $row['total_cases'];
    $total_deaths[] = $row['total_deaths'];
    $total_recovered[] = $row['total_recovered'];
    $active_cases[] = $row['active_cases'];
    $total_tests[] = $row['total_tests'];
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
        <h1>Total Cases COVID-19 </h1>
        <canvas id="totalCasesChart"></canvas>
        <h1>Total Death COVID-19 </h1>
        <canvas id="totalDeathsChart"></canvas>
        <h1>Total Recovered COVID-19 </h1>
        <canvas id="totalRecoveredChart"></canvas>
        <h1>Active Cases COVID-19 </h1>
        <canvas id="activeCasesChart"></canvas>
        <h1>Total Tests COVID-19 </h1>
        <canvas id="totalTestsChart"></canvas>
    </div>

	<script>
		var countryData = <?php echo json_encode($country); ?>;
        var casesData = <?php echo json_encode($total_cases); ?>;
        var totalDeathsData = <?php echo json_encode($total_deaths); ?>;
        var recoveredData = <?php echo json_encode($total_recovered); ?>;
        var activeCasesData = <?php echo json_encode($active_cases); ?>;
        var totalTestData = <?php echo json_encode($total_tests); ?>;

        // Chart for Total Cases
        var ctx1 = document.getElementById('totalCasesChart').getContext('2d');
        new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: casesData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                     ],
                     borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Total Deaths
        var ctx2 = document.getElementById('totalDeathsChart').getContext('2d');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: totalDeathsData,
                    backgroundColor: [
                         'rgb(255, 184, 77)',
                         'rgba(255, 77, 210)',
                         'rgba(112, 219, 112)',
                         'rgba(222, 184, 135, 1)',
                         'rgba(95, 158, 160, 1)',
                         'rgba(127, 255, 0, 1)',
                         'rgba(255, 77, 255)',
                         'rgba(220, 20, 60, 1)',
                         'rgba(100, 149, 237, 1)',
                         'rgba(0, 255, 255, 1)'
                     ],
                     borderColor: [
                         'rgb(255, 163, 26)',
                         'rgba(255, 26, 198)',
                         'rgba(71, 209, 71)',
                         'rgba(222, 184, 135, 1)',
                         'rgba(95, 158, 160, 1)',
                         'rgba(127, 255, 0, 1)',
                         'rgba(255, 26, 255)',
                         'rgba(220, 20, 60, 1)',
                         'rgba(100, 149, 237, 1)',
                         'rgba(0, 255, 255, 1)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Total Recovered
        var ctx3 = document.getElementById('totalRecoveredChart').getContext('2d');
        new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: recoveredData,
                    backgroundColor: [
                        'rgba(0, 0, 139, 1)',
                        'rgba(0, 139, 139, 1)',
                        'rgba(77, 136, 255)',
                        'rgba(169, 169, 169, 1)',
                        'rgba(0, 100, 0, 1)',
                        'rgba(189, 183, 107, 1)',
                        'rgba(139, 0, 139, 1)',
                        'rgba(77, 255, 77)',
                        'rgba(139, 0, 0, 1)',
                        'rgba(143, 188, 143, 1)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 139, 1)',
                        'rgba(0, 139, 139, 1)',
                        'rgba(26, 102, 255)',
                        'rgba(169, 169, 169, 1)',
                        'rgba(0, 100, 0, 1)',
                        'rgba(189, 183, 107, 1)',
                        'rgba(139, 0, 139, 1)',
                        'rgba(26, 255, 26)',
                        'rgba(139, 0, 0, 1)',
                        'rgba(143, 188, 143, 1)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Active Cases
        var ctx4 = document.getElementById('activeCasesChart').getContext('2d');
        new Chart(ctx4, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: activeCasesData,
                    backgroundColor: [
                        'rgba(210, 180, 140, 1)',
                        'rgba(238, 130, 238, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(255, 99, 71, 1)',
                        'rgba(255, 77, 166)',
                        'rgba(0, 128, 128, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(160, 82, 45, 1)',
                        'rgba(128, 0, 128, 1)',
                        'rgba(219, 112, 147, 1)'
                    ],
                    borderColor: [
                        'rgba(210, 180, 140, 1)',
                        'rgba(238, 130, 238, 1)',
                        'rgba(64, 224, 208, 1)',
                        'rgba(255, 99, 71, 1)',
                        'rgba(255, 26, 140)',
                        'rgba(0, 128, 128, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(160, 82, 45, 1)',
                        'rgba(128, 0, 128, 1)',
                        'rgba(219, 112, 147, 1)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });

        // Chart for Total Tests
        var ctx5 = document.getElementById('totalTestsChart').getContext('2d');
        new Chart(ctx5, {
            type: 'pie',
            data: {
                labels: countryData,
                datasets: [{
                    data: totalTestData,
                    backgroundColor: [
                        'rgba(255, 77, 77)',
                        'rgba(210, 105, 30, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(138, 43, 226, 1)',
                        'rgba(221, 160, 221, 1)',
                        'rgba(255, 20, 147, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(255, 215, 0, 1)',
                        'rgba(152, 251, 152, 1)',
                        'rgba(64, 224, 208, 1)'
                    ],
                    borderColor: [
                        'rgba(255, 26, 26)',
                        'rgba(210, 105, 30, 1)',
                        'rgba(154, 205, 50, 1)',
                        'rgba(138, 43, 226, 1)',
                        'rgba(221, 160, 221, 1)',
                        'rgba(255, 20, 147, 1)',
                        'rgba(100, 149, 237, 1)',
                        'rgba(255, 215, 0, 1)',
                        'rgba(152, 251, 152, 1)',
                        'rgba(64, 224, 208, 1)'
                    ]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>
</body>
</html>