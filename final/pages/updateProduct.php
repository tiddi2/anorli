<?php
include '../dbConnection.php';
$conn = getDBConnection();
function getCategory() {
    $sql = "SELECT *
            FROM categories
            ORDER BY categoryName";
    $records = exe($sql);
    $sql = "SELECT categoryId, categoryName, productId
            FROM categories
            NATURAL JOIN products
            WHERE productId = " .  $_GET["productId"] ."
            ORDER BY categoryName";
            
    $correctCategory = exe($sql)[0];
    for($i = 0; $i < count($records);$i++) {
        echo "<option value='". $records[$i]["categoryId"] . "'";
        if($correctCategory["categoryId"] == $records[$i]["categoryId"]) {
            echo "selected";
        }
        echo ">" . $records[$i]["categoryName"] . "</option>";
    }
}

session_start();
if(!isset($_SESSION["adminFullName"])) {
    header("location: adminLogin.php");
    exit();
}

function getProductInfo() {
    global $conn;
    $sql = "SELECT *
            FROM products
            WHERE productId = " . $_GET['productId'];    
     
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);  
    return $record;
}

if (isset($_GET['updateForm'])) { 

    $sql = "UPDATE products SET 
	            productName = :productName,
	            categoryId = :categoryId,
	            price = :price,
	            quantity = :quantity
            WHERE productId = :productId";
    
    $namedParameters = array();
    $namedParameters[':productName'] = $_GET['productName'];
    $namedParameters[':categoryId'] = $_GET['category'];
    $namedParameters[':price'] = $_GET['price'];
    $namedParameters[':quantity'] = $_GET['quantity'];
    $namedParameters[':productId'] = $_GET['productId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    echo "Record was updated!";
}
if (isset($_GET['productId'])) {
    $productInfo = getProductInfo();  
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Update Product's Info </title>
    </head>
    <body>
        <h1> Updating Product's Info </h1>
        <a href="admin.php">Back to admin panel</a>
        <fieldset>
            <legend> Updating Product </legend>
            <form>
                <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
                 
                Product Name: <input type="text" name="productName" value="<?=$productInfo['productName']?>" /> <br />
                Price: <input type="number" name="price" value="<?=$productInfo['price']?>"/><br /> 
                Quantity: <input type="number" name="quantity" value="<?=$productInfo['quantity']?>"/><br /> 
                Category: <select name="category">
                            <option value="">Select a Category</option>
                            <?=  getCategory() ?>
                        </select><br /> 
                <input type="submit" value="Update Product" name="updateForm">
            </form>
            
        </fieldset>
        
    </body>
</html>