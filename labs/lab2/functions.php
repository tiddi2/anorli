<?php
function calculatePoints($symbols, $result) {
    $allEqual = true;
    $_SESSION["tries"]++;
    for ($x = 1; $x < count($result); $x++) {
        if($result[$x] != $result[$x-1]) {
            $allEqual = false;
            break;
        }
    }
    $points = array(250,500,900,1000);
    return ($allEqual?$points[array_search($result[0],$symbols)]:0);
}

function generateRandomSymbols($numOfSymbols,$symbols) {
    for ($x = 0; $x < $numOfSymbols; $x++) {
        $symbol = $symbols[rand(0, count($symbols)-1)];
        echo "<img src='img/$symbol.png' id='reel".$x."' alt='$symbol' title='$symbol' width='70px'/>";
        $result[$x] = $symbol;
    }
    return $result;
}
?>