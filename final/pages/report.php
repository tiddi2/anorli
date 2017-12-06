<?php
include "../dbConnection.php";
$conn = getDBConnection();

if(isset($_GET["getTotalPrice"])) {
    global $conn;
    $sql = "SELECT sum(price * quantity) as totalPrice
            FROM products";
    $records = exe($sql);
    echo json_encode($records) ;
}


if(isset($_GET["getAVGPrice"])) {
    $sql = "SELECT avg(price)
            FROM products";
    $records = exe($sql);
    echo json_encode($records) ;
}


?>