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
<!DOCTYPE html>
<html>

<head>
    <title>Grafik Covid  - Bar Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <h1>Grafik Perbandingan Total Cases, Total Death, Total Recovered, Active cases, dan Total tests untuk 10 negara </h1>
    <div style="width: 800px;height: 800px">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($country); ?>,
            datasets: [
                {
                label: 'Grafik Total Cases Covid-19',
                data: <?php echo json_encode($total_cases); ?>,
                backgroundColor: 'red',
                borderWidth: 2
                },
                {
                label: 'Grafik Total Deaths Covid-19',
                data: <?php echo json_encode($total_deaths); ?>,
                backgroundColor: 'blue',
                borderWidth: 2 
                },
                {
                label: 'Grafik Total Recovered Covid-19',
                data: <?php echo json_encode($total_recovered); ?>,
                backgroundColor: 'green',
                borderWidth: 2   
                },
                {
                label: 'Grafik Active Cases Covid-19',
                data: <?php echo json_encode($active_cases); ?>,
                backgroundColor: 'orange',
                borderWidth: 2    
                },
                {
                label: 'Grafik Total Tests Covid-19',
                data: <?php echo json_encode($total_tests); ?>,
                backgroundColor: 'purple',
                borderWidth: 2    
                }]
            },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
    </script>
</body>

</html>