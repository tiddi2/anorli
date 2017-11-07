<?php
include "dbConnection.php";
function displayProducts() {
    $sql = "SELECT * 
            FROM products
            NATURAL JOIN categories
            WHERE 1";
    
    $namedParameters = array();
   
    if (!empty($_GET['nameIncludes'])) {      
           $sql = $sql . " AND productName LIKE :nameIncludes";
           $namedParameters[":nameIncludes"] = "%" . $_GET['nameIncludes'] . "%";
    }
    if (!empty($_GET['category'])) {
        $sql = $sql . " AND categoryName = :category";
        $namedParameters[':category'] = $_GET['category'];
    }
    
    if (isset($_GET['orderBy'])) {
        if ($_GET['orderBy'] == 'orderByNameDesc') {
           $sql = $sql . " ORDER BY productName DESC";
        } else if ($_GET['orderBy'] == 'orderByNameAsc') {
           $sql = $sql . " ORDER BY productName";
        }
        else if ($_GET['orderBy'] == 'orderByPriceHigh') {
           $sql = $sql . " ORDER BY price DESC";
        }
        else if ($_GET['orderBy'] == 'orderByPriceLow') {
           $sql = $sql . " ORDER BY price";
        }
    }
    $records = executeWithParameter($sql,$namedParameters);
    for($i = 0; $i < count($records);$i++) {
        echo $records[$i]["productName"] . " $" . $records[$i]["price"] . " - " . $records[$i]["categoryName"]. " " . $records[$i]["quantity"] . " left <br>";
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" />
    </head>
    <body>
        <h1>Products</h1>
        <form method="get">
                <strong>Product Name:</strong>
                <input type="text" name="nameIncludes" value=<?= $_GET["nameIncludes"]?>>
                <strong>Category:</strong>  
                <select name="category">
                    <option value="">Select a Category</option>
                    <?=  getColumn("categoryName","categories"); ""; ?>
                </select>
                
                
                <!-- Filter by price (slider) -->
                
                 Order by: 
                <input type="radio" name="orderBy" id="orderByPriceLow" value="orderByPriceLow">
                <label for="orderByPriceLow">Price: Low->High</label>
                
                <input type="radio" name="orderBy" id="orderByPriceHigh" value="orderByPriceHigh">
                <label for="orderByPriceHigh">Price: High->Low</label>
                
                
                <input type="radio" name="orderBy" id="orderByNameAsc" value="orderByNameAsc">
                <label for="orderByNameAsc">Name A-Z</label>
                
                <input type="radio" name="orderBy" id="orderByNameDesc" value="orderByNameDesc">
                <label for="orderByNameDesc">Name Z-A</label>
                
                <input type="submit" value="Filter" name="submit">
        </form>
        <a href="pages/adminLogin.php">Login as admin</a>
        <hr />

        <div class="products">
            <?=displayProducts()?>
        </div>
        
    </body>
</html>