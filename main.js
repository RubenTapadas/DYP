$(window).on('load', function() {

  //User header
  if ($.isNumeric($('#fetch_user_id').val()) && $('#fetch_user_id').val() != "0") {
    $(".user_yes").show();
    $(".user_no").hide();
  } else {
    $(".user_yes").hide();
    $(".user_no").show();
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

    if (register_firstname == "" || register_firstname == null) {} else if (register_lastname == "" || register_lastname == null) {} else if (register_email == "" || register_email == null) {} else if (!testEmail.test(register_email)) {} else if (register_password == "" || register_password == null) {} else if (register_password2 == "" || register_password2 == null) {} else if (register_password2 != register_password) {} else {
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
        }
      });
    }
  });

  //Login
  $("#login").click(function() {
    var login_email = $.trim($('#login-email').val());
    var login_password = $.trim($('#login-password').val());

    if (login_email == "" || login_email == null) {} else if (!testEmail.test(login_email)) {} else if (login_password == "" || login_password == null) {} else {}
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
    if ($('#p-type').val() == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to pick a type of product first.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-0").fadeOut();
      $("#product-slide-1").delay(390).fadeIn();
      $(".progress-bar").css("width", "20%");
    }
  });
  $("#product-slide-1-button").click(function() {
    $("#product-slide-1").fadeOut();
    $("#product-slide-2").delay(390).fadeIn();
    $(".progress-bar").css("width", "40%");
  });
  $("#product-slide-2-button").click(function() {
    $("#product-slide-2").fadeOut();
    $("#product-slide-3").delay(390).fadeIn();
    $(".progress-bar").css("width", "60%");
  });
  $("#product-slide-3-button").click(function() {
    $("#product-slide-3").fadeOut();
    $("#product-slide-4").delay(390).fadeIn();
    $(".progress-bar").css("width", "80%");
  });
  $("#product-slide-4-button").click(function() {
    $("#product-slide-4").fadeOut();
    $("#product-slide-5").delay(390).fadeIn();
    $(".progress-bar").css("width", "100%");
  });


  $("#product-slide-5-button").click(function() {
    $("#product-slide-1").fadeOut();
    $("#product-slide-0").delay(390).fadeIn();
    $(".progress-bar").css("width", "0%");
  });
  $("#product-slide-6-button").click(function() {
    $("#product-slide-2").fadeOut();
    $("#product-slide-1").delay(390).fadeIn();
    $(".progress-bar").css("width", "20%");
  });
  $("#product-slide-7-button").click(function() {
    $("#product-slide-3").fadeOut();
    $("#product-slide-2").delay(390).fadeIn();
    $(".progress-bar").css("width", "40%");
  });
  $("#product-slide-8-button").click(function() {
    $("#product-slide-4").fadeOut();
    $("#product-slide-3").delay(390).fadeIn();
    $(".progress-bar").css("width", "60%");
  });
  $("#product-slide-9-button").click(function() {
    $("#product-slide-5").fadeOut();
    $("#product-slide-4").delay(390).fadeIn();
    $(".progress-bar").css("width", "80%");
  });

  //Product Slides
  $(".product-circle").click(function() {
    $(this).parent().find('*').removeClass("active-color-black").removeClass("active-color-white");
    if ($(this).attr("id") == "color-black") {
      $(this).addClass("active-color-white");
    } else {
      $(this).addClass("active-color-black");
    }
  });



  //Product Include
  $('#include-homebtn').change(function() {
    if ($(this).val() == 'yes') {
      $('.include-homebtn-item').css("display", "inline-block");
    } else if ($(this).val() == 'no') {
      $('.include-homebtn-item').css("display", "none");
    }
  });
  $('#include-custombtn').change(function() {
    if ($(this).val() == 'yes') {
      $('.include-custombtn-item').css("display", "inline-block");
    } else if ($(this).val() == 'no') {
      $('.include-custombtn-item').css("display", "none");
    }
  });

  //Product Verification
  $('select').on('change', function(e) {
    var optionSelected = $("option:selected", this);
    var valueSelected = this.value;
  });

  //Product Progress
  $('#product-phone').click(function() {
    $('#p-type').val("phone");
  });
  $('#product-tablet').click(function() {
    $('#p-type').val("tablet");
  });

  $("#border-colors div").click(function() {
    $("#p-border-color").val($(this).attr('id'));
  });
  $("#frame-colors div").click(function() {
    $("#p-frame-color").val($(this).attr('id'));
  });
  $("#backpanel-colors div").click(function() {
    $("#p-backpanel-color").val($(this).attr('id'));
  });

  $('#product-slide-1-button').click(function() {
    $("#p-display-notch").val($(".p-display-notch").val());
    $("#p-display-size").val($(".p-display-size").val());
    $("#p-display-aspectratio").val($(".p-display-aspectratio").val());
    $("#p-display-resolution").val($(".p-display-resolution").val());
    $("#p-display-type").val($(".p-display-type").val());
    $("#p-border-size").val($(".p-border-size").val());
    $("#p-frame-material").val($(".p-frame-material").val());
    $("#p-frame-shape").val($(".p-frame-shape").val());
    $("#p-backpanel-material").val($(".p-backpanel-material").val());
  });

  //Comment Console Validation
  $('.verify').click(function() {
    console.log("Type: " + $('#p-display-notch').val());
    console.log("Type: " + $('#p-display-size').val());
    console.log("Type: " + $('#p-display-aspectratio').val());
    console.log("Type: " + $('#p-display-resolution').val());
    console.log("Type: " + $('#p-display-type').val());
    console.log("Type: " + $('#p-border-color').val());
    console.log("Type: " + $('#p-border-size').val());
    console.log("Type: " + $('#p-frame-material').val());
    console.log("Type: " + $('#p-frame-color').val());
    console.log("Type: " + $('#p-frame-shape').val());
    console.log("Type: " + $('#p-backpanel-material').val());
    console.log("Type: " + $('#p-backpanel-color').val());
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
