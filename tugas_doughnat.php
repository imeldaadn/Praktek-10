<?php
include('koneksi_covid.php');
$data = mysqli_query($koneksi,"select * from tb_penderita");
while($row = mysqli_fetch_array($data)){
    $country[] = $row['country'];
    $total_cases[] = $row['total_cases'];
    $total_deaths[] = $row['total_deaths'];
    $total_recovered[] = $row['total_recovered'];
    $active_cases[] = $row['active_cases'];
    $total_test[] = $row['total_tests'];
}
?>
<!doctype html>
<html>
<head>
    <title>Grafik Covid - Doughnut Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>
<body>
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 50%;">
            <h3 style="margin-left: 29%">Grafik Total Cases Covid-19</h3>
            <canvas id="chart-total-cases"></canvas>
        </div>
        <div style="width: 50%;">
            <h3 style="margin-left: 29%">Grafik Total Deaths Covid-19</h3>
            <canvas id="chart-total-deaths"></canvas>
        </div>
    </div>
    <div style="display: flex; justify-content: space-between;">
        <div style="width: 50%;">
            <h3 style="margin-left: 26%">Grafik Total Recovered Covid-19</h3>
            <canvas id="chart-total-recovered"></canvas>
        </div>
        <div style="width: 50%;">
            <h3 style="margin-left: 29%">Grafik Active Cases Covid-19</h3>
            <canvas id="chart-active-cases"></canvas>
        </div>        
    </div>
    <div style="display: flex; justify-content: space-between;">        
        <div style="width: 50%;">
            <h3 style="margin-left: 31%">Grafik Total Test Covid-19</h3>
            <canvas id="chart-total-test"></canvas>
        </div>
    </div>
<script>
    var ctx1 = document.getElementById('chart-total-cases').getContext('2d');
    var chartTotalCases = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_cases); ?>,
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
            }],
            labels: <?php echo json_encode($country); ?>
        },
        options: {
            responsive: true
        }
    });

    var ctx2 = document.getElementById('chart-total-deaths').getContext('2d');
    var chartTotalDeaths = new Chart(ctx2, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_deaths); ?>,
                backgroundColor: [
                    'rgba(0, 0, 255, 1)',
                    'rgba(138, 43, 226, 1)',
                    'rgba(165, 42, 42, 1)',
                    'rgba(222, 184, 135, 1)',
                    'rgba(95, 158, 160, 1)',
                    'rgba(127, 255, 0, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(220, 20, 60, 1)',
                    'rgba(100, 149, 237, 1)',
                    'rgba(0, 255, 255, 1)'
                ],
                borderColor: [
                    'rgba(0, 0, 255, 1)',
                    'rgba(138, 43, 226, 1)',
                    'rgba(165, 42, 42, 1)',
                    'rgba(222, 184, 135, 1)',
                    'rgba(95, 158, 160, 1)',
                    'rgba(127, 255, 0, 1)',
                    'rgba(210, 105, 30, 1)',
                    'rgba(220, 20, 60, 1)',
                    'rgba(100, 149, 237, 1)',
                    'rgba(0, 255, 255, 1)'
                ],
                label: 'Grafik Total Deaths Covid-19'
            }],
            labels: <?php echo json_encode($country); ?>
        },
        options: {
            responsive: true
        }
    });

    var ctx3 = document.getElementById('chart-total-recovered').getContext('2d');
    var chartTotalRecovered = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_recovered); ?>,
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
            }],
            labels: <?php echo json_encode($country); ?>
        },
        options: {
            responsive: true
        }
    });

    var ctx4 = document.getElementById('chart-active-cases').getContext('2d');
    var chartActiveCases = new Chart(ctx4, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($active_cases); ?>,
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
            }],
            labels: <?php echo json_encode($country); ?>
        },
        options: {
            responsive: true
        }
    });

    var ctx5 = document.getElementById('chart-total-test').getContext('2d');
    var chartTotalTest = new Chart(ctx5, {
        type: 'doughnut',
        data: {
            datasets: [{
                data: <?php echo json_encode($total_test); ?>,
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
            }],
            labels: <?php echo json_encode($country); ?>
        },
        options: {
            responsive: true
        }
    });
</script>
</body>
</html>