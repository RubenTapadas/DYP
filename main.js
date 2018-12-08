$(window).on('load', function() {

  //Note
  $(".out-note").click(function() {
    $(".out-note").fadeOut();
  });

  //Edit - Fill inputs
  $("#edit-firstname").val('Someone');
  $("#edit-lastname").val('Test');
  $("#edit-email").val('someone@test.com');
  $("#edit-password").val('12345');

  //Edit - Change active page
  function changeactivetab() {
    $("#option1,#option2,#option3").removeClass("active");
    $(this).addClass("active");

    $("#user1,#user2,#user3").css("display", "none");;


    if ($(this).attr("id") == ('option1')) {
      $("#user1").fadeIn();
    }
    else if ($(this).attr("id") == ('option2')) {
      $("#user2").fadeIn();
    }
    else if ($(this).attr("id") == ('option3')) {
      $("#user3").fadeIn();
    }
    console.log($(this).attr("id"));
    //else if ($this.is('#option2')) {
    //  $("#user2").css("display", "block");
    //}
    //else if ($this.is('#option3')) {
      //$("#user3").css("display", "block");
    //}


  }

  $("#option1").click(changeactivetab);
  $("#option2").click(changeactivetab),
    function() {
      $("#user2").css("display", "block");
    }
  $("#option3").click(changeactivetab);



  //Google
  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
    console.log('Name: ' + profile.getName());
    console.log('Image URL: ' + profile.getImageUrl());
    console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
  }

});
