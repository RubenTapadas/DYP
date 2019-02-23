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
  <title>Home</title>
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
                  <?php echo  $firstname; ?></a>
                <a class="nav-link float-left logout ml-1" href="login.php">(logout)</a>

              </div>
            </li>
          </ul>
        </div>
        <div class="mx-auto order-0 ">
          <div class="user_yes mt-0">
            <div class="cart-outer-icon" style="cursor:pointer; display:inline-block; margin-top:-1px; margin-left:30px; width:auto;">
              <span style="font-size:28px; cursor:pointer;" class="fas fa-shopping-cart pt-1"></span>
            </div>
            <div class="cart-outer" style="margin-top:42px;">
              <div class="cart-info shade transition pl-2">
                <div class="cart-product-slot transition">
                  <input type="hidden" class="cart-quantity-original" value="100.01">
                  <div class="cart-product-icon"><span class="fas fa-mobile-alt"></span></div><span> </span><span class="cart-product-count">Body</span><span> </span><span class="cart-product-price">100.01</span><span class="fas fa-euro-sign cart-price"></span>
                  <div class="float-right">
                    <div class="cart-left d-inline-block"><span class="fas fa-caret-left"></span></div> <span class="cart-quantity">1</span>
                    <div class="cart-right d-inline-block"><span class="fas fa-caret-right"></span></div>
                    <div class="cart-close d-inline-block"><span class="ml-3 fas fa-times"></span></div>
                  </div><br />
                </div>
                <div class="cart-product-slot transition">
                  <input type="hidden" class="cart-quantity-original" value="0.41">
                  <div class="cart-product-icon"><span class="fas fa-microchip fa-rotate-90"></span></div><span> </span><span class="cart-product-count">Component</span><span> </span><span class="cart-product-price">0.82</span><span class="fas fa-euro-sign cart-price"></span>
                  <div class="float-right">
                    <div class="cart-left d-inline-block"><span class="fas fa-caret-left"></span></div> <span class="cart-quantity">2</span>
                    <div class="cart-right d-inline-block"><span class="fas fa-caret-right"></span></div>
                    <div class="cart-close d-inline-block"><span class="ml-3 fas fa-times"></span></div>
                  </div><br />
                </div>
                <div class="cart-total-outer">
                  <span class="mt-2">Total: </span><span id="cart-total">No items</span><span class="fas fa-euro-sign cart-price show-sign-euro"></span><a class="a-clean" href="purchase.php">Purchase</a>
                </div>
              </div>
            </div>
          </div>
          <a class="navbar-brand mx-auto d-inline-block" href="home.php"><img src="img/logo.svg" alt="DYP logo" /></a>
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

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/slider-1.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/slider-1.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/slider-1.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>


    <div class="container">
      <div class="slot">Something here</div>
    </div>

    <div class="container pt-0">
      <div class="row mt-4">
        <div class="col-sm pr-1 " style="margin-right:14px">
          <div class="shade row" style="background-color: #ffffff;width: 100%;margin-left: 0.15rem;cursor: pointer; ">

            <div class="col-sm">
              <div class="slot-home-1"></div>
            </div>
            <div class="col-sm readyhide-homeimage1">
              <div class=""><span class="slot-home-1-text">Design <br>Your <br>Smartphone</span> </div>
            </div>
          </div>
        </div>
        <div class="col-sm pl-1" style="margin-left:13px">
          <div class="slot">Design your Tablet</div>
        </div>
      </div>
    </div>


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
            <h5 class="text-uppercase">Other pages</h5>
            <ul class="list-unstyled">
              <li>
                <a href="faq.php">FAQ</a>
              </li>
              <li>
                <a href="return.php">Return and Refund Policy</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase">Contancs</h5>
            <ul class="list-unstyled">
              <li>
                Phone: <a href="tel:+351278991">(+351) 923 278 991</a>
              </li>
              <li>
                Email: <a href="mailto:dyp.support@gmail.com">dyp.support@gmail.com</a>
              </li>
              <li>
                <span style="vertical-align: top;">Social Media: </span> <a href="https://www.facebook.com/designyourproduct" target="_blank"><span style="font-size:25px;" class="fab fa-facebook-square  "></span></a><span> </span><a href="https://www.youtube.com/channel/UC9LMTBDElZNmBA9HheL0fIg"
                  target="_blank"><span style="font-size:25px;" class="fab fa-youtube"></span></a>
              </li>
              <li>

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
