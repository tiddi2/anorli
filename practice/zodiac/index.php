<?php
$pictureArray = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");

function yearList($startYear,$endYear) {
    global $pictureArray;
    $sum = 0;
    
   for($i = $startYear; $i <=$endYear;$i++) {
       $sum += $i;
        echo "<li>Year $i";
        if($i == 1776) {
            echo "<b> USA INDEPENDENCE</b>";
        }
        else if($i %100 == 0) {
            echo "<b> Happy New Century!</b>";
        }
        echo "</li>";
        echo "<img src='img/". $pictureArray[($i-$startYear) %12] .".png' />";
        echo "<hr>";

    }
    return $sum;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Zodiac</title>
    </head>
    <body>
    <h1>Chinese Zodiac List</h1>
    <ul>
        <?php
        if(isset($_GET["start"]) && isset($_GET["end"])) {
            echo "<h1>Year sum: " . yearList($_GET["start"],$_GET["end"]) . "</h1>";
        }
        else {
            echo "<h1>Year sum: " . yearList(1500,2000) . "</h1>";
        }
        ?>
    </ul>
    </body>
</html>