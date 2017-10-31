<?php

include '../../dbConnection.php';
$conn = getDBConnection();

$sql = "DELETE FROM q_author WHERE authorID = " . $_GET["authorId"];
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location:admin.php");
?>