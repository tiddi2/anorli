<?php
$deck = range(1,52);
shuffle($deck);
$totalPoints = 0;
$suits = array("clubs","diamonds","hearts","spades");
function displayHand($preString) {
    global $deck, $totalPoints, $suits;
    $handPoints = 0;
    $handAces = 0;
    echo "<div class='hand'> $preString";
    for ($i = 0 ; $i < 5 ; $i++) {
        $lastCard = array_pop($deck);
        $cardValue = $lastCard % 13;
        $cardSuit = $suits[($lastCard-1)/13];
        if($cardValue == 0) {
            $cardValue = 13;
        }
        if ($cardValue == 1) {
            echo "<img class='ace' src='img/cards/$cardSuit/$cardValue.png' alt='Ace' />";
            $handAces++;
        }
        else {
            echo "<img src='img/cards/$cardSuit/$cardValue.png' alt='Card' />";
        }
        $handPoints+= $cardValue;
    }
    
    echo " Points: " . $handPoints;
    $totalPoints = $totalPoints + $handPoints;
    echo "</div>";
    return $handAces;
}

function identifyWinner($p1, $p2) {
    if ($p1 > $p2) {
        echo "You ";
    } else if ($p1 < $p2) {
        echo "PC ";
    } else {
        echo "Nobody ";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 3: Ace Poker </title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
    <main>
    <h1>Ace Poker</h1>
    <h2>Player with more aces wins all points</h2>
    <?php
        $player1Aces = displayHand("You: ");
        echo "<br>";
        $player2Aces = displayHand("PC: ");
    ?>
    <h1>
        <?=identifyWinner($player1Aces,$player2Aces)?>Win: <?=$totalPoints?> points!
    </h1>
    <hr>
    	&#xa9;2017. Copyright by Miguel Lara
    </main>
    </body>
</html>