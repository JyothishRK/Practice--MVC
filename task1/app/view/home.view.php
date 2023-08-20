<!DOCTYPE html>
<html>

<head>
    <title>Insert Data</title>
</head>

<body>
    <h1>Insert Data</h1>

    <?php
    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $marks = $_POST["marks"];
        $model = new Students();
        $arr['Name']=$name;
        $arr['Marks']=$marks;
        $model->insert($arr); 
    }

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