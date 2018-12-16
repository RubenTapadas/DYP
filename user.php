<?php
  session_start();
  if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
  }

  $id = intval($_SESSION['id']);

  $connection = mysqli_connect('localhost', 'root', '', 'dyp');
  $q = "SELECT * FROM user WHERE id_user = '$id'";
  $result = mysqli_query($connection, $q);
  while($rowval = mysqli_fetch_array($result))
  {
    $firstname= $rowval['firstname'];
    $lastname= $rowval['lastname'];
    $email= $rowval['email'];
    $password= $rowval['password'];
    $country= $rowval['country'];
    $image= $rowval['image'];
  }
?>

<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8">
  <title>User</title>
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
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login/Register</a>
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
              <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Products
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Smartphones</a>
                <a class="dropdown-item" href="#">Tablets</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Info</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="blank"></div>
    <div class="container">
      <div class="top-banner">
        <div class="user-image d-inline-block position-absolute" style="z-index:10; background-image: url(img/profiles/<?php echo  $image; ?>);"></div>
        <div class="user-name d-inline-block" style="padding-left:170px;">
          <input class="dark-text hide-input" type="text" value="<?php echo  $firstname; ?> <?php echo  $lastname; ?>" readonly>
        </div>
      </div>

      <nav class="navbar navbar-expand-sm bg-light" style="padding-left:170px;">

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item active" id="option1">
            <a class="nav-link" href="#">Profile</a>
          </li>
          <li class="nav-item" id="option2">
            <a class="nav-link" href="#">Address</a>
          </li>
          <li class="nav-item" id="option3">
            <a class="nav-link" href="#">Purchases</a>
          </li>
        </ul>

      </nav>


      <div class="user-profile" id="user1">
        <h1>User Profile</h1>
        <form class="p-4 pt-5 shade light">
          <div class="form-row">
            <div class="col">
              <div class="form-group">
                <input type="text" id="edit-firstname" class="form-control" required value="<?php echo  $firstname; ?>">
                <label class="form-control-placeholder" for="edit-firstname">First name</label>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <input type="text" id="edit-lastname" class="form-control" required value="<?php echo  $lastname; ?>">
                <label class="form-control-placeholder" for="edit-lastname">Last name</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <input type="text" id="edit-email" class="form-control" required value="<?php echo  $email; ?>">
            <label class="form-control-placeholder" for="edit-email">Email address</label>
          </div>
          <div class="form-group">
            <input type="text" id="edit-password" class="form-control" required value="<?php echo  $password; ?>">
            <label class="form-control-placeholder" for="edit-password">Password</label>
          </div>
          <button type="submit" id="edit1" class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="user-profile" id="user2">
        <h1>Address</h1>
        <form class="p-4 shade light" style="padding-top: 2.7rem !important;">
          <div class="form-group">
            <input type="text" id="edit-country" class="form-control" required value="<?php echo  $country; ?>">
            <label class="form-control-placeholder" for="edit-country">Country</label>
          </div>
          <div class="form-group">
            <input type="text" id="edit-city" class="form-control" required>
            <label class="form-control-placeholder" for="edit-city">City</label>
          </div>
          <div class="form-group">
            <input type="text" id="edit-streetname" class="form-control" required>
            <label class="form-control-placeholder" for="edit-streetname">Street name</label>
          </div>
          <div class="form-group">
            <input type="text" id="edit-housenumber" class="form-control" required>
            <label class="form-control-placeholder" for="edit-housenumber">House number</label>
          </div>
          <div class="form-group">
            <input type="text" id="edit-postalcode" class="form-control" required>
            <label class="form-control-placeholder" for="edit-postalcode">Postal code</label>
          </div>
          <button type="button" id="edit2" class="btn btn-primary">Save</button>
        </form>
      </div>
      <div class="user-profile" id="user3">
        <h1>Purchase History</h1>
        <form class="p-4 shade light pointer" id="go-productdetails">
          <div class="slot-purchase">
            <div class="row">
              <div class="col-2" id="purchases-image"></div>
              <div class="col-10">
                <h3 class="font-weight-bold">Name of the product</h3>
                <div class="specs">
                  <div class="row specs-half align-items-center">
                    <div class="col-4 align-middle">
                      <div class="spec-icon d-inline-block mr-2 slot-1"></div>
                      <div class="d-inline-block">
                        <span>Size</span>
                        <p>Name of product</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle">
                      <div class="spec-icon d-inline-block mr-2 slot-2"></div>
                      <div class="d-inline-block">
                        <span>Ram</span>
                        <p>Name of product</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle">
                      <div class="spec-icon d-inline-block mr-2 slot-3"></div>
                      <div class="d-inline-block">
                        <span>Storage</span>
                        <p>Name of product</p>
                      </div>
                    </div>
                  </div>
                  <div class="row specs-half align-items-center">
                    <div class="col-4 align-middle">
                      <div class="spec-icon d-inline-block mr-2 slot-4"></div>
                      <div class="d-inline-block">
                        <span>Battery</span>
                        <p>Name of product</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle">
                      <div class="spec-icon d-inline-block mr-2 slot-5"></div>
                      <div class="d-inline-block">
                        <span>Processor</span>
                        <p>Name of product</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle">
                      <div class="spec-icon d-inline-block mr-2 slot-6"></div>
                      <div class="d-inline-block">
                        <span>More</span>
                        <p>More info about the product</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="pt-3"></div>
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
      <div class="footer-copyright text-center py-2">© 2019 Copyright:
        <a href="https://www.linkedin.com/in/rubentapadas/" target="_blank"> Ruben Tapadas</a>
        &
        <a href="https://www.linkedin.com/in/hugoolmo/" target="_blank"> Hugo Olmo</a>
      </div>
    </footer>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>
