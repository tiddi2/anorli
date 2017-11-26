  $("#state").change(function() { updateState() });
  $("#zip").change(function() { getCity() });
  $("#username").change(function() { checkUsername() });
  $("#repassword").change(function() { checkPassword() })

  function checkUsername() {
      ajaxCall("checkUsernameAPI.php?", { "username": $("#username").val() }, function(data) {
          $("#availabilityImage").attr("src", (data.length == 0 ? "check" : "xmark") + ".png");
      });
  }

  function updateState() {
      ajaxCall("http://itcdland.csumb.edu/~milara/ajax/countyList.php", { "state": $("#state").val() }, function(data) {
          $("#county").html("<option>Select one</option>");
          for (var i = 0; i < data.length; i++) {
              $("#county").append("<option>" + data[i].county + "</option>")
          }
      });
  }

  function getCity() {
      var data = ajaxCall("http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php", { "zip": $("#zip").val() }, function(data) {
          if (data) {
              $("#city").html(data.city);
              $("#latitude").html(data.latitude);
              $("#longitude").html(data.longitude);
              $("#zipFeedback").html("");
          }
          else {
              $("#city").html("");
              $("#latitude").html("");
              $("#longitude").html("");
              $("#zipFeedback").html("Zip not found");
          }
      });

  }

  function checkPassword() {
      if ($("#repassword").val() == $("#password").val()) {
          $("#passwordMatchImage").attr("src", "check.png");
          $("#passwordFeedback").html("Passwords match");
      }
      else {
          $("#passwordFeedback").html("Passwords does not match");
          $("#passwordMatchImage").attr("src", "xmark.png");
      }
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
  