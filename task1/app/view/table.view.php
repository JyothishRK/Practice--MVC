<!DOCTYPE html>
<html>
<head>
    <title>Student Data</title>
    <style>
        /* Add CSS styles here */
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 16px; /* Increase font size */
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
</head>
<body>
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
</body>
</html>
