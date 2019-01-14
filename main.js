$(window).on('load', function() {

  //User header
  if ($.isNumeric($('#fetch_user_id').val()) && $('#fetch_user_id').val() != "0") {
    $(".user_yes").show();
    $(".user_no").hide();
    console.log("yes");
    console.log($('#fetch_user_id').val());
  } else {
    $(".user_yes").hide();
    $(".user_no").show();
    console.log("no");
    console.log($('#fetch_user_id').val());
  }

  //Note
  $(".out-note").click(function() {
    $(this).fadeOut();
  });

  //Edit - Fill inputs

  //Edit - Change active
  function changeactive() {
    $("#option1,#option2,#option3").removeClass("active");
    $(this).addClass("active");

    $("#user1,#user2,#user3").css("display", "none");

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

  //Login
  $("#login").click(function() {
    var login_email = $.trim($('#login-email').val());
    var login_password = $.trim($('#login-password').val());

    if (login_email == "" || login_email == null) {
      console.log("email nothing");
    } else if (!testEmail.test(login_email)) {
      console.log("email wrong format");
    } else if (login_password == "" || login_password == null) {
      console.log("password nothing");
    } else {
      console.log('starting ajax');
    }
  });

  //Change Pages
  $("#go-productdetails").click(function() {
    window.location.href = 'home.html';
  });

  //Product Type
  $("#product-phone").click(function() {
    $("#product-phone").css("border", "solid 5px");
    $("#product-tablet").css("border", "none");
  });
  $("#product-tablet").click(function() {
    $("#product-tablet").css("border", "solid 5px");
    $("#product-phone").css("border", "none");
  });

  //Product Slides
  $("#product-slide-0-button").click(function() {
    $("#product-slide-0").fadeOut();
    $("#product-slide-1").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "20%");
  });
  $("#product-slide-1-button").click(function() {
    $("#product-slide-1").fadeOut();
    $("#product-slide-2").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "40%");
  });
  $("#product-slide-2-button").click(function() {
    $("#product-slide-2").fadeOut();
    $("#product-slide-3").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "60%");
  });
  $("#product-slide-3-button").click(function() {
    $("#product-slide-3").fadeOut();
    $("#product-slide-4").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "80%");
  });
  $("#product-slide-4-button").click(function() {
    $("#product-slide-4").fadeOut();
    $("#product-slide-5").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "100%");
  });


  $("#product-slide-5-button").click(function() {
    $("#product-slide-1").fadeOut();
    $("#product-slide-0").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "0%");
  });
  $("#product-slide-6-button").click(function() {
    $("#product-slide-2").fadeOut();
    $("#product-slide-1").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "20%");
  });
  $("#product-slide-7-button").click(function() {
    $("#product-slide-3").fadeOut();
    $("#product-slide-2").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "40%");
  });
  $("#product-slide-8-button").click(function() {
    $("#product-slide-4").fadeOut();
    $("#product-slide-3").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "60%");
  });
  $("#product-slide-9-button").click(function() {
    $("#product-slide-5").fadeOut();
    $("#product-slide-4").delay( 390 ).fadeIn();
    $(".progress-bar").css("width", "80%");
  });



  //Google
  /* function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  } */

});
