<!DOCTYPE html>
<html>

<head>
    <title>Insert Data</title>
</head>

<body>
    <h1>Insert Data</h1>

    <?php
    $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $marks = $_POST["marks"];

        // Insert data into the database
        $sql = "INSERT INTO students (Name, Marks) VALUES ('$name', '$marks')";
        if ($conn->query($sql) === TRUE) {
            echo "Data inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>

    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="marks">Marks:</label>
        <input type="number" id="marks" name="marks" required><br><br>

        <button type="submit">Insert Data</button>
    </form>
</body>

</html>