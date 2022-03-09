<?php
include('config.php');
session_start();
error_reporting(0);
if(isset($_SESSION['username'])){
    header('Location: index.php');
}
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $Password = md5($_POST['Password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND Password = '$Password'";
    $result = mysqli_query($conn, $sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header('Location: index.php');
    }else{
        echo "<script>alert('Whoops! Email or Password is wrong')</script>";
    }
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400&display=swap" rel="stylesheet">
    <!--CSS link-->
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/.c26cd2166c.js" crossorigin="anonymous"></script>
    <title>Hello, world!</title>
  </head>
  <body>
    <section class="navigation">
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
          <a class="navbar-brand" href="#">Twoven</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav m-auto py-2 my-lg-4">
         
              <li class="nav-item">
              <a style=" text-decoration:none; margin-right:40px;" class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
              </li>
              <li class="nav-item">
              <a style="color:blue; margin-right:40px;"><i class="fa fa-cc-visa" style="font-size:30px;color:#1e90ff" aria-hidden="true"></i>Payment</a>
              </li>
              
              <li class="nav-item">
              <a style=" text-decoration:none; margin-right:40px;" href="register.php"><i class="fa fa-fw fa-user"></i> Account</a>
              </li>
              <li class="nav-item ">
              <a href="cart.php" style="color:blue; text-decoration:none; margin-right:40px;"><i class="fa fa-shopping-cart" style="font-size:30px;color:#1e90ff"></i>Cart</a>
              </li>
            </ul>
            <form class="d-flex mr-6">
              <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
              <button class="btn1 btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
</section>

      <section class="main">
        <div class="container py-5 ">
          <div class="row pt-5">
            <div class="col-lg-7 pt-5 text-center">
              <h1>Need for speed <br>
              Enjoy,Earn,Experience</h1>
              <button class="btn2 mt-2"><a class="link"href="more.php">More Info</a></button>
            </div>

          </div>
        </div>
      </section>

      <!-- New SECTION FOR FEW ICONS-->

      <section class="new ">
        <div class="container py-5 text-center ">
          <div class="row py-5">
            <div class="col-lg-11 m-auto">
              <div class="row">
                <div class="col-lg-4">
                  <img src="bikes/Boxer.PNG" class="img-fluid" style=" padding: 50px;" alt="">
                  <h6>Many types</h6>
                </div>
                <div class="col-lg-4">
                  <img src="bikes/Engine.PNG" class="img-fluid" style=" padding: 50px;" alt="">
                  <h6>Spare Parts</h6>
                </div>
                <div class="col-lg-4">
                  <img src="bikes/services.PNG" class="img-fluid" style=" padding: 50px;" alt="">
                  <h6>Services</h6>
                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
      
      <!--Products section begins here-->
      
      <section class="products">
        <div class="container ">
          <div class="row">
            <div class="col-lg-5 m-auto text-center">
              <h1>Our Merchendise</h1>
              <h6 style="color: #B33771;">Never been better</h6>
            </div>
          </div>
         
         <!--carts-->
          <div class="row">
            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Shock.PNG " class="img-fluid" alt="" >
                </div>
 
              </div>
              <h6>Quality Shocks</h6>
              <p>ksh 6990</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Chains.PNG " class="img-fluid" alt="" >
                </div>
              </div>
              <h6> Generic sproket chain</h6>
              <p>ksh 4360</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Absorber.PNG " class="img-fluid" alt="" >
                </div>
 
              </div>
              <h6>Rear D-shock <br> absorber</h6>
              <p>ksh7700</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Engine.PNG " class="img-fluid" alt="" >
                </div>
 
              </div>
              <h6>Steel Alloys Engine</h6>
              <p>ksh25000</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Lock.PNG" class="img-fluid" alt="" >
                </div>
              </div>
              <h6> Security Locks</h6>
              <p>ksh3000</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Transmission belt.PNG " class="img-fluid" alt="" >
                </div>
 
              </div>
              <h6>Isuzu 433D</h6>
              <p>ksh 2500</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Sproket.PNG " class="img-fluid" alt="" >
                </div>
              </div>
              <h6>Generic steel sprockets</h6>
              <p>ksh2290</p>
            </div>

            <div class="col-lg-3 text-center">
              <div class="card">
                <div class="card-board-0 bg-light mb-2">
                  <img src="bikes/Windshield.PNG " class="img-fluid" alt="" >
                </div>
              </div>
              <h6>Generic Windshields</h6>
              <p>ksh2000</p>
            </div>
      <button class="btn1 text-center m-auto"><a href="cart.php" class="link">Click for more Action</a></button>
  


      <!-- ABOUT SECTION BEGINS HERE-->
      <section class="about">
        <div class="container py-5">
          <div class="row py-5">
            <div class="col-lg-8 m-auto text-center">
              <h1>Welcome To TWOVEN Merchants</h1>
              <h6 style="color:#B33771;">Earn,Enjoy,Experience</h6>
            </div>
            <div class="row">
             <div class="col-lg-4">
                <img src="bikes/Bmw.jpg " class="img-fluid mb-3" alt="" >
                <h5 class="fon">Variety Of Motorbikes</h5>
                <p class="fon1">
                   At Twoven we have the varieties that suits you.
                   From Commercial Bodabodas to sport bikes.
                   Your choice is all we attend to as we ensure
                   quality services to customers country wide.
                </p>
              </div>
              <div class="col-lg-4">
                <img src="bikes/Collective.PNG " class="img-fluid mb-3" alt="" >
                <h5 class="fon" >Accessories</h5>
                <p class="fon1">
                   TWOVEN accounts for majority of the spareparts <br>
                   used around Nairobi and the neighbouring cities.<br>
                   We continue to import various spares for various bikes <br>
                   especially for the commercial bodabodas.
                </p>
              </div>
              <div class="col-lg-4">
                <img src="bikes/Mechanicals.PNG " class="img-fluid mb-3" alt="" >
                <h5 class="fon">Mechanics Services</h5>
                <p class="fon1">
                   As TWOVEN, we give services to our customers at very <br>
                   friendly fee. We also connect with various mechanics around cities<br>
                   therefore,customers acquires services even when stuck on highways.
                   We offer additional free services at our main shop beside koja mosque.
                </p>
              </div>

            </div>
            <div class="row">
              <div class="col.lg-6 text-center m-auto">
                <button class="btn1"><a href="cart.php" class="link">SHOP MORE</a></button>
              </div>
            </div>
          </div>
        </div>
        
      </section>

      <!-- ABOUT SECTION ENDS HERE-->

      <!-- CONTACT SECTION BEGINE HERE-->
     <section class="contact">
        <div class="container py-0 text-center ">
          <div class="row py-5">
            <div class="col-lg-5 m-auto"></div>
              <h1>Contact Us</h1>
              <h6 style="color: #B33771;">Always Keep in touch</h6>
            </div>
           </div>
          <div class="row">
            <div class="col-lg-9 m-auto">
              <div class="row">
                <div class="col-lg-4">
                  <h6 >LOCATION</h6>
                  <p style="background: lightcyan;">1724-00100</p>
                
            
                  <h6>PHONE</h6>
                  <P style="background: lightcyan;">0763766224</P>
                
                
                  <h6>EMAIL</h6>
                  <P style="background: lightcyan;">TWOVEN24@gmail.com</P>
              </div>
              <div class="col-lg-7">
                <div class="row">
                  <div class="col-lg-6">
                    <input type="text" class="form-control bg-light" placeholder="First Name">
                  </div>
                  <div class="col-lg-6">
                    <input type="text" class="form-control bg-light" placeholder="lirst Name">

                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 py-3">
                    <textarea name="" class="form-control bg-light" id="" cols="10" rows="5" placeholder="Enter your comments here"></textarea>
                  </div>
                </div>
                <button class="btn1">SUBMIT</button>
              </div>
            </div>
          </div>
        </div>
      </section> 
      <!-- CONTACT SECTION ENDS HERE-->
      <!-- last SECTION BEGINS HERE-->

      <section class="last py-5">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 m-auto">
              <h1>Welcome to our Company</h1>
              <input type="email" name="email" class="place" placeholder="Enter your Email">
             <!-- <?php
               /* if(isset($_POST['submit1'])){
                  $email = $_POST['email'];
                  $sql = "INSERT INTO 'emails' ('email')
                  VALUES('$email')";
              $result = mysqli_query($conn, $sql);
          if($result){
              echo "<script>alert(' email Taken.')</script>";
              $email = "";
          }else{
            echo "<script>alert('try again!')</script>";
          }
        }
              */?>-->
              <button class="btn3" name="submit">Submit</button>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-11">
              <div class="row">
                <div class="col-lg-3 py-3">
                  <h5 class="pb-3"> CUSTOMER CARE</h5>
                  <P>Daily</P>
                  <P>Timely </P>
                  <P>Listening</P>
                  <P>Always Caring</P>
                </div>
                <div class="col-lg-3 py-3">
                  <h5 class="pb-3">FAQS</h5>
                  <P>shopping and Delivery for accesories only</P>
                  <P>Full Charges after service </P>
                  <P></P>
                  <P>Always Caring</P>
                </div>
                <div class="col-lg-3 py-3">
                  <h5 class="pb-3">OUR COMPANY</h5>
                  <P>About</P>
                  <P>New merchandise </P>
                  <P>Products</P>
                </div>
                <div class="col-lg-3 py-3">
                  <h5 class="pb-3">SOCIAL MEDIA</h5>
                  <span><i class="fa fa-facebook" aria-hidden="true"></i></span>
                  <span><i class="fa fa-twitter"></i></span>
                  <span><i class="fa fa-instagram"></i></span>
                  <span><i class="fa fa-google-plus"></i></span>
                </div>

              </div>
            </div>
          </div>
          <hr>
          <p class="text-center">Copyright ©2022 All rights reserved </p>
          
        </div>
      </section>
      <section class="footer">
      <div class="credit-cards" style="text-align: center; width: 100%">
  <img height="40" src="https://shoplineimg.com/assets/footer/card_visa.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_master.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_paypal.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_unionpay.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_linepay.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_tw_711_pay.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_tw_fm_pay.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_taishin.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_amex.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_ecpay.png"/>
  <img height="40" src="https://shoplineimg.com/assets/footer/card_jcb.png"/>
</div>
      </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </body>
</html> 