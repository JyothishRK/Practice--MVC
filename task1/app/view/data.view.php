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
            flex-direction: column;
        }

        .header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
        }

        .options {
            margin-left: 20px;
            display: flex;
            align-items: center;
        }

        .options a {
            color: white;
            text-decoration: none;
            margin-right: 20px;
            cursor: pointer;
        }

        .graph-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f5f5f5;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="options">
            <a href="home">Insert-data</a>
            <a href="table">Table</a>
        </div>
    </div>
    <div class="graph-container">
        <h2>Age Distribution</h2>
        <canvas id="ageChart" width="800" height="400"></canvas>
    </div>

    <script>
        var ageLabels = <?php echo json_encode(array_column($ageData, 'age'), JSON_NUMERIC_CHECK); ?>;
        var ageCounts = <?php echo json_encode(array_column($ageData, 'count'), JSON_NUMERIC_CHECK); ?>;

        var ageChartCanvas = document.getElementById('ageChart').getContext('2d');
        var ageChart = new Chart(ageChartCanvas, {
            type: 'doughnut',
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

        function redirectTo(pageUrl) {
            window.location.href = pageUrl;
        }
    </script>
</body>

</html>