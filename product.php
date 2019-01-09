<?php
  session_start();
  if(isset($_SESSION["id"])){
    $id = intval($_SESSION['id']);

    $connection = mysqli_connect('localhost', 'root', '', 'dyp');
    $q = "SELECT * FROM user WHERE id_user = '$id'";
    $result = mysqli_query($connection, $q);
    while($rowval = mysqli_fetch_array($result))
    {
      $firstname= $rowval['firstname'];
      $lastname= $rowval['lastname'];
      $email= $rowval['email'];
      $image= $rowval['image'];
    }
  }
?>

<!DOCTYPE html>
<html lang="eng">

<head>
  <meta charset="utf-8">
  <title>Design Your Product</title>
  <link rel="shortcut icon" href="img/logo.ico" type="image/x-icon" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="main.css">
</head>

<body class="semi-light">
  <input type="hidden" id="fetch_user_id" value="<?php echo $id; ?>">
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
              <a class="nav-link user_no" href="login.php">Login/Register</a>
              <div class="user_yes">
                <a class="float-left" href="user.php">
                  <div class="user-mini float-left" style="background-image: url(img/profiles/<?php echo  $image; ?>);"></div>
                </a>
                <a class="nav-link float-left ml-3" href="user.php">
                  <?php echo  $firstname; ?>
                  <?php echo  $lastname; ?></a>
                <a class="nav-link float-left logout ml-1" href="login.php">(logout)</a>
              </div>
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
              <a class="nav-link dropdown-toggle pr-2" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Design Your Product
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

    <section>
      <div class="container">
        <div class="row">
          <div class="col-4 product-box">
            <div class="product-phone">
            </div>
          </div>
          <div class="col pb-5">
            <div class="">
              <div class="float-right product-price">
                <span id="product-price">0</span><span style="font-size:28px;" class="fas fa-euro-sign py-1">
              </div>
            </div>
            <h1>Body</h1>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 20%; background-color:#151515" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

tipo produto

display
border
back panel
sides
battery

home button
volume button
lock button

charging port
jack
nfc

main camera
selfie camera
flash

cpu
gpu
memory
ram
mic
dual sim


            <form style="padding-top: 2.7rem !important;">
              <h3 class="pb-4">Display</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="5">5"</option>
                  <option value="5.5">5.5"</option>
                  <option value="6">6"</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Size</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="plastic">Plastic</option>
                  <option value="aluminium">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="plastic">Yes</option>
                  <option value="aluminium">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Notch</label>
              </div>

              <h3 class="pb-4">Border</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <h3 class="pb-4">Sides</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <h3 class="pb-4">Back Panel</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <h3 class="pb-4">Battery</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <button type="button" id="next" class="btn btn-primary float-right mt-2">Next</button>
            </form>

            <form style="padding-top: 2.7rem !important;">
              <h3 class="pb-4">Main Body</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="5">5"</option>
                  <option value="5.5">5.5"</option>
                  <option value="6">6"</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Size</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="plastic">Plastic</option>
                  <option value="aluminium">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="plastic">1</option>
                  <option value="aluminium">2</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <h3 class="pb-4">Home Button</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <h3 class="pb-4">Volume Button</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Color</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control" required>
                  <option value="" selected="selected"></option>
                  <option value="AL">Plastic</option>
                  <option value="AK">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>







              <div class="form-group">
                <input type="text" id="edit-streetname" class="form-control" required>
                <label class="form-control-placeholder" for="edit-streetname">Volume button</label>
              </div>
              <div class="form-group">
                <input type="text" id="edit-streetname" class="form-control" required>
                <label class="form-control-placeholder" for="edit-streetname">Custom button</label>
              </div>
              <div class="form-group">
                <input type="text" id="edit-housenumber" class="form-control" required>
                <label class="form-control-placeholder" for="edit-housenumber">Jack</label>
              </div>
              <div class="form-group">
                <input type="text" id="edit-postalcode" class="form-control" required>
                <label class="form-control-placeholder" for="edit-postalcode">Size</label>
              </div>
              <button type="button" id="next" class="btn btn-primary float-right mt-2">Next</button>
            </form>

          </div>
        </div>
      </div>
    </section>


    <footer class="page-footer font-small mt-5 fixed-bottom dark-text">
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
                <a href="#!">
                  <?php echo  $firstname; ?></a>
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
  <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js" integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ" crossorigin="anonymous"></script>
</body>

</html>
