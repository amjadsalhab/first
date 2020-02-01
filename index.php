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


</head>
<body>

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
                    <a href="checkout.php" id="btn-shopping-card" class="btn custom-btn" title="checkout!" data-toggle="tooltip" data-placement="bottom"><i class="fas fa-shopping-cart"></i></a>
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
                <span class="psw"><a href="signup.php">Don't Have account?</a></span>
            </div>
        </form>
    </div>
    <!-- *
    *
    *
    END FORM LOGIN
    ****
    -->

    <!-- two blocks -->
    <div class="row">
        <div class="container whyus">
            <h1>WHY MILLANO?</h1>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="container11">
                        <img src="imgs/fastshipping.png" alt="Avatar" class="image11">
                        <div class="overlay11">
                            <div class="text11">Fast Shipping!</div>
                        </div>
                    </div>
                </div>
                <div class="col-3"><div class="container11">
                        <img src="imgs/original-product-png-5.png" alt="Avatar" class="image11">
                        <div class="overlay11">
                            <div class="text11">Original product!</div>
                        </div>
                    </div></div>
                <div class="col-3"><div class="container11">
                        <img src="imgs/package_return-512.png" alt="Avatar" class="image11">
                        <div class="overlay11">
                            <div class="text11">Return the goods within two weeks</div>
                        </div>
                    </div></div>
                <div class="col-3"><div class="container11">
                        <img src="imgs/rate.png" alt="Avatar" class="image11">
                        <div class="overlay11">
                            <div class="text11">High rate site!</div>
                        </div>
                    </div></div>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="hero-image col-6 ">
                <div class="hero-text">
                    <h1 style="font-size:50px">Let's explore together the fun of shopping!</h1>
                    <p>Lots of discounts on hold!</p>
                    <button  onclick="location.href='#discount1';" >Let's go!</button>
                </div>
            </div>
            <div class="sidde col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="imgs/nike.jpg" class="d-block" style="height: 340px; left:0;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/nike.jpg" class="d-block " style="height: 340px; float: left;" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/nike.jpg" class="d-block" style="height: 340px; float: left;" alt="...">
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

            </div>
        </div>
    </div>
    <!-- two blocks -->

    <!-- Best selling products-->
    <hr style="height: 5px; color: #9fcdff">

    <div id="discount1" class="row" style="margin-top: 40px;">
        <div class="container">
            <h3 class="text-center custom-heading text-danger">
                Product in sale!
            </h3>


            <div id="carousel-most-sold" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <?php
                           include 'php-files/index-carousel-fills1.php';
                            ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?php
                            include 'php-files/index-carousel-fills2.php';
                            ?>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <?php
                            include 'php-files/index-carousel-fills3.php';
                            ?>
                        </div>
                    </div>
                </div>
                <ol class="carousel-indicators custom-carousel-indicators">
                    <li data-target="#carousel-most-sold" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-most-sold" data-slide-to="1"></li>
                    <li data-target="#carousel-most-sold" data-slide-to="2"></li>
                </ol>
            </div>

        </div>
    </div>

    <hr style="height: 5px; color: #9fcdff">


    <div class="container counter33 ">
        <div class="row text-center">
            <div class="col-md-3 text-center align-items-center  cccc ">
                <div class="icon-box"><i class="far fa-laugh-beam"></i></div>
                <h3 style="color: black; font-weight: bold;"><span class="counter">9875+</span></h3>
                <h3 style="color: black; font-weight: bold;">Happy customers</h3>
            </div>
            <div class="col-md-3 text-center align-items-center  cccc ">
                <div class="icon-box"><i class="fas fa-warehouse"></i></div>
                <h3  style="color: black; font-weight: bold;"><span class="counter">11</span></h3>
                <h3 style="color: black; font-weight: bold;">Branches</h3>
            </div>
            <div class="col-md-3 text-center align-items-center  cccc ">
                <div class="icon-box"><i class="fas fa-handshake"></i></i></div>
                <h3  style="color: black; font-weight: bold;"><span class="counter">121</span></h3>
                <h3 style="color: black; font-weight: bold;">Partner</h3>
            </div>
            <div class="col-md-3 text-center align-items-center  cccc ">
                <div class="icon-box"><i class="far fa-laugh-beam"></i></div>
                <h3  style="color: black; font-weight: bold;"><span class="counter">3000+</span></h3>
                <h3 style="color: black; font-weight: bold;">Daily sales</h3>
            </div>
        </div>
    </div>

    <hr>

    <!-- Category -->
    <div id="row-category">
        <div class="container">
            <h3>Category</h3>
            <div class="row">
                <div class="col-6 cat-product">
                    <div class="card custom-panel">
                        <div class="card-block">
                            <div id="carousel-cat-wen" class="carousel slide" data-slide="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    include 'php-files/mens-section.php';
                                    ?>
                                    <?php
                                    include 'php-files/mens-section2.php';
                                    ?>
                                    <?php
                                    include 'php-files/mens-section3.php';
                                    ?>
                                </div>
                                <div class="cat-icon">
                                    <div class="clearfix">
                                        <div class="float-left"></div>
                                        <div class="float-right">
                                            <button class="btn" data-target="#carousel-cat-wen" data-slide="prev">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button class="btn" data-target="#carousel-cat-wen" data-slide="next">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 cat-product">
                    <div class="card custom-panel">
                        <div class="card-block">
                            <div id="carousel-cat-wen2" class="carousel slide" data-slide="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/5.png" class="immmg">
                                                <a href="male.php" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h1>Women's Section</h1>
                                                    </div>

                                                </div>
                                                <div class="custom-text-muted">
                                                    A wonderful collection of women's fashion clothes

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/6.png" class="immmg">
                                                <a href="women.php" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h4>Women's Section</h4>
                                                    </div>

                                                </div>
                                                <div class="custom-text-muted">
                                                    A wonderful collection of women's fashion clothes
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/7.png" class="immmg" style="height: 340px;">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h4>Women's Section</h4>
                                                    </div>
                                                    <div class="float-right price">
                                                        <h4></h4>
                                                    </div>
                                                </div>
                                                <div class="custom-text-muted">
                                                    Show more now!
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cat-icon">
                                    <div class="clearfix">
                                        <div class="float-left"></div>
                                        <div class="float-right">
                                            <button class="btn" data-target="#carousel-cat-wen2" data-slide="prev">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button class="btn" data-target="#carousel-cat-wen2" data-slide="next">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 cat-product">
                    <div class="card custom-panel">
                        <div class="card-block">
                            <div id="carousel-cat-wen3" class="carousel slide" data-slide="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/8.png" class="immmg">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h1>Kid's Section</h1>
                                                    </div>

                                                </div>
                                                <div class="custom-text-muted">
                                                    Great selection for children
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/9.png" class="immmg" style="height: 340px;">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h4>Kid's Section</h4>
                                                    </div>

                                                </div>
                                                <div class="custom-text-muted">
                                                    Great selection for children
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/9.png" class="immmg" style="height: 340px;">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h4>Kid's Section</h4>
                                                    </div>
                                                    <div class="float-right price">
                                                        <h4></h4>
                                                    </div>
                                                </div>
                                                <div class="custom-text-muted">
                                                    Show more now!
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cat-icon">
                                    <div class="clearfix">
                                        <div class="float-left"></div>
                                        <div class="float-right">
                                            <button class="btn" data-target="#carousel-cat-wen3" data-slide="next">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button class="btn" data-target="#carousel-cat-wen3" data-slide="prev">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 cat-product">
                    <div class="card custom-panel">
                        <div class="card-block">
                            <div id="carousel-cat-wen1" class="carousel slide" data-slide="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/10.png" class="immmg">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h1>For you</h1>
                                                    </div>

                                                </div>
                                                <div class="custom-text-muted">
                                                    Beautiful choices suit you
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/11.png" class="immmg">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h4>For you</h4>
                                                    </div>

                                                </div>
                                                <div class="custom-text-muted">
                                                    Beautiful choices suit you
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-5">
                                                <img src="imgs/Clothes/12.png" class="immmg">
                                                <a href="#" class="btn btn-primary custom-btn custom-btn-primary btn-block">Shop now!</a>
                                            </div>
                                            <div class="col-7 cat-men-details">
                                                <div class="clearfix">
                                                    <div class="float-left">
                                                        <h4>For You</h4>
                                                    </div>
                                                    <div class="float-right price">
                                                        <h4></h4>
                                                    </div>
                                                </div>
                                                <div class="custom-text-muted">
                                                    Show more now!
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cat-icon">
                                    <div class="clearfix">
                                        <div class="float-left"></div>
                                        <div class="float-right">
                                            <button class="btn" data-target="#carousel-cat-wen1" data-slide="next">
                                                <i class="fa fa-chevron-left"></i>
                                            </button>
                                            <button class="btn" data-target="#carousel-cat-wen1" data-slide="prev">
                                                <i class="fa fa-chevron-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- footeeeer -->

    <hr>

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