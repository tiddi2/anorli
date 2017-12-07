<?php
include "../dbConnection.php";
$conn = getDBConnection();

if(isset($_GET["getTotalPrice"])) {
    $sql = "SELECT round(sum(price * quantity),2) as totalPrice
            FROM products";
    $records = exe($sql);
    echo json_encode($records) ;
}



if(isset($_GET["getLowItems"])) {
    $sql = "SELECT productName, quantity
            FROM products
            WHERE quantity <= 5";
    $records = exe($sql);
    foreach($records as $product) {
        echo $product['productName'] . "*";
        echo $product['quantity'] . ";";
    }
}

if(isset($_GET["getAVGPrice"])) {
    $sql = "SELECT round(avg(price),2) as avg, round(round(sum(price * quantity),2)/sum(quantity),2) as totalAVG
            FROM products";
    $records = exe($sql);
    echo json_encode($records);
}


?>