<?php
include "../dbConnection.php";
$conn = getDBConnection();

if(isset($_GET["getTotalPrice"])) {
    global $conn;
    $sql = "SELECT round(sum(price * quantity),2) as totalPrice
            FROM products";
    $records = exe($sql);
    echo json_encode($records) ;
}


if(isset($_GET["getAVGPrice"])) {
    $sql = "SELECT round(avg(price),2) as avg
            FROM products";
    $records = exe($sql);
    echo json_encode($records) ;
}


?>