<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>War</title>
        <link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
    <?php
    
    $deck = range(1,52);
    shuffle($deck);
    
    $player1Cards = array();
    $player2Cards = array();
    
    for($i = 0; $i < 52/2;$i++) {
        $player1Cards[$i] = array_pop($deck);
        $player2Cards[$i] = array_pop($deck);
    }
    
    function getValue($number) {
        $cardValue = $number % 13;
        return ($cardValue == 0?13:$cardValue);
    }
    function getSuit($number) {
        $cardSuit;
        if($number <= 13) {
            $cardSuit = "clubs";
        } else if($number > 13 && $number <= 26) {
            $cardSuit = "diamonds";
        } else if($number > 26 && $number <= 39) {
            $cardSuit = "hearts";
        } else if($number > 39) {
            $cardSuit = "spades";
        }
        return $cardSuit;
    }
    function nextWar() {
        global $player1Cards, $player2Cards;
        $card1 = array_pop($player1Cards);
        $card2 = array_pop($player2Cards);
        echo "<p>";
        echo "Player1: <img id='card1' src='img/".getSuit($card1)."/". getValue($card1).".png'/>";
        echo "Player2: <img id='card2' src='img/".getSuit($card2)."/". getValue($card2).".png'/>";
        if(getValue($card1) === getValue($card2)) {
            echo "<br><span id='war'> WAR </span><br>";
            echo "(cointflip) <br>";
            $coin = rand(1,2);
            echo "Player1: heads <br>
            Player2: Tails <br>";
            echo " <img id='coin' src='img/$coin.png'/> <br>";
            if($coin == 2) {
                echo "Player1 won";
            }
            else {
                echo "Player2 won";
            }
        } else if(getValue($card1) == 1) {
            echoWinner(1);
        }
         else if(getValue($card2) == 1) {
            echoWinner(2);
        }
        else if(getValue($card1) > getValue($card2)) {
            echoWinner(1);
        } else {
            echoWinner(2);
        }
        echo "</p>";
    }
    function echoWinner($player) {
        if($player == 1) {
            echo "<br> <span id='w1'>Player $player wins this war </span><br>";
        } else {
            echo "<br> <span id='w2'>Player $player wins this war </span><br>";
        }
    }
    
    nextWar();
    
    ?>

    </body>
</html>