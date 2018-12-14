$(window).on('load', function() {

  //Note
  $(".out-note").click(function() {
    $(this).fadeOut();
  });

  //Edit - Fill inputs
  $("#edit-firstname").val('Someone');
  $("#edit-lastname").val('Test');
  $("#edit-email").val('someone@test.com');
  $("#edit-password").val('12345');

  //Edit - Change active
  function changeactive() {
    $("#option1,#option2,#option3").removeClass("active");
    $(this).addClass("active");

    $("#user1,#user2,#user3").css("display", "none");;

    if ($(this).attr("id") == ('option1')) {
      $("#user1").fadeIn();
    } else if ($(this).attr("id") == ('option2')) {
      $("#user2").fadeIn();
    } else if ($(this).attr("id") == ('option3')) {
      $("#user3").fadeIn();
    }
  }

  $("#option1").click(changeactive);
  $("#option2").click(changeactive);
  $("#option3").click(changeactive);

  //Register
  var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;

  $("#register").click(function() {
    var register_firstname = $.trim($('#register-firstname').val());
    var register_lastname = $.trim($('#register-lastname').val());
    var register_email = $.trim($('#register-email').val());
    var register_password = $('#register-password').val();
    var register_password2 = $('#register-password2').val();

    if (register_firstname == "" || register_firstname == null) {
      console.log("firstname nothing");
    } else if (register_lastname == "" || register_lastname == null) {
      console.log("lastname nothing");
    } else if (register_email == "" || register_email == null) {
      console.log("email nothing");
    } else if (!testEmail.test(register_email)) {
      console.log("email wrong format");
    } else if (register_password == "" || register_password == null) {
      console.log("password nothing");
      console.log($('#register-password').val());
      console.log(register_password);
    } else if (register_password2 == "" || register_password2 == null) {
      console.log("password2 nothing");
    } else if (register_password2 != register_password) {
      console.log("password and password2 not same");
    } else {
      console.log('starting ajax');
      $.ajax({
        url: "./php/register.php",
        type: "post",
        data: {
          firstname: register_firstname,
          lastname: register_lastname,
          email: register_email,
          password: register_password
        },
        success: function(data) {
          var dataParsed = JSON.parse(data);
          console.log(dataParsed);
        }
      });
    }
  });

  //Change Pages
  $("#page").click(function() {
    console.log("pass");
  });

  /* $(function() {
    $('#register').click(function() {
      var firstname2 = $('#register-firstname').val();
      var lastname2 = $('#register-lastname').val();
      var email2 = $('#register-email').val();
      var password2 = $('#register-password').val();
      console.log('starting ajax');
      $.ajax({
        url: "./php/register.php",
        type: "post",
        data: {
          firstname: firstname2,
          lastname: lastname2,
          email: email2,
          password: password2
        },

        success: function(data) {
          var dataParsed = JSON.parse(data);
          console.log(dataParsed);
        }
      });

    });
  });*/

  //Google
  /* function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  } */

});
