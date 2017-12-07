<?php
    session_start();
    include "dbConnection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Final Project</title>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>
    <a id="adminLogin" href="pages/adminLogin.php">Login as admin</a>
    <br><h1>Cali Liquor</h1>
    
    <hr/>
    <div id="orderBar">
        <div id="asideLeft">
            <strong>Product Name:</strong> <br>
            <strong>Category:</strong> <br>
            <strong>Order by:</strong>
        </div>
        <div id="asideRight">
        <input type="text" id="nameIncludes" name="nameIncludes" value=<?= $_GET["nameIncludes"]?>>
        <br>
        <select id="category" name="category">
            <option value="">Select a Category</option>
            <?=  getColumn("categoryName","categories"); ""; ?>
            </select>
            <br>
            <input type="radio" name="orderBy" id="orderByNameAsc" checked value="orderByNameAsc">
            <label for="orderByNameAsc">Name A-Z</label>
            <input type="radio" name="orderBy" id="orderByPriceLow" value="orderByPriceLow">
            <label for="orderByPriceLow">Price: Low->High</label>
            <br>
            <input type="radio" name="orderBy" id="orderByPriceHigh" value="orderByPriceHigh">
            <label for="orderByPriceHigh">Price: High->Low</label>
            <input type="radio" name="orderBy" id="orderByNameDesc" value="orderByNameDesc">
            <label for="orderByNameDesc">Name Z-A</label>
        </div>
       
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
    <script src="productPage.js"></script>
    </body>
</html>