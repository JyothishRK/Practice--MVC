<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Age Distribution Data
$ageSql = "SELECT age, COUNT(*) AS count FROM students GROUP BY age ORDER BY age";
$ageResult = $conn->query($ageSql);

$ageData = array();
while ($row = $ageResult->fetch_assoc()) {
    $ageData[] = $row;
}

// Gender Distribution Data
$genderSql = "SELECT gender, COUNT(*) AS count FROM students GROUP BY gender ORDER BY gender";
$genderResult = $conn->query($genderSql);

$genderData = array();
while ($row = $genderResult->fetch_assoc()) {
    $genderData[] = $row;
}

// Average Age by Gender
$avgAgeByGenderSql = "SELECT gender, AVG(age) AS avg_age FROM students GROUP BY gender";
$avgAgeByGenderResult = $conn->query($avgAgeByGenderSql);

$avgAgeByGenderData = array();
while ($row = $avgAgeByGenderResult->fetch_assoc()) {
    $avgAgeByGenderData[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Analysis</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('../assets/stats.png') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .graph-container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- <div style="max-width: 500px; margin: 20px auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; background-color: #f5f5f5; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
        <h2>Chronological Diversity Palette</h2>
        <canvas id="avgAgeByGenderChart"></canvas>
    </div> -->
    <div class="graph-container">
        <h2>Age Distribution</h2>
        <canvas id="ageChart"></canvas>
    </div>
    <!-- <div class="graph-container">
        <h2>Diversity Wheel Overview</h2>
        <canvas id="genderChart"></canvas>
    </div> -->

    <script>
        var ageLabels = <?php echo json_encode(array_column($ageData, 'age'), JSON_NUMERIC_CHECK); ?>;
        var ageCounts = <?php echo json_encode(array_column($ageData, 'count'), JSON_NUMERIC_CHECK); ?>;

        var ageChartCanvas = document.getElementById('ageChart').getContext('2d');
        var ageChart = new Chart(ageChartCanvas, {
            type: 'bar',
            data: {
                labels: ageLabels,
                datasets: [{
                    data: ageCounts,
                    backgroundColor: [
                        'rgba(0, 0, 0, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(104, 215, 196, 0.2)',
                        'rgba(85, 5, 186, 0.2)',
                        'rgba(4, 105, 255, 0.2)',
                        'rgba(200, 225, 77, 0.2)',
                        // colors for more age group
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(104, 215, 196, 1)',
                        'rgba(85, 5, 186, 1)',
                        'rgba(4, 105, 255, 1)',
                        'rgba(200, 225, 77, 1)',
                        // colors for more age group
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });


        var genderLabels = <?php echo json_encode(array_column($genderData, 'gender')); ?>;
        var genderCounts = <?php echo json_encode(array_column($genderData, 'count'), JSON_NUMERIC_CHECK); ?>;

        var genderChartCanvas = document.getElementById('genderChart').getContext('2d');
        var genderChart = new Chart(genderChartCanvas, {
            type: 'doughnut',
            data: {
                labels: genderLabels,
                datasets: [{
                    data: genderCounts,
                    backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
            }
        });

        var genders = <?php echo json_encode(array_column($avgAgeByGenderData, 'gender')); ?>;
        var avgAges = <?php echo json_encode(array_column($avgAgeByGenderData, 'avg_age'), JSON_NUMERIC_CHECK); ?>;

        var avgAgeByGenderChartCanvas = document.getElementById('avgAgeByGenderChart').getContext('2d');
        var avgAgeByGenderChart = new Chart(avgAgeByGenderChartCanvas, {
            type: 'bar',
            data: {
                labels: genders,
                datasets: [{
                    label: 'Average Age',
                    data: avgAges,
                    backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)'],
                    borderColor: ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
                
    </script>
</body>
</html>