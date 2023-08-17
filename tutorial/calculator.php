<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>
<body>
    <form action="calculator.php" method="get">
        Enter number 1: <input type="number" name="a"><br><br>
        Enter number 2: <input type="number" name="b"><br><br>
        <input type="submit">
    </form><br><br>
    <?php echo $_GET["a"] + $_GET["b"] ?>
</body>
</html>