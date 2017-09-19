<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title> 777 Slot Machine </title>
        <link rel="stylesheet" href="css/styles.css" type="text/css" />
    </head>
    <body>
    <main id="main">
        <form>
            <input type="submit" value="Spin"/>
        </form>
        <?php

        include 'functions.php';
        $symbols = array("grapes","lemon","cherry","seven");
        $result = generateRandomSymbols(3,$symbols);
        $points =  calculatePoints($symbols, $result);
        echo "<div id='output'>";
        if($points) {
            $_SESSION["score"] += $points;
            echo ($points === 1000?"<h1> Jackpot! </h1>":"<br>")."<h2>". $points." points </h2>";
        }
        else {
            echo "<h3> Try again </h3>";
        }
        echo "<h4> Total score: ". ($_SESSION["score"]?$_SESSION["score"]:0) . "</br></br>
        Total tries: " . $_SESSION["tries"] ."</h4>
        </div>";
    ?>
    </main>
    
    </body>
</html>