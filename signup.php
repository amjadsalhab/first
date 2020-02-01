<!DOCTYPE html>
<html>
<head>
    <?php
    session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Millano Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/signup.css">

</head>
<body>

<?php
if(isset($_SESSION['User'])) {
    header("location: index.php");
}

?>

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

                            <li><a href="category.php?category='men'" class="dropdown-item">MEN</a></li>
                            <li><a href="category.php?category='women'" class="dropdown-item">WOMEN</a></li>
                            <li><a href="category.php?category='kids'"class="dropdown-item">KIDS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.php">CONTACT US</a>
                    </li>
                </ul>
                <form class="form-inline" method="post" action="search.php">
                    <input class="form-control custom-form-control" name="qSearch" type="search" placeholder="search...">
                    <button class="btn custom-btn-primary" type="submit">Search</button>
                </form>
                <div>
                    <a href="checkout.html" id="btn-shopping-card" class="btn custom-btn" title="checkout!" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-shopping-cart"></i></a>
                    <?php
                    if(isset($_SESSION['User'])) {
                        echo "<button class=\"btn custom-btn-primary\" type=\"submit\" \"><a href='destroy.php' id='ddd'>Logout</a></button>";
                    }
                    else {
                        echo "<button class=\"btn custom-btn-primary\" type=\"submit\" onclick=\"document.getElementById('id01').style.display='block'\">Login</button>";
                    }
                    ?>
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

        <form class="modal-content animate" action="process.php" method="post">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="imgs/login_logo.png" alt="Avatar" class="avatar">
            </div>

            <div class="container_login">
                <label for="uname"><b>Username</b></label>
                <input class="input_login" type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input class="input_login" type="password" placeholder="Enter Password" name="psw" required>

                <button class="input_btn" name="Login" type="submit">Login</button>
                <label>
                    <span class="psw"><a href="#">don't have account?</a></span>
                    <label style="color: #990000">
                        <?php
                        if(@$_GET['Empty']==true)
                        {
                            echo $_GET['Empty'];
                        }
                        ?>
                    </label>
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


    <form action="php-files/signup1.php" method="post">
        <h2 style="margin-left: 25%">Register Form</h2>
        <div class="input-container777">
            <i class="fa fa-user icon777"></i>
            <input class="input-field777" type="text" placeholder="Username" name="usrnm" required>
        </div>

        <div class="input-container777">
            <i class="fa fa-envelope icon777"></i>
            <input class="input-field777" type="text" placeholder="Email" name="email" required>
        </div>

        <div class="input-container777">
            <i class="fa fa-key icon777"></i>
            <input class="input-field777" type="password" placeholder="Password" name="psw" required>
        </div>
        <div class="input-container777">
            <i class="fas fa-phone-square icon777"></i>
            <input class="input-field777" type="text" placeholder="Phone number" name="phone" required>
        </div>

        <div class="input-container777">
            <i class="fas fa-map-marker-alt icon777"></i>
            <input class="input-field777" type="text" placeholder="City" name="city" required>
        </div>
        <div class="input-container777">
            <i class="fas fa-map-marker-alt icon777"></i>
            <input class="input-field777" type="text" placeholder="Village" name="village" required>
        </div>
        <div class="input-container777">
            <i class="fas fa-map-marker-alt icon777"></i>
            <input class="input-field777" type="text" placeholder="Street" name="street" required>
        </div>

        <button type="submit" class="btn777">Register</button>
    </form>









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

<script src="js/popper.min.js"></script>
<script src="js/index.js"></script>
<script src="js/product.js"></script>
<script src="js/checkout.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>

</body>
</html>
