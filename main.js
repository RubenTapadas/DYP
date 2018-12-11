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

  //test
  $("#name-submit").click(function() {
    var name = $('#name').val();
    if ($.trim(name) != ''){
      $.ajax({
        url:"main.php", //the page containing php script
        type: "POST", //request type
        success:function(result){
         alert(result);
       }
     });
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
