<?php 
session_start();
include "../../dbConnection.php";

$username = $_POST["username"];
$password = sha1($_POST["password"]);
$sql = "SELECT *
    FROM q_admin
    WHERE username = :username
    AND   password = :password";
$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;
$record = executeWithParameter($sql,$namedParameters);

if (empty($record)) {
    header('location: adminLogin.php?loginStatus='); //redirects 
} else {
    $_SESSION['adminFullName'] = $record[0]['firstName'] . " " . $record[0]['lastName'];
    header('location: admin.php'); //redirects 
}
?>