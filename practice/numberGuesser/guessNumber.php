<?php
session_start();
if(!isset($_SESSION['number'])) {
    $_SESSION['number'] = rand(1,100);
} else {
    $guessedNumber = $_GET['guess'];
    echo $_SESSION['number'];
}
 

?>



<html>
    <head>
    
    </head>
    <body>
        <form>
            Guess<input type="text" name="guess"/>
            <input type="submit" value="Submit"/>
        </form>
    </body>
</html>