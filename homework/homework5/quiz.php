<?php
session_start();
include "../../dbConnection.php";
if(!isset($_SESSION["userId"])) {
    header("location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Quiz</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
    <section>
    <div>
    Who created jQuery<select id="question0">
        <option id="q0answer1">John Resig</option>
        <option id="q0answer2">Google</option>
        <option id="q0answer3">Facebook</option>
    </select>
    <p id="q0Reply"></p>
    </div>
    
    <div>
    jQuery is a programming language
    <input type="radio" id="q1answer1" name="question1" />
    <label for="q1answer1">True</label>

    <input type="radio" id="q1answer2" name="question1" />
    <label for="q1answer2">False</label>
    <p id="q1Reply"></p>
    </div>
    
    
    <div>
    What year was jQuery released?
    <input type="number" id="q2answer1" name="q1" />
    <p id="q2Reply"></p>
    </div>
    <div>
    What is the meaning of life?
    <select id="question3">
    <?php
        $a = range(0,100);
        shuffle($a);
        for($i =0; $i <= 100; $i++) {
            echo "<option id='q3answer";
            echo $a[$i];
            echo "'>";
            echo $a[$i];
            echo "</option>";
        }
    ?>
    </select>
    <p id="q3Reply"></p>
    </div>
    
    <div>
    HTML is a programming language
    <input type="radio" id="q4answer1" name="q4" />
    <label for="q4answer1">True</label>

    <input type="radio" id="q4answer2" name="q4" />
    <label for="q4answer2">False</label>
    <p id="q4Reply"></p>
    </div>
    <div>
    What does CSS stand for
    <input type="text" id="question5" name="q4" />
    <p id="q5Reply"></p>
    </div>
    <div>
    <button id="submit">Submit</button>
    <p id="totalScoreReply"></p>
    <p id="avg"></p>
    <p id="count"></p>
    <script src="script.js"></script>
    </div>
    </section>
    &copy; Tiddi 2017
</body>
<script src="script.js"></script>
</html>
