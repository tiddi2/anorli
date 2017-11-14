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
        $a = range(0,10000);
        shuffle($a);
        for($i =0; $i <= 10000; $i++) {
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
    <script>
        var totalScore = 0;
        submit.onclick = grade;
        function grade() {
            totalScoreReply.innerHTML = "";
            totalScore = 0;
            gradeQuestion(q0Reply, question0.value, "John Resig");
            gradeQuestion(q1Reply, q1answer2.checked, true);
            gradeQuestion(q2Reply, q2answer1.value, "2006");
            gradeQuestionUsingjQuery("q3Reply",question3.value,42);
            gradeQuestionUsingjQuery("q4Reply",q4answer2.checked,true);
            gradeQuestionUsingjQuery("q5Reply",question5.value,"Cascading Style Sheets");
            console.log(totalScore);
            if (totalScore / 6 * 100 >= 80) {
                totalScoreReply.innerHTML = "congratz </br>";
            }
            totalScoreReply.innerHTML += (totalScore / 6 * 100).toFixed(2) + "%";
        }

        function gradeQuestion(tag, question, correctAnswer) {
            var oImg = document.createElement("img");
            if (question == correctAnswer) {
                ++totalScore;
                tag.innerHTML = "Correct";
                tag.style.color = "green";

                oImg.setAttribute('src', 'check.png');

            }
            else {
                tag.innerHTML = "Incorrect, correct answer is " + correctAnswer;
                tag.style.color = "red";
                oImg.setAttribute('src', 'xmark.png');

            }
            tag.appendChild(oImg);
        }
        function gradeQuestionUsingjQuery(tag,question,correctAnswer) {
            if(question == correctAnswer) {
                ++totalScore;
                $("#" + tag).html("Correct");
                $("#" + tag).css("color","green");
                $("#" + tag).append("<img src='check.png'>");
            } else {
                $("#" + tag).html("Incorrect, correct answer is " + correctAnswer);
                $("#" + tag).css("color","red");
                $("#" + tag).append("<img src='xmark.png'>");

            }
        }
    </script>
    </div>
    </section>
    &copy; Tiddi 2017
</body>

</html>
