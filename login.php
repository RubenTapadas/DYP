<?php
  session_start();
  session_destroy();
  $con = mysqli_connect('localhost', 'root', '', 'dyp');

  if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } session_start();

  if (isset($_POST['email'])){
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($con,$email);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con,$password);

    $query = "SELECT * FROM user WHERE email='$email' and password='$password'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
      if($rows==1){
        while($row = mysqli_fetch_array($result)) {
          $_SESSION['id'] = $row['id_user'];
        } header("Location: user.php");
        } else{
          echo "<div class='form'>
          <h3>Username/password is incorrect.</h3>
          <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    } else{}
?>


<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8">
  <!-- <meta name="google-signin-client_id" content="921625995391-2kgadcbdevb8opl2c28tbpbrbm97tjl3.apps.googleusercontent.com"> -->
  <title>Login/Resgister</title>
  <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
</head>

<body class="semi-light">
  <div class="footer-compensate">
    <div class="out-note">
      <div class="note">
        <h2>Note example</h2>
        <p>Note description, more words to see if its responsive.</p>
      </div>
    </div>

    <div class="out-note-pass">
      <div class="note">
        <h2>Action that needs the user's password</h2>
        <div class="form-row">
          <div class="col">
            <input type="password" id="note-password" class="form-control" required>
          </div>
          <div class="col">
            <button type="submit" id="edit1" class="btn btn-primary align-top">Confirm</button>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-md navbar-light bg-light border-bottom light font-weight-bold">
      <div class="container pt-0">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="login.php">Login/Register</a>
            </li>
          </ul>
        </div>
        <div class="mx-auto order-0">
          <a class="navbar-brand mx-auto" href="home.php"><img src="img/logo.svg" alt="DYP logo" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
              <a class="nav-link pr-4" href="product.php">Design your product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parts.php">Buy parts</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


    <div class="container">
      <div class="row responsive-movedown">
        <div class="col light py-2 px-4 shade mr-2 responsive-removeleft" style="height: 290px;">
          <h1 class="light_text font-weight-bold pb-4">Login</h1>
          <form method="post" name="login">
            <div class="form-group">
              <input type="text" name="email" id="login-email" class="form-control" required>
              <label class="form-control-placeholder" for="login-email">Email address</label>
            </div>
            <div class="form-group">
              <input type="password" name="password" id="login-password" class="form-control" required>
              <label class="form-control-placeholder" for="login-password">Password</label>
            </div>
            <button name="submit" type="submit" value="Login" class="btn btn-primary">Submit</button>
          </form>
          <!-- <div class="g-signin2" data-onsuccess="onSignIn"></div>
        <a class="no_textdecoration" href="#"><small class="text_highlight form-text text-muted mt-2">Forgot Username?</small></a>
        <a class="no_textdecoration" href="#"><small class="text_highlight form-text text-muted mt-1">Forgot Password?</small></a> -->
        </div>
        <div class="col light pt-2 pb-4 px-4 shade ml-2">
          <h1 class="light_text font-weight-bold pb-4">Register</h1>
          <form>
            <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <input type="text" id="register-firstname" class="form-control" required>
                  <label class="form-control-placeholder" for="register-firstname">First name</label>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <input type="text" id="register-lastname" class="form-control" required>
                  <label class="form-control-placeholder" for="register-lastname">Last name</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" id="register-email" class="form-control" required>
              <label class="form-control-placeholder" for="register-email">Email address</label>
            </div>
            <div class="form-row">
              <div class="col">
                <div class="form-group mb-0">
                  <input type="password" id="register-password" class="form-control" required>
                  <label class="form-control-placeholder" for="register-password">Password</label>
                </div>
              </div>
              <div class="col">
                <div class="form-group mb-0">
                  <input type="password" id="register-password2" class="form-control" required>
                  <label class="form-control-placeholder" for="register-password2">Confirm</label>
                </div>
              </div>
            </div>
            <small class="form-text text-muted mb-3">Use 8 or more characters with a mix of letters, numbers & symbols</small>
            <button type="button" id="register" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>


    <footer class="page-footer font-small mt-5 dark-text">
      <div class="container text-center text-md-left">
        <div class="row pb-2">
          <div class="col-md-6 mt-md-0 mt-3">
            <h5 class="text-uppercase">DYP</h5>
            <span>Design Your Product.</span>
            <p>Because the best product for you is the one you create.</p>
          </div>
          <hr class="clearfix w-100 d-md-none pb-3">
          <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright text-center py-2"><span class="responsive-br">© 2019 Copyright:</span>
        <a href="https://www.linkedin.com/in/rubentapadas/" target="_blank"> Ruben Tapadas</a>
        &
        <a href="https://www.linkedin.com/in/hugoolmo/" target="_blank"> Hugo Olmo</a>
      </div>
    </footer>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <script src="main.js"></script>
</body>

</html>
