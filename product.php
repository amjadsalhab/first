<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milano Store</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/all.min.css">
</head>


<body>
<?php



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
                        <a class="nav-link " href="#">HOME</a>
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
                <form class="form-inline" method="get" action="search.php" >
                    <input name="search" class="form-control custom-form-control" type="text" placeholder="search...">
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

        <div class="col-12 border-between ">
            <div class="row">

                <?php

                use http\Header;

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "webproject";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $productid=$_GET["id"];

                $sql = "SELECT `productid`,`productNAME`, `IMG1`,`IMG2`,`DESCRIPTION`,`category`, `PRICE` FROM `product` WHERE PRODUCTID = $productid";
                $result = $conn->query($sql);
                if ($result = $conn->query($sql)) {
                    $row = $result->fetch_assoc();
                    $productid=$row["productid"];
                    $description=$row["DESCRIPTION"];
                    $img2=$row["IMG2"];
                    $category = $row["category"];
                    $namee = $row["productNAME"];
                    $price = $row["PRICE"];
                    $img1 = $row["IMG1"];
                    echo "
                    <div class=\"col-5 offset-1\">
                        <div class=\"carousel slide\" id=\"carousel-product-images\" data-ride=\"carousel\">
                            <div class=\"carousel-inner\">
                                <div class=\"carousel-item active\">
                                    <img src=\"$img1\"  class=\"immmg\">
                                </div>
                                <div class=\"carousel-item\">
                                    <img src=\"$img2\" class=\"immmg\">
                                </div>
                            </div>
                            <div class=\"carousel-indicators custom-carousel-indicators-primary\">
                                <img data-target=\"#carousel-product-images\" data-slide-to=\"0\" class=\"active\" src=\"$img1\">
                                <img data-target=\"#carousel-product-images\" data-slide-to=\"1\" src=\"$img2\" >
                            </div>
                        </div>
                    </div>
                    <div class=\"col-5\">
                         
                                  <div class=\"row\">
                                              <div class=\"product-category block-100\">
                                                    $category.'s section
                                               </div>
                                                     <div class=\"clearfix block-100\">
                                                      <h2 class=\"float-left\">$namee</h2>
                                                   <div class=\"float-right price large \">$price$</div>
                                                   </br>
                                                   <div class=\"float - right price large \">$description</div>
                                                </div>
                                  </div>";
                }
                ?>
                <hr>
                <div class="row" >
                    <form method="get" action="addToCart.php" style="width: 100%;" id="form-product-selection" class="border-between">
                        <input type="number" value="<?php echo $productid ?>" style="display: none" name="id">
                        <div class="form-row">
                            <div class="form-group col-4">
                                Size:
                                <br>
                                <div class="product-option">
                                    <label>
                                        XL
                                        <input type="radio" name="size" value="xl">

                                    </label>
                                </div>
                                <div class="product-option">
                                    <label>
                                        L
                                        <input type="radio" name="size" value="l">
                                    </label>
                                </div>
                                <div class="product-option">
                                    <label>
                                        M
                                        <input type="radio" name="size" value="m">
                                    </label>
                                </div>
                                <div class="product-option">
                                    <label>
                                        S
                                        <input type="radio" name="size" value="sm" >
                                    </label>
                                    <?php //echo $sizeErr ?>
                                </div>
                            </div>

                            <div class="form-group col-2"></div>

                            <div class="form-group col-4">
                                Color:
                                <br>
                                <div class="product-option color-option active " style="background-color: black;">
                                    <label> &nbsp;

                                        <input type="radio" name="color" value="Black"   checked>
                                    </label>
                                </div>
                                <div class="product-option color-option" style="background-color: dodgerblue;">
                                    <label>&nbsp;

                                        <input type="radio" name="color"  value="Blue">
                                    </label>
                                </div>
                                <div class="product-option color-option" style="background-color: white;">
                                    <label>&nbsp;

                                        <input type="radio" name="color" value="White" >
                                    </label>
                                </div>
                                <div class="product-option color-option" style="background-color: saddlebrown;">
                                    <label>&nbsp;

                                        <input type="radio" name="color" value="Brown" >


                                    </label>
                                    <?php //echo$colorErr ?>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="form-row">
                            Quantity
                            </br>
                            <select class="form-control custom-form-control" name="quantity">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                        </div>

                        <div class="form-row">
                            <button type="submit" name="cartbtn" value="yes" class="btn btn-primary btn-lg custom-btn custom-btn-primary">
                            <span class="clearfix">
                                        <span class="float-left">
                                            Add to cart
                                        </span>
                                        <span class="float-right">
                                            <i class="fa fa-cart-plus fa-lg"></i>
                                        </span></span>

                            </button>
                        </div>
                    </form>
                </div> <!-- end off form div-->

            </div>



        </div>
    </div>

    <div class="row description\">
        <div class="col-12">
            <h3 class="custom-heading heading-with-border-bottom heading-inline">About this item</h3>
            <p> $description</p>
            <!--  <ul>
                <li>bla lba lba lblsaa bla </li>
                 <li>bla lba lba lblsaa bla </li>
                 <li>bla lba lba lblsaa bla </li>
             </ul> -->
        </div>
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
<?php
//echo $_REQUEST["id"];
$string="location : product.php";
//header($string);

$color = $size = $quantity = "";
$sizeErr = $colorErr = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_REQUEST["cartbtn"])){
        $servername = "localhost";
        $id=$_GET["id"];
        $username = "root";
        $password = "";
        $dbname = "webproject";

        $size=$_GET["size"];
        $color=$_GET["color"];
        $quantity=$_GET["quantity"];
        $userid=35;
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO cart (productid, userid , size,color,quantity)
             VALUES ($id, $userid,'$size','$color','$quantity')";
        $result = $conn->query($sql);
        $sql="";
        header("Location: product.php?id=$id");;

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

<!-- contaainer fluied -->



<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<script src="js/product.js"></script>



</body>
</html>