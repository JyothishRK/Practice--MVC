<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mad-Libs</title>
</head>
<body>
    <form action="madlibs.php" type="get">
        Enter word 1 : <input type = "password" name= "w1"><br><br>
        Enter word 2 : <input type = "text" name= "w2"><br><br>
        Enter word 3 : <input type = "text" name= "w3"><br><br>
        <input type = "submit">
    </form><br><br>
    <?php 
    $word1=$_GET["w1"];
    $word2=$_GET["w2"];
    $word3=$_GET["w3"];
    echo "Roses are ".$word1."<br>";
    echo "Violets are ".$word2."<br>";
    echo "I love ".$word3 ."<br>";
    ?>
</body>
</html>