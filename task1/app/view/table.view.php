<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #4CAF50; /* Light green color */
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .options {
            display: flex;
            gap: 20px;
            margin-left: 20px; /* Added margin */
        }

        .option {
            cursor: pointer;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px; /* Added margin */
        }

        .student-data {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; /* Added margin */
        }

        h1 {
            text-align: center; /* Center align the heading */
            color: #333333;
            margin-bottom: 20px;
            /* Added margin to create space */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 16px; /* Increase font size */
            margin-top: 20px; /* Added margin */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>
        Table-view
    </title>
</head>
<body>
    <div class="header">
        <div class="options">
            <div class="option" onclick="redirectTo('home')">Insert-data</div>
            <div class="option" onclick="redirectTo('analysis')">Graphs</div>
        </div>
    </div>

    <div class="container">
        <div class="student-data">
            <h1>Student Data</h1>
    
            <table>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Marks</th>
                </tr>
                <?php
                // Create a connection
                $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Retrieve data from the database
                $sql = "SELECT Name,Age,Gender,Marks FROM students";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["Name"] . "</td>";
                        echo "<td>" . $row["Age"] . "</td>";
                        echo "<td>" . $row["Gender"] . "</td>";
                        echo "<td>" . $row["Marks"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                }

                $conn->close();
                ?>

            </table>
        </div>
    </div>

    <script>
        function redirectTo(pageUrl) {
            window.location.href = pageUrl;
        }
    </script>
</body>
</html>
