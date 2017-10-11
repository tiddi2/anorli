<?php

$host = 'localhost'; //cloud 9 database
$dbname = 'quotes';
$username = 'root';
$password = '';
//creates database connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//we'll be able to see some errors with database
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function getRandomQuote() {
    global $dbConn;
    $sql = "SELECT quote, q_author.*
    FROM q_quote 
    NATURAL JOIN q_author";
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    $randomQuoteID = rand(0,count($records)-1);
    $randomQuote = $records[$randomQuoteID];

    echo $randomQuote['quote'] . "<br />";
    echo "<a href= 'author.php?authorId=". $randomQuote['authorId'] ."'> " . $randomQuote['firstName'] ." ".
    $randomQuote['lastName'] . "</a>";
    
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
        <h2>
            <?= getRandomQuote() ?>
        </h2>
    </main>
    </body>
</html>