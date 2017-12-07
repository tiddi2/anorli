<?php
include '../dbConnection.php';
$conn = getDBConnection();

function getCategory() {
     $sql = "SELECT *
            FROM categories
            ORDER BY categoryName";
    $records = exe($sql);

    for($i = 0; $i < count($records);$i++) {
        echo "<option value='". $records[$i]["categoryId"] . "'";
        
        echo ">" . $records[$i]["categoryName"] . "</option>";
    }
}
session_start();
if(!isset($_SESSION["adminFullName"])) {
    header("location: adminLogin.php");
    exit();
}
 if (isset($_GET['addForm'])) {
    $sql = "INSERT INTO products
            (productName, categoryId, price, quantity)
            VALUES 
            (:productName, :category, :price, :quantity)";
    $np = array();
    $np[":productName"]  = $_GET['productName'];
    $np[":category"]  = $_GET['category'];
    $np[":price"]  = $_GET['price'];
    $np[":quantity"]  = $_GET['quantity'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($np);
    header("location: admin.php");
 }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Adding new product</title>
    </head>
    <body>

        <h1> Add new product </h1>
        <a href="admin.php">Back to admin panel</a>
        <fieldset>
            
            <legend> Adding new product </legend>
            
            <form>
                <div id="mContent">
                    <div id="asideLeft">
                        <strong>Product Name:</strong><br>
                        <strong>Price:</strong><br>
                        <strong>Quantity:</strong><br>
                        <strong>Category Name:</strong>
                    </div>
                    <div id="asideright">
                       <input type="hidden" name="productId" value="<?=$productInfo['productId']?>">
                        <input type="text" name="productName" value="<?=$productInfo['productName']?>" /> <br />
                        <input type="number" name="price" value="<?=$productInfo['price']?>"/><br /> 
                        <input type="number" name="quantity" value="<?=$productInfo['quantity']?>"/><br /> 
                        <select name="category">
                            <option value="">Select a Category</option>
                            <?=  getCategory() ?>
                         </select><br />  
                    </div>
                </div> 
                <input type="submit" value="Add new Product" name="addForm">
            </form>
            
        </fieldset>
        <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    </body>
</html>