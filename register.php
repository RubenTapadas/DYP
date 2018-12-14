<?php

    //Create connection
  $connection = mysqli_connect('localhost', 'root', '', 'dyp');

      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $password= $_POST['password'];
      $email = $_POST['email'];

      $q = "INSERT INTO user(firstname, lastname, password, email) VALUES ('$firstname', '$lastname', '$password', '$email')";

      $query = mysqli_query($connection, $q);

      if($query){
          echo json_encode("Data Inserted Successfully");
          }
      else {
          echo json_encode('problem');
          }

?>
