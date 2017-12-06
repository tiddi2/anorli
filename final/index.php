<?php
include "dbConnection.php"
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>
    <h1>Products</h1>
    <a href="pages/adminLogin.php">Login as admin</a>
    <hr/>
    <div id="orderBar">
        <strong>Product Name:</strong>
        <input type="text" id="nameIncludes" name="nameIncludes" value=<?= $_GET["nameIncludes"]?>>
        <br>
        <strong>Category:</strong>  
        <select id="category" name="category">
            <option value="">Select a Category</option>
            <?=  getColumn("categoryName","categories"); ""; ?>
        </select>
        <br>
        <strong>Order by:</strong>
        <input type="radio" name="orderBy" id="orderByPriceLow" value="orderByPriceLow">
        <label for="orderByPriceLow">Price: Low->High</label>
        <input type="radio" name="orderBy" id="orderByPriceHigh" value="orderByPriceHigh">
        <label for="orderByPriceHigh">Price: High->Low</label>
        <br>
        <input type="radio" name="orderBy" id="orderByNameAsc" value="orderByNameAsc">
        <label for="orderByNameAsc">Name A-Z</label>
        <input type="radio" name="orderBy" id="orderByNameDesc" value="orderByNameDesc">
        <label for="orderByNameDesc">Name Z-A</label>
    </div>
    <div id="products">
        <table class="table table-striped">
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Alcohol type</th>
                <th scope="col">Products Left</th>
            </tr>
            <tbody id="dataWrapper">
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <script src="productPage.js">
    </script>
    </body>
</html>