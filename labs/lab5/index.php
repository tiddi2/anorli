<?php

$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//we'll be able to see some errors with database
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function getmaleAuthors() {
    global $dbConn;
    $sql = "SELECT firstName, lastName, gender FROM q_author WHERE gender = 'M'";
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    foreach($records as $record) {
        echo $record['firstName'] . "  " . $record['lastName']  . "  " . $record["gender"] . "<br />";
    }

}

function getQuotes() {
    global $dbConn;
    $sql = "SELECT quote FROM q_quote";
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    foreach($records as $record) {
        echo $record['quote']  . "<br />";
    }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 5: Random Famous Quote Generator </title>
    </head>
    <body>
    <?= getmaleAuthors() ?>
    <h3>
        <?= getQuotes() ?>
    </h3>
    </body>
</html>