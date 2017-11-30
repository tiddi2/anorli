<?php 
session_start();
include "../../dbConnection.php";

$username = $_POST["username"];
$password = sha1($_POST["password"]);
$sql = "SELECT *
    FROM q_login
    WHERE username = :username
    AND   password = :password";
$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;
$record = executeWithParameter($sql,$namedParameters);

if (empty($record)) {
    header('location: index.php?loginStatus='); 
} else {
    $_SESSION['userId'] = $record[0]['userId'];
    header('location: quiz.php'); 
}
?>