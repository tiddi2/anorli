<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style type="text/css">
            main {
                margin: auto;
                float:left;
            }
            img {
                margin: 0px 20px;
            }
            aside {
                width: 300px;
                float: right;
            }
            h2 {
                color: green;
            }
        </style>
    </head>
    <body>
        <main>
            <h1>Human Computer</h1>
          <?php

        $card1 = rand(0,4);
        $card2 = rand(0,4);
    echo "<img src='img/$card1.png'/>";
    echo "<img src='img/$card2.png'/>";
    echo "<h2>";
    if($card1 < $card2) {
        echo "Human win";
    } else if($card2 == $card1) {
        echo "Draw";
    }
    else if($card1 > $card2) {
        echo "Computer wins";
    }
    echo "</h2>";
?>
 
        </main>
        <aside>
            <p>
                1. There are five cards to choose from.  In ranking order (lowest to highest): Ten, Jack, Queen, King, and Ace
                <br/>

2. Two random cards are displayed when refreshing the page.<br>
3. A message says who wins or if it’s a tie game.<br>

4. Program must use at least one function


            </p>
        </aside>
    </body>
</html>
