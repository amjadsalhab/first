<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact us</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">

</head>


<body onload="calculateTotalPrice();">

<div class="container-fluid">
    <div class="row">
        <nav class="navbar custom-navbar navbar-expand-lg" id="nav">
            <div class="container">

                <div class="navbar-header">
                    <a href="." class="navbar-brand"><img src="imgs/logo.png"></a>
                </div>

                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link " href=".">HOME</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navBarDropDown" role="button" data-toggle="dropdown" aria-expanded="false" href="#">CATEGORIES</a>
                        <ul class="dropdown-menu">
                            <li><a href="#" class="dropdown-item">MEN</a></li>
                            <li><a href="#" class="dropdown-item">WOMEN</a></li>
                            <li><a href="#"class="dropdown-item">KIDS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">CONTACT US</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <input class="form-control custom-form-control" type="search" placeholder="search...">
                    <button class="btn custom-btn-primary" type="submit">Search</button>
                </form>
                <div>
                    <a href="checkout.html" id="btn-shopping-card" class="btn custom-btn" title="checkout!" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-shopping-cart"></i></a>
                    <button class="btn custom-btn-primary" type="submit" onclick="document.getElementById('id01').style.display='block'">Login</button>
                </div>
            </div>
        </nav>
    </div>



    <!-- *
    *
    *
    FORM LOGIN
    ****
    -->
    <div id="id01" class="modal">

        <form class="modal-content animate" action="/action_page.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="imgs/login_logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container_login">
                <label for="uname"><b>Username</b></label>
                <input class="input_login" type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input class="input_login" type="password" placeholder="Enter Password" name="psw" required>

                <button class="input_btn" type="submit">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container_login">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="input_btn cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>
        </form>
    </div>
    <!-- *
    *
    *
    END FORM LOGIN
    ****
    -->


    <!-- *
    *
    *
   navi link
    ****
    -->

    <div class="row">
        <div class="col-12" id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8686.187000654038!2d35.125144755116864!3d32.30733005715218!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151d19493062cacf%3A0x878d3ee585d19e42!2z2LnZhtio2KrYpw!5e0!3m2!1sar!2s!4v1573602351888!5m2!1sar!2s" width="100%" height="250" frameborder="0" style="border:0; width:100;" allowfullscreen=""></iframe>
        </div>
    </div>


    <div class="row">
        <div class="col-10 offset-1">
            <ol class="breadcrumb custom-breadcrumb">
                <li><a href=".">Home</a></li>
                <li class="active">Contact us</li>
            </ol>
        </div>
    </div>


    <div id="contact-options" class="row">
        <div class="col-3 offset-2">
            <h4 class="heading-with-border-bottom">Contact Information</h4>
            <div id="contact-info">
                <div>
                    <i class="fa fa-phone fa-lg"></i>
                    00970568171906
                </div>
                <div>
                    <i class="fa fa-envelope fa-lg"></i> suhaib.hamdallah@gmail.com
                </div>
                <div>
                    <i class="fa fa-map-marker fa-lg"></i>
                    Palestine,Went Bank,Tulkarm,Anabta
                </div>
            </div>
        </div>


        <div class="col-6">
            <h4>Leave a message</h4>
            <form class="form row" method="post" action="<?=$_SERVER['PHP_SELF'];?>">
                <div class="col-md-6 form-group">
                    <input class="form-control input-lg custom-input-lg custom-form-control" name="name" type="text" placeholder="Your name" required>
                </div>
                <div class="col-md-6 form-group">
                    <input class="form-control input-lg custom-input-lg custom-form-control" name="email" type="email" placeholder="Your email" required autocomplete="off">
                </div>
                <div class="col-12 form-group">
                    <textarea class="form-control input-lg custom-input-lg custom-form-control" name="message" placeholder="Message..." required></textarea>
                </div>
                <div class="col-12 form-group">
                    <?php

                    if(isset($_POST['email']) && isset($_POST['name']) && isset($_POST['message'])) {
                        $mailto = "suhaib.hamdallah@gmail.com";
                        $mailSub = $_POST['name'] . " " . $_POST['email'];
                        $mailMsg = $_POST['message'];
                        require 'PHPMailer-master/PHPMailerAutoload.php';
                        $mail = new PHPMailer();
                        $mail ->IsSmtp();
                        $mail ->SMTPDebug = 0;
                        $mail ->SMTPAuth = true;
                        $mail ->SMTPSecure = 'ssl';
                        $mail ->Host = "smtp.gmail.com";
                        $mail ->Port = 465; // or 587
                        $mail ->IsHTML(true);
                        $mail ->Username = "suhaibzeyadtawfeq@gmail.com";
                        $mail ->Password = "anabtaisthebest";
                        $mail ->SetFrom("suhaibzeyadtawfeq@gmail.com");
                        $mail ->Subject = $mailSub;
                        $mail ->Body = $mailMsg;
                        $mail ->AddAddress($mailto);

                        if(!$mail->Send())
                        {
                            echo "<h3 style='color : darkred'>Try again please</h3>";
                        }
                        else
                        {
                            echo "<h3 style='color : mediumspringgreen'>Thank You! We will reply soon!</h3>";
                        }
                    }



                    ?>
                    <div class="clearfix">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary custom-btn">
                               <span class="float-left">
                                   Send Message
                               </span>
                                <span class="float-right">
                                   <span class="far fa-paper-plane"></span>
                               </span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div id="footer" class="row">
        <div id="footer-nav">
            <div class="container-fluid text-center">
                <div class="footer-logo">
                    <a href=".">
                        <img src="imgs/logo.png">
                    </a>
                </div>
                <div id="footer-nav-links" class="col-12">
                    <a href=".">Home</a>
                    <a href="contactus.php">CONTACT US</a>
                </div>
                <div id="newsletter" class="col-6 offset-3">
                    <form class="form">
                        <label for="footer-email">
                            Be alert on the latest offers and products
                        </label>
                        <br>
                        <div class="input-group">
                            <input id="footer-email" class="form-control custom-form-control"
                                   type="email" placeholder="you email..." name="email" required>
                            <div class="input-groub-btn">
                                <button type="submit" class="btn btn-primary custom-btn">
                                    Subscribe
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="footer-copyright-social" class="col-12">
            <div class="container">
                <div class="clearfix">
                    <div id="copyright" class="float-left">
                        All rights reserved &copy; 2019
                    </div>
                    <div id="social-icons" class="float-right">
                        <a href="#">
                            <i class="fab fa-facebook-square fa-lg"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-twitter-square fa-lg"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram fa-lg"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-google-plus-square fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>






<!-- contaainer fluied -->



<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<script src="js/product.js"></script>
<script src="js/checkout.js"></script>
<script src="js/jquery-ui.js"></script>


</body>
</html>