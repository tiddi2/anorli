<?php
session_start();
include "../../dbConnection.php";
if(!isset($_SESSION["adminFullName"])) {
    header("location: index.php");
    exit();
}
function start() {
    $sql = "SELECT *
    FROM q_author
    Order by lastName";
    $records = exe($sql);
    foreach($records as $author) {
            echo "[<a href='updateAuthor.php?authorId=".$author['authorId']."'>Update</a>] ";
            echo $author['firstName'] . "  " . $author['lastName'] . " " . $author['country'] . "<br>";
        }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section  </title>
    </head>
    <body>
        <h1> ADMIN SECTION</h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>!</h2>
        <form action="addAuthor.php">
            <input type="submit" value="Add New Author" />
        </form>
        <?= start() ?>
        
    </body>
</html>