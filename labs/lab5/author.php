<?php
$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//we'll be able to see some errors with database
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function getAuthorInfo() {
    global $dbConn;
    $sql = "SELECT *
    FROM q_author
    WHERE authorId = " .$_GET['authorId'];
    $stmt = $dbConn -> prepare ($sql);
    $stmt -> execute();
    $record = $stmt -> fetch();  //retrieves all records;
    echo "<h3>" . $record["firstName"] . " " . $record["lastName"] . "</h3>";
    echo ($record["gender"] == "M")?"male":"Female" ;
    echo "<br>Birth: ".  $record["dob"] . "<br>Death: ";
    echo $record["dod"] . "<br>";
    echo $record["profession"] . "<br>";
    echo $record["country"] . "<br>";
    echo $record["biography"] . "<br>";
    echo "<img src='" . $record["picture"]. "' </img>";

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>
    <body>
    <main>
        <?= getAuthorInfo() ?>
    </main>
    </body>
</html>