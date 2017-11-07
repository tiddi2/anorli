<?php
session_start();
include "../dbConnection.php";
if(!isset($_SESSION["adminFullName"])) {
    header("location: adminLogin.php");
    exit();
}
function start() {
    $sql = "SELECT *
    FROM products
    Order by productName";
    $records = exe($sql);
    foreach($records as $product) {
        echo "[<a href='updateProduct.php?productId=".$product['productId']."'>Update</a>] ";
        
        echo $product['category'] ." ". $product['productName'] .": $". $product["price"];
       
        echo "<form style='display:inline' action='deleteProduct.php' onsubmit='return confirmDelete()'>
        <input type='hidden' name='productId' value='".$product['productId']."'>
        <input type='submit' value='Delete'>
        </form> <br>";
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this product?");
 
            }            
        </script>
        
    </head>
    <body>
        <h1> ADMIN SECTION</h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>!</h2>
        <form action="logout.php">
            <input type="submit" value="Logout" />
        </form>

        <form action="newProduct.php">
            <input type="submit" value="Add New Product" />
        </form>
        <?= start() ?>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </body>
</html>