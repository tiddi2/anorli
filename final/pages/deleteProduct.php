<?php

include '../dbConnection.php';
$conn = getDBConnection();
/* Move to dbConnection.php as a function if possible */
$sql = "DELETE FROM products WHERE productId = " . $_GET["productId"];
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location:admin.php");
?>