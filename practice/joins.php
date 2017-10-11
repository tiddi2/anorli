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
    $sql = "SELECT quote, q_author.firstName, q_author.lastName, q_author.country
    FROM q_quote 
    NATURAL JOIN q_category 
    NATURAL JOIN q_author 
    NATURAL JOIN q_cat_quote 
    WHERE gender = 'M'";
    
    $stmt = $dbConn -> prepare ($sql);
    
    $stmt -> execute();
    
    $records = $stmt -> fetchAll();  //retrieves all records;
    
    foreach($records as $record) {
        echo "<em>" .  $record['quote'] . "</em>   " . $record['firstName']  . "  " . $record["lastName"] . "  " . $record["country"] . "<br />";
    }

}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SQL Joins</title>
    </head>
    <body>
    <?= getmaleAuthors() ?>
    </body>
</html>


<!--

SELECT * FROM q_quote
INNER JOIN q_author
ON q_quote.authorId = q_author.authorId
WHERE lastName = "Einstein";


SELECT * FROM q_quote
NATURAL JOIN q_author
WHERE lastName = "Einstein"




SELECT quote FROM `q_quote`
LEFT JOIN q_cat_quote
ON q_quote.quoteId = q_cat_quote.quoteId
WHERE q_cat_quote.categoryId = 5


SELECT * 
FROM q_quote 
NATURAL JOIN q_category 
NATURAL JOIN q_cat_quote 
WHERE category = "philosophy";


SELECT quote, q_author.firstName, q_author.lastName
FROM q_quote 
NATURAL JOIN q_category
NATURAL JOIN q_author 
NATURAL JOIN q_cat_quote 
WHERE category = "Reflection"
->