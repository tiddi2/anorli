<?php
include "../../dbConnection.php";
$sql = "SELECT username FROM q_login WHERE username = :username";
$record = executeWithNP($sql,array(":username"=>$_GET['username']));
echo json_encode($record);
?>