<?php
$dbConnection = getDBConnection();
function getDBConnection() {
    //when connecting from Heroku
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    else { //When connection to Cloud 9
        $host = 'localhost'; //cloud 9 database
        $dbname = 'quotes';
        $username = 'root';
        $password = '';
    }
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}
function executeWithParameter($sql,$namedParameters) {
    global $dbConnection;
    $stmt = $dbConnection -> prepare($sql); 
    $stmt -> execute($namedParameters);
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}
function insertWithParameter($sql,$np) {
    global $dbConnection;
    $stmt = $dbConnection -> prepare($sql); 
    $stmt -> execute($np);
}
function exe($sql) {
    global $dbConnection;
    $stmt = $dbConnection -> prepare($sql); 
    $stmt -> execute(null);
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}


function getDBConnectionWithName($dbName) {
    $host = 'localhost'; //cloud 9 database
    $dbname = $dbName;
    $username = 'root';
    $password = '';
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn;
}

?>