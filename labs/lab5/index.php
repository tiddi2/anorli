<?php
include '../../../dbConnection.php';
function getRandomQuoteId() {
    
    $connection = getDBConnection();
    $sql = "SELECT quoteId FROM q_quote";
    $stmt = $connection -> prepare ($sql);
    $stmt -> execute();
    $records = $stmt -> fetchAll();
    return array_rand($records);
}

function getQuoteWithId($id) {
    $connection = getDBConnection();
    $sql = "SELECT quote, q_author.*
    FROM q_quote
    NATURAL JOIN q_author
    WHERE quoteId = " . $id;
    $stmt = $connection -> prepare ($sql);
    $stmt -> execute();
    
    $randomQuote = $stmt -> fetch();
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
            <?= getQuoteWithId(getRandomQuoteId()) ?>
        </h2>
    </main>
    </body>
</html>