
<!DOCTYPE html>
<html lang="en">
<head>
    <title>payment</title>
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
    <link rel="stylesheet" href="css/payment.css">
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


    <div class="container">
        <div class="row">
            <ol class="breadcrumb custom-breadcrumb">
                <li>
                    <a href=".">Home</a>
                </li>
                <li>
                    <a href="checkout.html">Checkout</a>
                </li>
                <li class="active">Payment</li>
            </ol>

            <form method="get" action="finish.php">
                <div class="row">
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "webproject";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }


                    $sql = "SELECT `city`,`street`, `village`,`username`,`email`,`phone` FROM `address` inner join `usertable` on address.id=usertable.address WHERE address.id = 34";
                    $result = $conn->query($sql);
                    if ($result = $conn->query($sql)) {
                        $row = $result->fetch_assoc();
                        $city=$row["city"];
                        $street=$row["street"];
                        $village=$row["village"];
                        $namee = $row["username"];
                        $email = $row["email"];
                        $phone = $row["phone"];

                        echo "<div class=\"col-12 col-lg-6\">
                        <h3>Personal information</h3>
                        <div class=\"row\">
                            <div class=\"col-md-6 form-group\">
                                  <span> Name </span</br>
                                <input type=\"text\" class=\"form-control custom-form-control input-lg custom-input-lg\"
                                       placeholder=\"Name\" name=\"first_name\" value='$namee' required disabled>
                            </div>

                            <div class=\"col-md-6 form-group\">
                             <span> email </span</br>
                                <input type=\"email\" class=\"form-control custom-form-control input-lg custom-input-lg\"
                                       placeholder=\"Email\" name=\"email\" value='$email' required disabled>
                            </div>
                           
                            <div class=\"col-md-6 form-group\">
                             <span> city</span</br>
                                <input type=\"text\" class=\"form-control custom-form-control input-lg custom-input-lg\"
                                       placeholder=\"city\" name=\"city\" value='$city' required disabled>
                            </div>
                            <div class=\"col-md-6 form-group\">
                             <span> town </span</br>
                                <input type=\"text\" class=\"form-control custom-form-control input-lg custom-input-lg\"
                                       placeholder=\"Town\" name=\"town\" value='$village' required disabled>
                            </div>
                            <div class=\"col-md-6 form-group\">
                             <span> phone </span</br>
                                <input type=\"tel\" class=\"form-control custom-form-control input-lg custom-input-lg\"
                                       placeholder=\"Phone\" name=\"tel\" value='$phone' required disabled>
                            </div>
                            <div class=\"col-md-6 form-group\">
                             <span> street </span</br>
                                <input type=\"text\" class=\"form-control custom-form-control input-lg custom-input-lg\"
                                       placeholder=\"street\" name=\"address1\" value='$street' required disabled>
                            </div>

                        </div>
                    </div>";
                    }
                    ?>

                    <div class="col-12 col-lg-6">
                        <h3>Payment information</h3>

                        <div class="row" id="credit-card-info">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control custom-form-control input-lg custom-input-lg"
                                       placeholder="card number" name="credit_card_number" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control custom-form-control input-lg custom-input-lg"
                                       placeholder="Expiration month" name="credit_card_month"
                                       min="1" max="12" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control custom-form-control input-lg custom-input-lg"
                                       placeholder="Expiration year" name="credit_card_year"
                                       min="2018" max="2030" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="number" class="form-control custom-form-control input-lg custom-input-lg"
                                       placeholder="CVV" name="credit_card_cvv"
                                       required>
                            </div>
                        </div>

                    </div>
                </div>
                <button name="submitbtn" type="submit" class="btn custom-btn btn-primary custom-btn-primary btn-lg" style="background-color: #2980b9; color: white;"> finsih now </button>
            </form>
            <hr>
            <div class="row">
                <h3>Your order</h3>
                <form id="form-checkout">
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
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "webproject";

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }


                        $sql = "SELECT `productNAME`, `IMG1`, `PRICE`,cart.quantity,cart.productid FROM `product` inner join `cart` on product.productid=cart.productid";
                        $result = $conn->query($sql);
                        $totlacartprice=0;
                        if ($result = $conn->query($sql)) {
                            while($row = $result->fetch_assoc()) {

                                $quantity = $row["quantity"];
                                $namee = $row["productNAME"];
                                $price = $row["PRICE"];
                                $img1 = $row["IMG1"];
                                $totalprice = $quantity * $price;
                                $totlacartprice+=$totalprice;
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
                            <span id="total-price-for-all-priducts">
                                 <?php echo $totlacartprice ?>
                        </span>
                        </td>
                        </tfoot>
                    </table>
                    <button type="submit" class="btn custom-btn btn-primary custom-btn-primary btn-lg" style="background-color: #2980b9; color: white;">
                              <span class="clearfix">
                                 <span class="float-left">
                                         Finish now
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
<?php

$string="location : product.php";
header($string);

$color = $size = $quantity = "";
$sizeErr = $colorErr = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_REQUEST["submitbtn"])){
        $servername = "localhost";
        $id=$_GET["id"];
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $size=$_GET["size"];
        $color=$_GET["color"];
        $quantity=$_GET["quantity"];
        $userid=545;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO cart (productid, userid , size,color,quantity)
             VALUES ($id, 545,'$size','$color','$quantity')";
        $result = $conn->query($sql);
        $sql="";

        // $stmt = $conn->prepare("INSERT INTO cart (productid, userid, color,quantity) VALUES (?, ?,  ?, ?)");
        // $stmt->bind_param($id, $userid,  $color,$quantity);
        // echo $userid,$id,$color,$quantity;
        //$stmt->close();
        //$conn->close();



    }
}


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<script src="js/product.js"></script>
<script src="js/checkout.js"></script>
<script src="js/payment.js"></script>


</body>
</html>