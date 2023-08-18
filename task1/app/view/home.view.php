<h1>
    Home Page view
</h1>
<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>
    <form id="studentForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="marks">Marks:</label>
        <input type="number" id="marks" name="marks" required><br><br>
        
        <button type="button" onclick="displayDetails()">Submit</button>
    </form>

    <h2>Student Information:</h2>
    <p id="result"></p>

    <script>
        function displayDetails() {
            var name = document.getElementById("name").value;
            var marks = document.getElementById("marks").value;

            var result = "Name: " + name + "<br>Marks: " + marks;
            document.getElementById("result").innerHTML = result;
        }
    </script>
</body>
</html>
