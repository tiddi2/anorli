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
        $dbname = 'final';
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
    $stmt -> execute();
    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
}


function getColumn($column,$from) {
    $sql = "SELECT DISTINCT($column)
            FROM $from
            ORDER BY $column";
    $records = exe($sql);

    for($i = 0; $i < count($records);$i++) {
        echo "<option";
        if($_GET[$column] == $records[$i][$column]) {
            echo " selected";
        }
        echo ">" . $records[$i][$column] . "</option>";
    }
}
?>