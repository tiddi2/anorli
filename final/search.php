<?php
header('Content-Type: text/html; charset=ISO-8859-1');

include "dbConnection.php";
$conn = getDBConnection();

$sql = "SELECT * 
        FROM products
        NATURAL JOIN categories
        WHERE 1";
if (!empty($_GET['nameIncludes'])) {      
    $sql .= " AND productName LIKE :nameIncludes";
    $namedParameters[":nameIncludes"] = "%" . $_GET['nameIncludes'] . "%";
}
if (!empty($_GET['category'])) {
    $sql .=  " AND categoryName = :category";
    $namedParameters[':category'] = $_GET['category'];
}
    
if (isset($_GET['orderBy'])) {
    if ($_GET['orderBy'] == 'orderByNameDesc') {
       $sql .= " ORDER BY productName DESC";
    } else if ($_GET['orderBy'] == 'orderByNameAsc') {
       $sql .= " ORDER BY productName";
    }
    else if ($_GET['orderBy'] == 'orderByPriceHigh') {
       $sql .= " ORDER BY price DESC";
    }
    else if ($_GET['orderBy'] == 'orderByPriceLow') {
       $sql .= " ORDER BY price";
    }
}

$records = executeWithParameter($sql,$namedParameters);
for($i = 0; $i < count($records);$i++) {
        echo "<tr><td>";
        echo $records[$i]["productName"];
        echo "</td><td>";
        echo "$" . $records[$i]["price"];
        echo "</td><td>";
        echo $records[$i]["categoryName"];
        echo "</td><td>";
        echo $records[$i]["quantity"];
        echo "</td></tr>";
    }
?>