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
        <h2 class="note-title">Note example</h2>
        <p class="note-text">Note description, more words to see if its responsive.</p>
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
              <a class="nav-link pr-4" href="product.php">Design your product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="parts.php">Buy parts</a>
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
            <h1 id="product-slider-title">Name</h1>
            <div class="progress">
              <div class="progress-bar" role="progressbar" style="width: 0%; background-color:#151515" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <form id="product-slide-0" style="padding-top: 2.7rem !important;">
              <div class="">
                <h3>Name your phone</h3>
                <input type="text" id="product-name" class="form-control product-input" required>
              </div>
              <div>
                <button type="button" id="product-slide-0-button" class="btn btn-primary float-right mt-2">Next</button>
              </div>
            </form>


            <form id="product-slide-1" style="padding-top: 2.7rem !important;display:none;">
              <h3 class="">Display</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-display-notch" required>
                  <option value="" selected="selected"></option>
                  <option class="25" value="yes">Yes</option>
                  <option class="0" value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Notch</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-display-size" required>
                  <option value="" selected="selected"></option>
                  <option class="35" value="5'">5'</option>
                  <option class="45" value="5.5'">5.5'</option>
                  <option class="55" value="6'">6'</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Size</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-display-aspectratio" required>
                  <option value="" selected="selected"></option>
                  <option class="45" value="18:6">18:6</option>
                  <option class="65" value="18:9">18:9</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Aspect ratio</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-display-resolution" required>
                  <option value="" selected="selected"></option>
                  <option class="10" value="720p">720p</option>
                  <option class="15" value="1080p">1080p</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Resolution</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-display-type" required>
                  <option value="" selected="selected"></option>
                  <option class="30" value="lcd">LCD</option>
                  <option class="50" value="lcd">OLED</option>
                  <option class="85" value="amoled">AMOLED</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Type</label>
              </div>
              <br>
              <h3 class="d-inline-block">Border</h3>
              <div id="border-colors" class="d-inline-block" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <h3 class="d-inline-block">Frame</h3>
              <div id="frame-colors" class="d-inline-block" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-frame-material" required>
                  <option value="" selected="selected"></option>
                  <option class="4.99" value="plastic">Plastic</option>
                  <option class="9.99" value="aluminium">Aluminium</option>
                  <option class="14.99" value="stainless steel">Steinless Steel</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <br>
              <h3 class="d-inline-block">Back Panel</h3>
              <div id="backpanel-colors" class="d-inline-block" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-backpanel-material" required>
                  <option value="" selected="selected"></option>
                  <option class="4.99" value="plastic">Plastic</option>
                  <option class="9.99" value="aluminium">Aluminium</option>
                  <option class="14.99" value="stainless steel">Steinless Steel</option>
                  <option class="14.99" value="glass">Glass</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div>
                <button type="button" id="product-slide-5-button" class="btn btn-primary float-left mt-2">Previous</button>
                <button type="button" id="product-slide-1-button" class="btn btn-primary float-right mt-2">Next</button>
              </div>

            </form>



            <form id="product-slide-2" style="padding-top: 2.7rem !important;display:none">
              <h3 class="d-inline-block">Home Button</h3>
              <div id="homebutton-colors" class="d-inline-block" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <div class="form-group product-detail d-inline-block">
                <select id="include-homebtn" class="form-control p-homebutton-include" required>
                  <option value="" selected="selected"></option>
                  <option class="2.99" value="yes">Yes</option>
                  <option class="0" value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Include</label>
              </div>
              <div class="form-group product-detail include-homebtn-item">
                <select class="form-control p-homebutton-material" required>
                  <option value="" selected="selected"></option>
                  <option class="0" value="plastic">Plastic</option>
                  <option class="4.99" value="aluminium">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail include-homebtn-item">
                <select class="form-control p-homebutton-shape" required>
                  <option value="" selected="selected"></option>
                  <option value="circle">Circle</option>
                  <option value="square">Square</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Shape</label>
              </div>
              <br>
              <h3 class="d-inline-block">Lock Button</h3>
              <div id="lockbutton-colors" class="d-inline-block" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-lockbutton-material" required>
                  <option value="" selected="selected"></option>
                  <option class="0" value="plastic">Plastic</option>
                  <option class="1.99" value="aluminium">Aluminium</option>
                  <option class="2.99" value="stainless steel">Stainless Steel</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-lockbutton-position" required>
                  <option value="" selected="selected"></option>
                  <option value="left">Left</option>
                  <option value="right">Right</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Position</label>
              </div>
              <br>
              <h3 class="d-inline-block">Volume Button</h3>
              <div id="volumebutton-colors" class="d-inline-block" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-volumebutton-material" required>
                  <option value="" selected="selected"></option>
                  <option class="4.99" value="plastic">Plastic</option>
                  <option class="9.99" value="aluminium">Aluminium</option>
                  <option class="14.99" value="stainless steel">Stainless Steel</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-volumebutton-position" required>
                  <option value="" selected="selected"></option>
                  <option value="left">Left</option>
                  <option value="right">Right</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Position</label>
              </div>
              <br>
              <h3 class="d-inline-block">Custom Button</h3>
              <div id="custombutton-colors" class="d-inline-block custominclude" style="height: 30px;margin-left: 5px;">
                <div id="color-black" class="product-circle active-color-white" style="background-color:#151515"></div>
                <div id="color-white" class="product-circle" style="background-color:#ffffff"></div>
                <div id="color-red" class="product-circle" style="background-color:#a52b2b"></div>
              </div>
              <br>
              <div class="form-group product-detail d-inline-block">
                <select id="include-custombtn" class="form-control p-custombutton-include" required>
                  <option value="" selected="selected"></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Include</label>
              </div>
              <div class="form-group product-detail include-custombtn-item">
                <select class="form-control p-custombutton-material" required>
                  <option value="" selected="selected"></option>
                  <option value="plastic">Plastic</option>
                  <option value="aluminium">Aluminium</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Material</label>
              </div>
              <div class="form-group product-detail include-custombtn-item">
                <select class="form-control p-custombutton-position" required>
                  <option value="" selected="selected"></option>
                  <option value="left">Left</option>
                  <option value="right">Right</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Position</label>
              </div>

              <div>
                <button type="button" id="product-slide-6-button" class="btn btn-primary float-left mt-2">Previous</button>
                <button type="button" id="product-slide-2-button" class="btn btn-primary float-right mt-2">Next</button>
              </div>
            </form>

            <form id="product-slide-3" style="padding-top: 2.7rem !important; display:none">
              <h3 class="">Charging Port</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-chargingport-type" required>
                  <option value="" selected="selected"></option>
                  <option value="micro-usb">Micro-USB</option>
                  <option value="type-c">Type-C</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Type</label>
              </div>
              <h3 class="">Jack Port</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-jackport-include" required>
                  <option value="" selected="selected"></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Include</label>
              </div>
              <h3 class="">NFC</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-nfc-include" required>
                  <option value="" selected="selected"></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Include</label>
              </div>
              <h3 class="">Wirless Charging</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-wirelesscharging-include" required>
                  <option value="" selected="selected"></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Include</label>
              </div>

              <div>
                <button type="button" id="product-slide-7-button" class="btn btn-primary float-left mt-2">Previous</button>
                <button type="button" id="product-slide-3-button" class="btn btn-primary float-right mt-2">Next</button>
              </div>
            </form>

            <form id="product-slide-4" style="padding-top: 2.7rem !important; display:none">
              <h3 class="">Main Camera</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-maincamera-megapixels" required>
                  <option value="" selected="selected"></option>
                  <option value="8mp">8MP</option>
                  <option value="12mp">12MP</option>
                  <option value="20mp">20MP</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Megapixels</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-maincamera-type" required>
                  <option value="" selected="selected"></option>
                  <option value="normal">Normal</option>
                  <option value="dual">Dual</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Type</label>
              </div>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-maincamera-layout" required>
                  <option value="" selected="selected"></option>
                  <option value="vertical">Vertical</option>
                  <option value="horizontal">Horizontal</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Layout</label>
              </div>

              <h3 class="">Front Camera</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-frontcamera-megapixels" required>
                  <option value="" selected="selected"></option>
                  <option value="8mp">8MP</option>
                  <option value="12mp">12MP</option>
                  <option value="20mp">20MP</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Megapixels</label>
              </div>

              <h3 class="">Flash</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-flash-type" required>
                  <option value="" selected="selected"></option>
                  <option value="only-back">Only Back</option>
                  <option value="both-sides">Both Sides</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Type</label>
              </div>

              <h3 class="">Face Unlock</h3>
              <div class="form-group product-detail d-inline-block">
                <select class="form-control p-faceunlock-include" required>
                  <option value="" selected="selected"></option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
                <label class="form-control-placeholder" for="edit-streetname">Include</label>
              </div>

              <div>
                <button type="button" id="product-slide-8-button" class="btn btn-primary float-left mt-2">Previous</button>
                <button type="button" id="product-slide-4-button" class="btn btn-primary float-right mt-2">Next</button>
              </div>
            </form>

            <form id="product-slide-5" style="padding-top: 2.7rem !important; display:none">
              <div class="container pt-0">
                <div class="row">
                  <div class="col-sm">
                    <h3 class="">CPU</h3>
                    <div class="form-group product-detail d-inline-block">
                      <select class="form-control p-cpu-model" required>
                        <option value="" selected="selected"></option>
                        <option value="low-end">Low end</option>
                        <option value="medium">Medium</option>
                        <option value="high-end">High end</option>
                      </select>
                      <label class="form-control-placeholder" for="edit-streetname">Model</label>
                    </div>
                    <h3 class="">GPU</h3>
                    <div class="form-group product-detail d-inline-block">
                      <select class="form-control p-gpu-model" required>
                        <option value="" selected="selected"></option>
                        <option value="low-end">Low end</option>
                        <option value="medium">Medium</option>
                        <option value="high-end">High end</option>
                      </select>
                      <label class="form-control-placeholder" for="edit-streetname">Model</label>
                    </div>
                    <h3 class="">Fingerprint Unlock</h3>
                    <div class="form-group product-detail d-inline-block">
                      <select class="form-control p-fingerprintunlock-include" required>
                        <option value="" selected="selected"></option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                      </select>
                      <label class="form-control-placeholder" for="edit-streetname">Include</label>
                    </div>
                  </div>
                  <div class="col-sm">
                    <h3 class="">Storage</h3>
                    <div class="form-group product-detail d-inline-block">
                      <select class="form-control p-storage-option" required>
                        <option value="" selected="selected"></option>
                        <option value="32gb">32GB</option>
                        <option value="64gb">64GB</option>
                        <option value="128gb">128GB</option>
                      </select>
                      <label class="form-control-placeholder" for="edit-streetname">Option</label>
                    </div>
                    <h3 class="">RAM</h3>
                    <div class="form-group product-detail d-inline-block">
                      <select class="form-control p-ram-option" required>
                        <option value="" selected="selected"></option>
                        <option value="2gb">2GB</option>
                        <option value="4gb">4GB</option>
                        <option value="8gb">6GB</option>
                      </select>
                      <label class="form-control-placeholder" for="edit-streetname">Option</label>
                    </div>
                    <h3 class="">Battery</h3>
                    <div class="form-group product-detail d-inline-block">
                      <select class="form-control p-battery-option" required>
                        <option value="" selected="selected"></option>
                        <option value="2,000mah">2,000mAh</option>
                        <option value="3,000mah">3,000mAh</option>
                        <option value="4,000mah">4,000mAh</option>
                      </select>
                      <label class="form-control-placeholder" for="edit-streetname">Option</label>
                    </div>
                  </div>
                </div>
              </div>


              <div>
                <button type="button" id="product-slide-9-button" class="btn btn-primary float-left mt-2">Previous</button>
                <button type="button" id="product-slide-10-button" class="btn btn-primary float-right mt-2 verify">Add to cart</button>
              </div>
            </form>

            <form id="product-slide-6" style="padding-top: 2.7rem !important; display:none;">
              <div class="container" style="margin-top: -43px;padding-bottom: 43px;">
                <div class="row">
                  <div class="col-sm">
                    <div class="pt-5 pb-3 product-finish product-another">
                      <div style="margin:0 auto;width:62.5px">
                        <span style="font-size:100px;" class="fas fa-mobile-alt"></span>
                      </div>
                      <p style="font-size:29px;text-align: center;">Design another phone</p>
                    </div>
                  </div>
                  <div class="col-sm">
                    <div class="pt-5 pb-3 product-finish product-checkout">
                      <div style="margin:0 auto;width:113.5px">
                        <span style="font-size:100px;" class="fas fa-shopping-cart "></span>
                      </div>
                      <p style="font-size:29px;text-align: center;">Checkout</p>
                    </div>
                  </div>
                </div>
              </div>

            </form>

          </div>
        </div>
      </div>
    </section>
    <section>
      <input type="hidden" id="p-display-notch" value="">
      <input type="hidden" id="p-display-size" value="">
      <input type="hidden" id="p-display-aspectratio" value="">
      <input type="hidden" id="p-display-resolution" value="">
      <input type="hidden" id="p-display-type" value="">
      <input type="hidden" id="p-border-color" value="color-black">
      <input type="hidden" id="p-frame-material" value="">
      <input type="hidden" id="p-frame-color" value="color-black">
      <input type="hidden" id="p-frame-shape" value="">
      <input type="hidden" id="p-backpanel-material" value="">
      <input type="hidden" id="p-backpanel-color" value="color-black">

      <input type="hidden" id="p-homebutton-include" value="">
      <input type="hidden" id="p-homebutton-material" value="">
      <input type="hidden" id="p-homebutton-color" value="color-black">
      <input type="hidden" id="p-homebutton-shape" value="">
      <input type="hidden" id="p-lockbutton-material" value="">
      <input type="hidden" id="p-lockbutton-color" value="color-black">
      <input type="hidden" id="p-lockbutton-position" value="">
      <input type="hidden" id="p-volumebutton-material" value="">
      <input type="hidden" id="p-volumebutton-color" value="color-black">
      <input type="hidden" id="p-volumebutton-position" value="">
      <input type="hidden" id="p-custombutton-include" value="">
      <input type="hidden" id="p-custombutton-material" value="">
      <input type="hidden" id="p-custombutton-color" value="color-black">
      <input type="hidden" id="p-custombutton-position" value="">

      <input type="hidden" id="p-chargingport-type" value="">
      <input type="hidden" id="p-jackport-include" value="">
      <input type="hidden" id="p-nfc-include" value="">
      <input type="hidden" id="p-wirelesscharging-include" value="">

      <input type="hidden" id="p-maincamera-megapixels" value="">
      <input type="hidden" id="p-maincamera-type" value="">
      <input type="hidden" id="p-maincamera-layout" value="">
      <input type="hidden" id="p-frontcamera-megapixels" value="">
      <input type="hidden" id="p-flash-type" value="">
      <input type="hidden" id="p-faceunlock-include" value="">

      <input type="hidden" id="p-cpu-model" value="">
      <input type="hidden" id="p-storage-option" value="">
      <input type="hidden" id="p-gpu-model" value="">
      <input type="hidden" id="p-ram-option" value="">
      <input type="hidden" id="p-fingerprintunlock-include" value="">
      <input type="hidden" id="p-battery-option" value="">
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
