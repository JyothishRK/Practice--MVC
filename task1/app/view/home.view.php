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
            background-color: #4CAF50; 
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }

        .options {
            display: flex;
            gap: 20px;
            margin-left: 20px;
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
            margin-top: 20px; 
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; 
        }

        label {
            margin-top: 10px;
            color: #333333;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    <title>
        Insert-data
    </title>
</head>

<body>
    <div class="header">
        <div class="options">
            <div class="option" onclick="redirectTo('table')">Table</div>
            <div class="option" onclick="redirectTo('analysis')">Graphs</div>
        </div>
    </div>

    <div class="container">
        <h1>Insert Data</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["Name"];
            $age = $_POST["Age"];
            $gender = $_POST["Gender"];
            $marks = $_POST["Marks"];
            $model = new Students();
            $arr['Name'] = $name;
            $arr['Age'] = $age;
            $arr['Gender'] = $gender;
            $arr['Marks'] = $marks;
            $model->insert($arr);
        }

        ?>

        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="Name" name="Name" required>

            <label for="name">Age:</label>
            <input type="number" id="Age" name="Age" required>

            <label for="name">Gender:</label>
            <input type="text" id="Gender" name="Gender" required>

            <label for="marks">Marks:</label>
            <input type="number" id="Marks" name="Marks" required>
            <br>
            <button type="submit">Insert Data</button>
        </form>
    </div>

    <script>
        function redirectTo(pageUrl) {
            window.location.href = pageUrl;
        }
    </script>
</body>

</html>
