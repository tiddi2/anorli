  var totalScore = 0;
  submit.onclick = grade;

  function grade() {
      totalScoreReply.innerHTML = "";
      totalScore = 0;
      gradeQuestion(q0Reply, question0.value, "John Resig");
      gradeQuestion(q1Reply, q1answer2.checked, true);
      gradeQuestion(q2Reply, q2answer1.value, "2006");
      gradeQuestionUsingjQuery("q3Reply", $("#question3").val(), 42);
      gradeQuestionUsingjQuery("q4Reply", q4answer2.checked, true);
      gradeQuestionUsingjQuery("q5Reply", $("#question5").val(), "Cascading Style Sheets");
      if (totalScore / 6 * 100 >= 80) {
          totalScoreReply.innerHTML = "congratz </br>";
      }
      //var id = '<?php echo $_SESSION["userId"] ?>';
      totalScoreReply.innerHTML += (totalScore / 6 * 100).toFixed(2) + "%";
      ajaxCall("quizAPI.php", { "score": totalScore, "insert": "" }, function(data) {});
      ajaxCall("quizAPI.php", { "getAVG": "" }, function(data) {
          avg.innerHTML = "Average: " + data;
      });
      ajaxCall("quizAPI.php", { "getCount": "" }, function(data) {
          count.innerHTML = "Total tries: " + data;
      });
  }

  function ajaxCall(link, data, callback) {
      $.ajax({
          type: "GET",
          url: link,
          dataType: "json",
          data: data,
          success: function(data, status) { callback(data) },
          complete: function(data, status) { console.log(status) }
      });
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

  function gradeQuestionUsingjQuery(tag, question, correctAnswer) {
      if (question == correctAnswer) {
          ++totalScore;
          $("#" + tag).html("Correct");
          $("#" + tag).css("color", "green");
          $("#" + tag).append("<img src='check.png'>");
      }
      else {
          $("#" + tag).html("Incorrect, correct answer is " + correctAnswer);
          $("#" + tag).css("color", "red");
          $("#" + tag).append("<img src='xmark.png'>");
      }
  }
  