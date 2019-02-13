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

    var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
    var check = function(string) {
      for (i = 0; i < specialChars.length; i++) {
        if (string.indexOf(specialChars[i]) > -1) {
          return true
        }
      }
      return false;
    }

    if (register_firstname == "" || register_lastname == "" || register_email == "" || register_password == "" || register_password2 == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else if (!testEmail.test(register_email)) {
      $('.note-title').text("Invalid info");
      $('.note-text').text("Your email is not in a correct format.");
      $(".out-note").fadeIn();
    } else if (1 == 0) {
      $('.note-title').text("Invalid info");
      $('.note-text').text("That email is already being used by another account.");
      $(".out-note").fadeIn();
    } else if (check(register_password) == false) {
      $('.note-title').text("Invalid info");
      $('.note-text').text("Your password needs to contain 8 or more characters with a mix of letters, numbers & symbols.");
      $(".out-note").fadeIn();
    } else if (register_password2 != register_password) {
      $('.note-title').text("Invalid info");
      $('.note-text').text("Your password and confirm password do not match.");
      $(".out-note").fadeIn();
    } else {
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
          window.location.href = "http://localhost/DYP/home.php";
        }
      });
    }
  });

  //Login
  $("#login").click(function() {
    var login_email = $.trim($('#login-email').val());
    var login_password = $.trim($('#login-password').val());

    if (login_email == "" || login_password == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else {}
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

  //Label Click

  //Product Colors
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
      $(this).closest($('#homebutton-colors').css("visibility", "visible"));
    } else if ($(this).val() == 'no') {
      $('.include-homebtn-item').css("display", "none");
      $(this).closest($('#homebutton-colors').css("visibility", "hidden"));
    }
  });
  $('#include-custombtn').change(function() {
    if ($(this).val() == 'yes') {
      $('.include-custombtn-item').css("display", "inline-block");
      $('.custominclude').css("visibility", "visible");
    } else if ($(this).val() == 'no') {
      $('.include-custombtn-item').css("display", "none");
      $('.custominclude').css("visibility", "hidden");
    }
  });

  //Product Cost
  $('#product-slide-5-button').click(function() {
    console.log($(".p-display-notch").children(":selected").attr("id"));
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

  $("#homebutton-colors div").click(function() {
    $("#p-homebutton-color").val($(this).attr('id'));
  });
  $("#lockbutton-colors div").click(function() {
    $("#p-lockbutton-color").val($(this).attr('id'));
  });
  $("#volumebutton-colors div").click(function() {
    $("#p-volumebutton-color").val($(this).attr('id'));
  });
  $("#custombutton-colors div").click(function() {
    $("#p-custombutton-color").val($(this).attr('id'));
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

  $('#product-slide-2-button').click(function() {
    $("#p-homebutton-include").val($(".p-homebutton-include").val());
    $("#p-homebutton-material").val($(".p-homebutton-material").val());
    $("#p-homebutton-shape").val($(".p-homebutton-shape").val());
    $("#p-lockbutton-material").val($(".p-lockbutton-material").val());
    $("#p-lockbutton-position").val($(".p-lockbutton-position").val());
    $("#p-volumebutton-material").val($(".p-volumebutton-material").val());
    $("#p-volumebutton-position").val($(".p-volumebutton-position").val());
    $("#p-custombutton-include").val($(".p-custombutton-include").val());
    $("#p-custombutton-material").val($(".p-custombutton-material").val());
    $("#p-custombutton-position").val($(".p-custombutton-position").val());
  });

  $('#product-slide-3-button').click(function() {
    $("#p-chargingport-type").val($(".p-chargingport-type").val());
    $("#p-jackport-include").val($(".p-jackport-include").val());
    $("#p-nfc-include").val($(".p-nfc-include").val());
    $("#p-wirelesscharging-include").val($(".p-wirelesscharging-include").val());
  });

  $('#product-slide-4-button').click(function() {
    $("#p-maincamera-megapixels").val($(".p-maincamera-megapixels").val());
    $("#p-maincamera-type").val($(".p-maincamera-type").val());
    $("#p-maincamera-layout").val($(".p-maincamera-layout").val());
    $("#p-frontcamera-megapixels").val($(".p-frontcamera-megapixels").val());
    $("#p-flash-type").val($(".p-flash-type").val());
    $("#p-faceunlock-include").val($(".p-faceunlock-include").val());
  });

  $('.verify').click(function() {
    $("#p-cpu-model").val($(".p-cpu-model").val());
    $("#p-storage-option").val($(".p-storage-option").val());
    $("#p-gpu-model").val($(".p-gpu-model").val());
    $("#p-ram-option").val($(".p-ram-option").val());
    $("#p-fingerprintunlock-include").val($(".p-fingerprintunlock-include").val());
    $("#p-battery-option").val($(".p-battery-option").val());
  });

  //Product Cost
  var display_notch = 0;
  var display_size = 0;
  var display_aspectratio = 0;
  var display_resolution = 0;
  var display_type = 0;

  var frame_material = 0;

  var backpanel_material = 0;




  $('select').on('change', '', function(e) {
    var cost_current = Number($("product-price").text());
    var cost = $(this).find('option:selected').attr('class');
    var part = $(this).attr('class').split(' ')[1];
    cost = Number($(this).find('option:selected').attr('class'));
    if (part == "p-display-notch") {
      if (cost == undefined) {
        display_notch = 0;
      } else {
        display_notch = cost;
      }
    } else if (part == "p-display-size") {
      if (cost == undefined) {
        display_size = 0;
      } else {
        display_size = cost;
      }
    } else if (part == "p-display-aspectratio") {
      if (cost == undefined) {
        display_aspectratio = 0;
      } else {
        display_aspectratio = cost;
      }
    } else if (part == "p-display-resolution") {
      if (cost == undefined) {
        display_resolution = 0;
      } else {
        display_resolution = cost;
      }
    } else if (part == "p-display-type") {
      if (cost == undefined) {
        display_type = 0;
      } else {
        display_type = cost;
      }
    } else if (part == "p-frame-material") {
      if (cost == undefined) {
        frame_material = 0;
      } else {
        frame_material = cost;
      }
    } else if (part == "p-backpanel-material") {
      if (cost == undefined) {
        backpanel_material = 0;
      } else {
        backpanel_material = cost;
      }
    }
    cost_current = display_notch +
      display_size +
      display_aspectratio +
      display_resolution +
      display_type +
      frame_material +
      backpanel_material;
    $("#product-price").text(cost_current);
  });

  //Product Slides
  $("#product-slide-0-button").click(function() {
    if ($('#product-name').val() == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to write a name for your phone.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-0").fadeOut();
      $("#product-slide-1").delay(390).fadeIn();
      $(".progress-bar").css("width", "20%");
      $("#product-slider-title").val("Body");
    }
  });

  $("#product-slide-1-button").click(function() {
    if ($('#p-display-notch').val() == "" || $('#p-display-aspectratio').val() == "" || $('#p-display-resolution').val() == "" || $('#p-display-type').val() == "" || $('#p-border-size').val() == "" || $('#p-frame-material').val() == "" || $('#p-frame-shape').val() == "" || $('#p-backpanel-material').val() == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-1").fadeOut();
      $("#product-slide-2").delay(390).fadeIn();
      $(".progress-bar").css("width", "40%");
      $("#product-slider-title").text("Buttons");
    }
  });

  $("#product-slide-2-button").click(function() {
    if ($('#p-homebutton-include').val() == "yes" && $('#p-homebutton-material').val() == "" || $('#p-homebutton-include').val() == "yes" && $('#p-homebutton-shape').val() == "" || $('#p-custombutton-include').val() == "yes" && $('#p-homebutton-material').val() == "" || $('#p-custombutton-include').val() == "yes" && $('#p-custombutton-position').val() == "" || $('#p-homebutton-include').val() == "" || $('#p-custombutton-include').val() == "" || $('#p-lockbutton-material').val() == "" || $('#p-lockbutton-positio').val() == "" || $('#p-volumebutton-material').val() == "" || $('#p-volumebutton-position').val() == "") {

      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-2").fadeOut();
      $("#product-slide-3").delay(390).fadeIn();
      $(".progress-bar").css("width", "60%");
      $("#product-slider-title").text("Connection");
    }
  });

  $("#product-slide-3-button").click(function() {
    if ($('#p-chargingport-type').val() == "" || $('#p-jackport-include').val() == "" || $('#p-nfc-include').val() == "" || $('#p-wirelesscharging-include').val() == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-3").fadeOut();
      $("#product-slide-4").delay(390).fadeIn();
      $(".progress-bar").css("width", "80%");
      $("#product-slider-title").text("Camera");
    }
  });

  $("#product-slide-4-button").click(function() {
    if ($('#p-maincamera-megapixels').val() == "" || $('#p-maincamera-type').val() == "" || $('#p-maincamera-layout').val() == "" || $('#p-frontcamera-megapixels').val() == "" || $('#p-flash-type').val() == "" || $('#p-faceunlock-include').val() == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-4").fadeOut();
      $("#product-slide-5").delay(390).fadeIn();
      $(".progress-bar").css("width", "100%");
      $("#product-slider-title").text("Components");
    }
  });


  $(".verify").click(function() {
    if ($('#p-cpu-model').val() == "" || $('#p-storage-option').val() == "" || $('#p-gpu-model').val() == "" || $('#p-ram-option').val() == "" || $('#p-fingerprintunlock-include').val() == "" || $('#p-battery-option').val() == "") {
      $('.note-title').text("Missing info");
      $('.note-text').text("You need to fill out every field.");
      $(".out-note").fadeIn();
    } else {
      $("#product-slide-5").fadeOut();
      $("#product-slide-6").delay(390).fadeIn();
      $(".progress-bar").css("width", "100%");
      $("#product-slider-title").text("Checkout");
    }
  });

  $("#product-slide-5-button").click(function() {
    $("#product-slide-1").fadeOut();
    $("#product-slide-0").delay(390).fadeIn();
    $(".progress-bar").css("width", "0%");
    $("#product-slider-title").val("Name");
  });
  $("#product-slide-6-button").click(function() {
    $("#product-slide-2").fadeOut();
    $("#product-slide-1").delay(390).fadeIn();
    $(".progress-bar").css("width", "20%");
    $("#product-slider-title").val("Body");
  });
  $("#product-slide-7-button").click(function() {
    $("#product-slide-3").fadeOut();
    $("#product-slide-2").delay(390).fadeIn();
    $(".progress-bar").css("width", "40%");
    $("#product-slider-title").val("Buttons");
  });
  $("#product-slide-8-button").click(function() {
    $("#product-slide-4").fadeOut();
    $("#product-slide-3").delay(390).fadeIn();
    $(".progress-bar").css("width", "60%");
    $("#product-slider-title").val("Connection");
  });
  $("#product-slide-9-button").click(function() {
    $("#product-slide-5").fadeOut();
    $("#product-slide-4").delay(390).fadeIn();
    $(".progress-bar").css("width", "80%");
    $("#product-slider-title").val("Camera");
  });


  //Change Part Store
  $(".part-body").click(function() {
    $(".part-camera,.part-buttons,.part-connection-components").css("border-bottom", "0px solid #151515");
    $(this).css("border-bottom", "10px solid #151515");
  });

  $(".part-buttons").click(function() {
    $(".part-body,.part-camera,.part-connection-components").css("border-bottom", "0px solid #151515");
    $(this).css("border-bottom", "10px solid #151515");
  });

  $(".part-camera").click(function() {
    $(".part-body,.part-buttons,.part-connection-components").css("border-bottom", "0px solid #151515");
    $(this).css("border-bottom", "10px solid #151515");
  });

  $(".part-connection-components").click(function() {
    $(".part-body,.part-buttons,.part-camera").css("border-bottom", "0px solid #151515");
    $(this).css("border-bottom", "10px solid #151515");
  });

  //Cart quantity
  $(".cart-right").click(function() {
    var quantity = parseInt($(this).siblings(".cart-quantity").text());
    var quantity_original = parseFloat($(this).parent().siblings(".cart-quantity-original").val());
    var quantity_after = quantity_original + parseFloat($(this).parent().siblings(".cart-product-price").text());
    var total_text = quantity_original + parseFloat($("#cart-total").text());
    quantity += 1;
    $(this).siblings(".cart-quantity").text(quantity);
    $(this).parent().siblings(".cart-product-price").text(quantity_after.toFixed(2));
    $("#cart-total").text(total_text.toFixed(2));
  });

  $(".cart-left").click(function() {
    var quantity = parseInt($(this).siblings(".cart-quantity").text());
    var quantity_original = parseFloat($(this).parent().siblings(".cart-quantity-original").val());
    var quantity_after = parseFloat($(this).parent().siblings(".cart-product-price").text()) - quantity_original;
    var total_text = parseFloat($("#cart-total").text()) - quantity_original;
    quantity -= 1;
    $(this).siblings(".cart-quantity").text(quantity);
    $(this).parent().siblings(".cart-product-price").text(quantity_after.toFixed(2));
    $("#cart-total").text(total_text.toFixed(2));
    if (quantity > 0) {
      $(this).siblings(".cart-quantity").text(quantity);
    } else {
      $(this).siblings(".cart-quantity").text(0);
      $(this).parents(".cart-product-slot").fadeOut();
    }
  });
  $(".cart-close").click(function() {
    $(this).parents(".cart-product-slot").fadeOut();
  });



  //Cart Total
  var total = 0;
  $(".cart-product-slot:first").css("border-top", "none");
  $(".cart-product-price").each(function() {
    total += Number($(this).text());
  });
  if (total != 0) {
    $(".show-sign-euro").css("display", "inline !important");
    $("#cart-total").text(total.toFixed(2));
  } else {
    $(".show-sign-euro").css("display", "none !important");
    $("#cart-total").text("No items");
  }

  //Cart Display
  var cart_show = false;
  var cart_height = $(".cart-info").height();
  cart_height += 5;
  cart_height *= -1;
  $(".cart-info").css("margin-top", cart_height);
  $(".cart-outer-icon").click(function() {
    if (cart_show == true) {
      $(".cart-info").css("margin-top", cart_height);
      cart_show = false;
    } else if (cart_show == false) {
      $(".cart-info").css("visibility", "visible");
      $(".cart-info").css("margin-top", "0px");
      cart_show = true;
    }
  });

  $(document).mouseup(function(e) {
    if (cart_show == true) {
      var container = $(".cart-outer-icon");
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        var container2 = $(".cart-info");

        if (!container2.is(e.target) && container2.has(e.target).length === 0) {
          var cart_height = $(".cart-info").height();
          cart_height += 5;
          cart_height *= -1;
          $(".cart-info").css("margin-top", cart_height);
          cart_show = false;
        }
      }
    }
  });

  //Product Checkout
  $(".product-another").click(function() {
    window.location.href = "http://localhost/DYP/product.php";
  });

  $(".product-checkout").click(function() {
    window.location.href = "http://localhost/DYP/purchase.php";
  });

  //Change products
  $(".part-body").click(function() {
    $("#part-pick-buttons").fadeOut();
    $("#part-pick-camera").fadeOut();
    $("#part-pick-connectioncomponents").fadeOut();
    $("#part-pick-body").delay(390).fadeIn();
  });

  $(".part-buttons").click(function() {
    $("#part-pick-body").fadeOut();
    $("#part-pick-camera").fadeOut();
    $("#part-pick-connectioncomponents").fadeOut();
    $("#part-pick-buttons").delay(390).fadeIn();
  });

  $(".part-camera").click(function() {
    $("#part-pick-buttons").fadeOut();
    $("#part-pick-body").fadeOut();
    $("#part-pick-connectioncomponents").fadeOut();
    $("#part-pick-camera").delay(390).fadeIn();
  });

  $(".part-connection-components").click(function() {
    $("#part-pick-buttons").fadeOut();
    $("#part-pick-camera").fadeOut();
    $("#part-pick-body").fadeOut();
    $("#part-pick-connectioncomponents").delay(390).fadeIn();
  });

  //Collapse
  $('.btn-link').click(function() {
    $(this).parent('.card-header').addClass('.card-header-bottom');
  });

  //Item description
  $('.form-purchase').click(function() {
    $(this).find(".specs").fadeOut();
  });

  $(".cart-outer-icon").click(function() {
    if ($(window).width() < 751) {
      window.location.href = "http://localhost/DYP/purchase.php";
    }
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
