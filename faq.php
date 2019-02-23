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
  <title>Parts</title>
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

    <div class="container">
      <h1>Questions</h1>

      <div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Does DYP have a physical store?
              </button>
            </h5>
          </div>

          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              No, we only have an online presence.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                My phone is broken what should i do?
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">
              If you know the problem you could buy replacement parts in <a href="parts.php">Buy Parts</a>, but if you dont you can contact us and we can help you (contacts in footer of page).<br>
              If you need help in replacing the parts we have a <a href="#">Youtube channel</a> with step to step tutorials.
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                I received my phone but it isent working or its broken, what should i do?
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
              Every DYP phone comes with a 2 year warranty, if in the rare acourency of your phone coming with problems from factory you can check our <a href="#">Return Policy</a>.
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
                    <span style="vertical-align: top;">Social Media: </span> <a href="https://www.facebook.com/designyourproduct" target="_blank"><span style="font-size:25px;"class="fab fa-facebook-square  "></span></a><span>   </span><a href="https://www.youtube.com/channel/UC9LMTBDElZNmBA9HheL0fIg" target="_blank"><span style="font-size:25px;"class="fab fa-youtube"></span></a>
                  </li>
                  <li >

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
