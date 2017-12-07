<?php
header('Content-Type: text/html; charset=ISO-8859-1');
session_start();
include "../dbConnection.php";
if(!isset($_SESSION["adminFullName"])) {
    header("location: adminLogin.php");
    exit();
}
function start() {
    $sql = "SELECT * 
            FROM products
            NATURAL JOIN categories
            Order by productName";
    $records = exe($sql);
    foreach($records as $product) {
        echo "<tr><td>";
        echo "[<a href='updateProduct.php?productId=".$product['productId']."'>Update</a>] ";
        echo "</td><td>";
        echo $product['categoryName'];
        echo "</td><td>";
        echo $product['productName'];
        echo "</td><td>";
        echo "$" . $product['price'];
        echo "</td><td>";
        echo $product['quantity'];
        echo "</td><td>";
        echo "<form style='display:inline' action='deleteProduct.php' onsubmit='return confirmDelete()'>
        <input type='hidden' name='productId' value='".$product['productId']."'>
        <input type='submit' value='Delete'>
        </form> <br>";
        echo "</td>";
      
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
          <meta charset="UTF-8">

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
        
        <form action="logout.php" id="btnLogout">
            <input type="submit" value="Logout" />
        </form>
        <form action="../index.php" id="btnHomepage">
            <input type="submit" value="Product Page" />
        </form>
        <br>
        <h1> ADMIN SECTION</h1>
        <div id="adminControlls">
            <h2> Welcome <?=$_SESSION['adminFullName']?>!</h2>
            <button type="button" id="totalPrice">Total</button>
            <button type="button" id="averagePrice">Average</button>
            <button type="button" id="lowItems">Low in stock</button>
            
            <form action="newProduct.php">
                <input type="submit" value="Add New Product" />
            </form>
                <h2 id="reports"></h2>
        <p id="report"></p>
        </div>
        <table class="table table-striped" id="adminTable">
            <tr>
                <th scope="col"></th>
                <th scope="col">Category</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Products Left</th>
                <th scope="col"></th>
            </tr>
            <?= start() ?>
        </table>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script>
        document.getElementById("totalPrice").onclick = getTotal;
        document.getElementById("averagePrice").onclick = getAverage;
        document.getElementById("lowItems").onclick = getLowItems;
    
        function ajaxCall(link, data, onsuccess) {
            $.ajax({
                type: "GET",
                url: link,
                dataType: "json",
                data: data,
                success: function (data) { onsuccess(data) }
            });
        }
        
        function ajaxCallComplete(link, data, onsuccess) {
            $.ajax({
                type: "GET",
                url: link,
                dataType: "json",
                data: data,
                complete: function (data) { onsuccess(data) }
            });
        }
        
        function getLowItems() {
            ajaxCallComplete("report.php", {"getLowItems": "" }, function(data) {
                document.getElementById("report").innerHTML = "";
                var rows = data.responseText.split(";")
                for(var i = 0; i < rows.length -1; i++) {
                    var nameQuanPair = rows[i].split("*");
                    document.getElementById("report").innerHTML +=  
                    "Product: " +  nameQuanPair[0] + ", amount left: " + nameQuanPair[1] + "<br>";
                 }
                document.getElementById("reports").innerHTML = "Report: Low In stock";
            });
        }
      
        
        function getTotal() {
            ajaxCall("report.php",{"getTotalPrice": "" }, function(data) {
                document.getElementById("report").innerHTML = "Total price for all items: $" + data[0].totalPrice;
                document.getElementById("reports").innerHTML = "Report: Total Price";
            });
        }
        function getAverage(){
            ajaxCall("report.php",{"getAVGPrice": "" }, function(data) {
                console.log(data[0].totalAVG);
                 document.getElementById("report").innerHTML = "Average price for one of each product: $" + data[0].avg;
                 document.getElementById("report").innerHTML += "<br>Average price for all items: $" + data[0].totalAVG;
                document.getElementById("reports").innerHTML = "Report: Average Price";

            });
        }
        
        </script>
        
        <link rel="stylesheet" type="text/css" href="../css/styles.css" />
    </body>
</html>