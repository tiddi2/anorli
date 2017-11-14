<!DOCTYPE html>
<html>
    <head>
        <title>Guess a number</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
<body>
    <h1>Guess a number</h1>
    <div id= "directions">
    <form onsubmit= "return false">
        <input type="number" id="num" />
        <input type="submit" id="submit" value="Submit"/>
    </form>
    <p id="vic">Number of victories: 0 out of 0</p>
    <p id="feedback"></p>
    <p id="numOfTries"></p>
    </div>
    <script>
        submit.onclick = checkNewNumber;
        var tries;
        var n;
        var victories = 0;
        var lost = 0;
        restart();
        
        function restart() {
            tries = 0;
            n = Math.floor(Math.random()*100);
            feedback.innerHTML = "";
            numOfTries.innerHTML = "";
            submit.value = "Submit";
            submit.onclick = checkNewNumber;
        }
        function checkNewNumber() {
            var number = num.value;
            if(number > 99) {
                feedback.innerHTML = "ERROR: number is outside of guessing range";
                return;
            }
            tries++;
            numOfTries.innerHTML += "Try " + tries + ": " + num.value + "</br>";
            num.value = "";
            if(tries <= 7) {
                    
                if(number == n) {
                    $("#feedback").css("color","green")
                    feedback.innerHTML = "Congratz You won";
                    victories++;
                    vic.innerHTML = "Number of victories: " + victories + "out of " + (victories+lost);
                    submit.onclick = restart;
                    submit.value = "Restart";
                }
                else if(number < n) {
                   $("#feedback").css("color","black");
                    $("#feedback").html("answer is to low");
                }
                else if(number > n) {
                    $("#feedback").css("color","black")
                    $("#feedback").html("answer is to high");
                }
            } else {
                feedback.innerHTML = "You lost";
                lost++;
                vic.innerHTML = "Number of victories: " + victories + "out of " + (victories+lost);
                submit.onclick = restart;
                $("#feedback").css("color","red")
                submit.value = "Restart";
            }
        }
    </script>
</body>
</html>