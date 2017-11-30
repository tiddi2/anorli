<?php
include "../../dbConnection.php";
$conn = getDBConnection();

session_start();
if(isset($_GET["insert"])) {
    global $conn;
    $sql = "INSERT INTO `q_quiz` (`userId`, `score`) VALUES (:userId, :score)";
    $np = array();
    $np[":userId"]  = intval($_SESSION["userId"]);
    $np[":score"]  = intval($_GET['score']);
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
}

if(isset($_GET["getAVG"])) {
    $sql = "SELECT AVG(score) FROM q_quiz WHERE userId = :userId";
    $record = executeWithNP($sql,array(":userId"=> $_SESSION["userId"]));
    echo $record[0]["AVG(score)"];
}
if(isset($_GET["getCount"])) {
    $sql = "SELECT count(score) FROM q_quiz WHERE userId = :userId";
    $record = executeWithNP($sql,array(":userId"=> $_SESSION["userId"]));
    echo $record[0]["count(score)"];
    
}

?>