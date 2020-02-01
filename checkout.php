<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
    ?>
    <title>Checkout</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
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
                            <li><a href="category.php?category='men'" class="dropdown-item">MEN</a></li>
                            <li><a href="category.php?category='women'" class="dropdown-item">WOMEN</a></li>
                            <li><a href="category.php?category='kids'"class="dropdown-item">KIDS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">ABOUT US</a>
                    </li>
                </ul>
                <form class="form-inline">
                    <input class="form-control custom-form-control" type="search" placeholder="search...">
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
        <div class="col-10 offset-1">
            <ol class="breadcrumb custom-breadcrumb">
                <li>
                    <a href=".">Home</a>
                </li>
                <li class="active">Checkout</li>
            </ol>
            <div class="row">
                <h1 class="custom-heading">Checkout</h1>
                <form id="form-checkout" method="get" action="payment.php">
                    <table class="custom-table">
                        <thead>
                        <tr>
                            <th>Item</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sure=$_SESSION['id'];
                        echo $sure;
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "webproject";

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }


                        $sql = "SELECT `productNAME`, `IMG1`, `PRICE`,cart.quantity,cart.productid FROM `product` inner join `cart` on product.productid=cart.productid where cart.userid='$sure' ";
                        $result = $conn->query($sql);
                        $totlacartprice=0;
                        if ($result = $conn->query($sql)) {
                            while($row = $result->fetch_assoc()) {
                                ///////////////////////////////////
                                $quantity = $row["quantity"];
                                $namee = $row["productNAME"];
                                $price = $row["PRICE"];
                                $img1 = $row["IMG1"];
                                ////////////////////////////////
                                $totalprice = $quantity * $price;
                                $totlacartprice+=$totalprice;

                                ////////////////////////////////
                                echo " <tr data-product-info data-product-price=\"40\">
                            <td>
                                <div class=\"media custom-media\">
                                    <div class=\"media-left\">
                                        <img src=$img1 class=\"media-object\">
                                    </div>
                                    <div class=\"media-body\">
                                        <h4>
                                            <div class=\"custom-text-muted\">
                                                 $namee
                                            </div>
                                        </h4>
                                    </div>
                                </div>
                            </td>
                            <td>
                                $price
                            </td>
                            <td>
                                $quantity
                            </td>
                            <td class=\"total-price-for-product\">
                                $totalprice
                            </td>
                            <td>
                                <button class=\"btn custom-btn btn-danger\" data-remove-from-cart>
                                    <span>Delete</span>
                                </button>
                            </td>
                        </tr>";
                            }
                        }
                        ?>

                        </tbody>

                        <tfoot>
                        <td colspan="5">
                       <span class="custom-text-muted" style="margin-left: 15px;">
                           Total price for all item :
                       </span>
                            <span ">
                                    <?php echo $totlacartprice ?>
                        </span>
                        </td>
                        </tfoot>
                    </table>
                    <button type="submit" class="btn custom-btn btn-primary custom-btn-primary btn-lg" style="background-color: #2980b9; color: white;">
<span class="clearfix">
    <span class="float-left">
        Pay now
    </span>
    <span class="float-right">
        <i class="fa fa-shopping-cart fa-lg"></i>
    </span>
</span>

                    </button>
                </form>
            </div>
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
                    <a href="#">About us</a>
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


</body>
</html>
