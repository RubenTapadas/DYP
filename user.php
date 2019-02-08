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
              <div class="user_yes active">
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
    <div class="blank"></div>
    <div class="container">
      <div class="top-banner">
        <div class="user-image d-inline-block position-absolute" style="z-index:10; background-image: url(img/profiles/<?php echo  $image; ?>);"></div>
        <div class="user-name d-inline-block" style="padding-left:170px;">
          <input class="dark-text hide-input" type="text" value="<?php echo  $firstname; ?> <?php echo  $lastname; ?>" readonly>
        </div>
      </div>

      <nav class="navbar navbar-expand-sm bg-light" style="padding-left:170px; border:0 !important;">

        <!-- Links -->
        <ul class="navbar-nav">
          <li class="nav-item active" id="option1">
            <a class="nav-link" href="#"><span class="fas fa-user pr-1"></span>Profile</a>
          </li>
          <li class="nav-item" id="option2">
            <a class="nav-link" href="#"><span class="fas fa-map-marker-alt pr-1"></span>Address</a>
          </li>
          <li class="nav-item" id="option3">
            <a class="nav-link" href="#"><span class="fas fa-shopping-cart pr-1"></span>Purchases</a>
          </li>
        </ul>

      </nav>


      <div class="user-profile" id="user1">
        <h1><span class="fas fa-user pr-2"></span>Profile</h1>
        <div class="form-row">
          <div class="col-9" style="padding-right: 15px;">
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
          <div class="col-3" style="padding-left: 15px;">
            <h4><b>Profile image</b></h4>
            <form class="shade light p-4">
              <div class="form-row" style=" margin: 0 auto;width:170px;">
                <div class="user-image d-inline-block position-absolute" style="width:170px; height:170px; z-index:10; background-image: url(img/profiles/<?php echo  $image; ?>);"></div>
              </div>
              <div class="form-row">
                <div class="col">
                  <button type="submit" id="editphoto" class="btn btn-primary" style="margin-top: 198px; width:100%">Change image</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="user-profile" id="user2">
        <h1><span class="fas fa-map-marker-alt pr-2"></span>Address</h1>
        <form class="p-4 shade light" style="padding-top: 2.7rem !important;">
          <div class="row">
            <div class="col-sm">
              <div class="form-group">
                <select class="form-control" required>
                  <option value="<?php echo  $country; ?>" selected="selected"></option>
                  <option value="AF">Afghanistan</option>
                  <option value="AX">Åland Islands</option>
                  <option value="AL">Albania</option>
                  <option value="DZ">Algeria</option>
                  <option value="AS">American Samoa</option>
                  <option value="AD">Andorra</option>
                  <option value="AO">Angola</option>
                  <option value="AI">Anguilla</option>
                  <option value="AQ">Antarctica</option>
                  <option value="AG">Antigua and Barbuda</option>
                  <option value="AR">Argentina</option>
                  <option value="AM">Armenia</option>
                  <option value="AW">Aruba</option>
                  <option value="AU">Australia</option>
                  <option value="AT">Austria</option>
                  <option value="AZ">Azerbaijan</option>
                  <option value="BS">Bahamas</option>
                  <option value="BH">Bahrain</option>
                  <option value="BD">Bangladesh</option>
                  <option value="BB">Barbados</option>
                  <option value="BY">Belarus</option>
                  <option value="BE">Belgium</option>
                  <option value="BZ">Belize</option>
                  <option value="BJ">Benin</option>
                  <option value="BM">Bermuda</option>
                  <option value="BT">Bhutan</option>
                  <option value="BO">Bolivia, Plurinational State of</option>
                  <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                  <option value="BA">Bosnia and Herzegovina</option>
                  <option value="BW">Botswana</option>
                  <option value="BV">Bouvet Island</option>
                  <option value="BR">Brazil</option>
                  <option value="IO">British Indian Ocean Territory</option>
                  <option value="BN">Brunei Darussalam</option>
                  <option value="BG">Bulgaria</option>
                  <option value="BF">Burkina Faso</option>
                  <option value="BI">Burundi</option>
                  <option value="KH">Cambodia</option>
                  <option value="CM">Cameroon</option>
                  <option value="CA">Canada</option>
                  <option value="CV">Cape Verde</option>
                  <option value="KY">Cayman Islands</option>
                  <option value="CF">Central African Republic</option>
                  <option value="TD">Chad</option>
                  <option value="CL">Chile</option>
                  <option value="CN">China</option>
                  <option value="CX">Christmas Island</option>
                  <option value="CC">Cocos (Keeling) Islands</option>
                  <option value="CO">Colombia</option>
                  <option value="KM">Comoros</option>
                  <option value="CG">Congo</option>
                  <option value="CD">Congo, the Democratic Republic of the</option>
                  <option value="CK">Cook Islands</option>
                  <option value="CR">Costa Rica</option>
                  <option value="CI">Côte d'Ivoire</option>
                  <option value="HR">Croatia</option>
                  <option value="CU">Cuba</option>
                  <option value="CW">Curaçao</option>
                  <option value="CY">Cyprus</option>
                  <option value="CZ">Czech Republic</option>
                  <option value="DK">Denmark</option>
                  <option value="DJ">Djibouti</option>
                  <option value="DM">Dominica</option>
                  <option value="DO">Dominican Republic</option>
                  <option value="EC">Ecuador</option>
                  <option value="EG">Egypt</option>
                  <option value="SV">El Salvador</option>
                  <option value="GQ">Equatorial Guinea</option>
                  <option value="ER">Eritrea</option>
                  <option value="EE">Estonia</option>
                  <option value="ET">Ethiopia</option>
                  <option value="FK">Falkland Islands (Malvinas)</option>
                  <option value="FO">Faroe Islands</option>
                  <option value="FJ">Fiji</option>
                  <option value="FI">Finland</option>
                  <option value="FR">France</option>
                  <option value="GF">French Guiana</option>
                  <option value="PF">French Polynesia</option>
                  <option value="TF">French Southern Territories</option>
                  <option value="GA">Gabon</option>
                  <option value="GM">Gambia</option>
                  <option value="GE">Georgia</option>
                  <option value="DE">Germany</option>
                  <option value="GH">Ghana</option>
                  <option value="GI">Gibraltar</option>
                  <option value="GR">Greece</option>
                  <option value="GL">Greenland</option>
                  <option value="GD">Grenada</option>
                  <option value="GP">Guadeloupe</option>
                  <option value="GU">Guam</option>
                  <option value="GT">Guatemala</option>
                  <option value="GG">Guernsey</option>
                  <option value="GN">Guinea</option>
                  <option value="GW">Guinea-Bissau</option>
                  <option value="GY">Guyana</option>
                  <option value="HT">Haiti</option>
                  <option value="HM">Heard Island and McDonald Islands</option>
                  <option value="VA">Holy See (Vatican City State)</option>
                  <option value="HN">Honduras</option>
                  <option value="HK">Hong Kong</option>
                  <option value="HU">Hungary</option>
                  <option value="IS">Iceland</option>
                  <option value="IN">India</option>
                  <option value="ID">Indonesia</option>
                  <option value="IR">Iran, Islamic Republic of</option>
                  <option value="IQ">Iraq</option>
                  <option value="IE">Ireland</option>
                  <option value="IM">Isle of Man</option>
                  <option value="IL">Israel</option>
                  <option value="IT">Italy</option>
                  <option value="JM">Jamaica</option>
                  <option value="JP">Japan</option>
                  <option value="JE">Jersey</option>
                  <option value="JO">Jordan</option>
                  <option value="KZ">Kazakhstan</option>
                  <option value="KE">Kenya</option>
                  <option value="KI">Kiribati</option>
                  <option value="KP">Korea, Democratic People's Republic of</option>
                  <option value="KR">Korea, Republic of</option>
                  <option value="KW">Kuwait</option>
                  <option value="KG">Kyrgyzstan</option>
                  <option value="LA">Lao People's Democratic Republic</option>
                  <option value="LV">Latvia</option>
                  <option value="LB">Lebanon</option>
                  <option value="LS">Lesotho</option>
                  <option value="LR">Liberia</option>
                  <option value="LY">Libya</option>
                  <option value="LI">Liechtenstein</option>
                  <option value="LT">Lithuania</option>
                  <option value="LU">Luxembourg</option>
                  <option value="MO">Macao</option>
                  <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                  <option value="MG">Madagascar</option>
                  <option value="MW">Malawi</option>
                  <option value="MY">Malaysia</option>
                  <option value="MV">Maldives</option>
                  <option value="ML">Mali</option>
                  <option value="MT">Malta</option>
                  <option value="MH">Marshall Islands</option>
                  <option value="MQ">Martinique</option>
                  <option value="MR">Mauritania</option>
                  <option value="MU">Mauritius</option>
                  <option value="YT">Mayotte</option>
                  <option value="MX">Mexico</option>
                  <option value="FM">Micronesia, Federated States of</option>
                  <option value="MD">Moldova, Republic of</option>
                  <option value="MC">Monaco</option>
                  <option value="MN">Mongolia</option>
                  <option value="ME">Montenegro</option>
                  <option value="MS">Montserrat</option>
                  <option value="MA">Morocco</option>
                  <option value="MZ">Mozambique</option>
                  <option value="MM">Myanmar</option>
                  <option value="NA">Namibia</option>
                  <option value="NR">Nauru</option>
                  <option value="NP">Nepal</option>
                  <option value="NL">Netherlands</option>
                  <option value="NC">New Caledonia</option>
                  <option value="NZ">New Zealand</option>
                  <option value="NI">Nicaragua</option>
                  <option value="NE">Niger</option>
                  <option value="NG">Nigeria</option>
                  <option value="NU">Niue</option>
                  <option value="NF">Norfolk Island</option>
                  <option value="MP">Northern Mariana Islands</option>
                  <option value="NO">Norway</option>
                  <option value="OM">Oman</option>
                  <option value="PK">Pakistan</option>
                  <option value="PW">Palau</option>
                  <option value="PS">Palestinian Territory, Occupied</option>
                  <option value="PA">Panama</option>
                  <option value="PG">Papua New Guinea</option>
                  <option value="PY">Paraguay</option>
                  <option value="PE">Peru</option>
                  <option value="PH">Philippines</option>
                  <option value="PN">Pitcairn</option>
                  <option value="PL">Poland</option>
                  <option value="PT">Portugal</option>
                  <option value="PR">Puerto Rico</option>
                  <option value="QA">Qatar</option>
                  <option value="RE">Réunion</option>
                  <option value="RO">Romania</option>
                  <option value="RU">Russian Federation</option>
                  <option value="RW">Rwanda</option>
                  <option value="BL">Saint Barthélemy</option>
                  <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                  <option value="KN">Saint Kitts and Nevis</option>
                  <option value="LC">Saint Lucia</option>
                  <option value="MF">Saint Martin (French part)</option>
                  <option value="PM">Saint Pierre and Miquelon</option>
                  <option value="VC">Saint Vincent and the Grenadines</option>
                  <option value="WS">Samoa</option>
                  <option value="SM">San Marino</option>
                  <option value="ST">Sao Tome and Principe</option>
                  <option value="SA">Saudi Arabia</option>
                  <option value="SN">Senegal</option>
                  <option value="RS">Serbia</option>
                  <option value="SC">Seychelles</option>
                  <option value="SL">Sierra Leone</option>
                  <option value="SG">Singapore</option>
                  <option value="SX">Sint Maarten (Dutch part)</option>
                  <option value="SK">Slovakia</option>
                  <option value="SI">Slovenia</option>
                  <option value="SB">Solomon Islands</option>
                  <option value="SO">Somalia</option>
                  <option value="ZA">South Africa</option>
                  <option value="GS">South Georgia and the South Sandwich Islands</option>
                  <option value="SS">South Sudan</option>
                  <option value="ES">Spain</option>
                  <option value="LK">Sri Lanka</option>
                  <option value="SD">Sudan</option>
                  <option value="SR">Suriname</option>
                  <option value="SJ">Svalbard and Jan Mayen</option>
                  <option value="SZ">Swaziland</option>
                  <option value="SE">Sweden</option>
                  <option value="CH">Switzerland</option>
                  <option value="SY">Syrian Arab Republic</option>
                  <option value="TW">Taiwan, Province of China</option>
                  <option value="TJ">Tajikistan</option>
                  <option value="TZ">Tanzania, United Republic of</option>
                  <option value="TH">Thailand</option>
                  <option value="TL">Timor-Leste</option>
                  <option value="TG">Togo</option>
                  <option value="TK">Tokelau</option>
                  <option value="TO">Tonga</option>
                  <option value="TT">Trinidad and Tobago</option>
                  <option value="TN">Tunisia</option>
                  <option value="TR">Turkey</option>
                  <option value="TM">Turkmenistan</option>
                  <option value="TC">Turks and Caicos Islands</option>
                  <option value="TV">Tuvalu</option>
                  <option value="UG">Uganda</option>
                  <option value="UA">Ukraine</option>
                  <option value="AE">United Arab Emirates</option>
                  <option value="GB">United Kingdom</option>
                  <option value="US">United States</option>
                  <option value="UM">United States Minor Outlying Islands</option>
                  <option value="UY">Uruguay</option>
                  <option value="UZ">Uzbekistan</option>
                  <option value="VU">Vanuatu</option>
                  <option value="VE">Venezuela, Bolivarian Republic of</option>
                  <option value="VN">Viet Nam</option>
                  <option value="VG">Virgin Islands, British</option>
                  <option value="VI">Virgin Islands, U.S.</option>
                  <option value="WF">Wallis and Futuna</option>
                  <option value="EH">Western Sahara</option>
                  <option value="YE">Yemen</option>
                  <option value="ZM">Zambia</option>
                  <option value="ZW">Zimbabwe</option>
                </select>
                <label class="form-control-placeholder" for="edit-country">Country</label>
              </div>
              <div class="form-group">
                <input type="text" id="edit-streetname" class="form-control" required>
                <label class="form-control-placeholder" for="edit-streetname">Street name</label>
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <input type="text" id="edit-city" class="form-control" required>
                <label class="form-control-placeholder" for="edit-city">City</label>
              </div>
              <div class="form-group">
                <input type="text" id="edit-housenumber" class="form-control" required>
                <label class="form-control-placeholder" for="edit-housenumber">House number</label>
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group">
                <input type="text" id="edit-postalcode" class="form-control" required>
                <label class="form-control-placeholder" for="edit-postalcode">Postal code</label>
              </div>

            </div>
          </div>
          <button type="button" id="edit2" class="btn btn-primary">Save</button>
        </form>
      </div>

      <div class="user-profile" id="user3">
        <h1><span class="fas fa-shopping-cart pr-2"></span>Purchases</h1>
        <form class="p-4 mb-4 shade light pointer form-purchase" id="go-productdetails2">
          <div class="slot-purchase">
            <div class="row">
              <div class="col-2" id="purchases-image"></div>
              <div class="col-10">
                <h3 class="font-weight-bold">Name of the product</h3>
                <div class="specs">
                  <div class="row specs-half align-items-center">
                    <div class="col-4 align-middle purchased-colum">
                      <div class="purchase-cover-icon d-inline-block">
                        <span class="fas fa-arrows-alt-v purchase-icon rotate-45"></span>
                      </div>
                      <div class="d-inline-block">
                        <span>Screen Size</span>
                        <p>6.18</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle purchased-colum">
                      <div class="purchase-cover-icon d-inline-block">
                        <span class="fas fa-memory purchase-icon"></span>
                      </div>
                      <div class="d-inline-block">
                        <span>RAM</span>
                        <p>8GB</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle purchased-colum">
                      <div class="purchase-cover-icon d-inline-block">
                        <span class="fas fa-folder purchase-icon"></span>
                      </div>
                      <div class="d-inline-block">
                        <span>Internal Storage</span>
                        <p>256GB</p>
                      </div>
                    </div>
                  </div>
                  <div class="row specs-half align-items-center">
                    <div class="col-4 align-middle purchased-colum">
                      <div class="purchase-cover-icon d-inline-block">
                        <span class="fas fa-battery-three-quarters purchase-icon"></span>
                      </div>
                      <div class="d-inline-block">
                        <span>Battery</span>
                        <p>4000mAh</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle purchased-colum">
                      <div class="purchase-cover-icon d-inline-block">
                        <span class="fas fa-microchip purchase-icon fa-rotate-90"></span>
                      </div>
                      <div class="d-inline-block">
                        <span>Processor</span>
                        <p>Octa-core</p>
                      </div>
                    </div>
                    <div class="col-4 align-middle purchased-colum">
                      <div class="purchase-cover-icon d-inline-block">
                        <span class="fas fa-plus purchase-icon"></span>
                      </div>
                      <div class="d-inline-block">
                        <span>More</span>
                        <p>Product details</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
        
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

  <script defer src="https://use.fontawesome.com/releases/v5.6.1/js/all.js" integrity="sha384-R5JkiUweZpJjELPWqttAYmYM1P3SNEJRM6ecTQF05pFFtxmCO+Y1CiUhvuDzgSVZ" crossorigin="anonymous"></script>
</body>

</html>
