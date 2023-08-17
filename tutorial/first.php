<!DOCTYPE html>
<html>
    <head>
        <title>
            Input Page
        </title>
    </head>
    <body>
        <?php ?>    
        <form action="first.php" type="get">
            Enter Name: <input type="text" name="Name"><br><br>
            Enter Marks: <input type="number" name="Marks"><br><br>
            <input type ="submit">
        </form><br>
        <?php echo $_GET["Name"]." ".$_GET["Marks"] ?>
    </body>
</html>