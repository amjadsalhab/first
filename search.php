<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search</title>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="css/search.css">
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
                        <a class="nav-link" href="#">ABOUT US</a>
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
        <div class="container">
            <ol class="breadcrumb custom-breadcrumb">
                <li><a href=".">Home</a></li>
                <li class="active">Search</li>
            </ol>
        </div>
    </div>

    <div class="container">
    <div class="row">
       <!-- <form id="form-advanced-search" class="col-3">

            <div class="col-12">
                <div id="search-by-category" class="card custom-panel">
                    <div class="card-header">Type</div>
                    <div class="list-group custom-list-group">
                        <div class="list-group-item">
                            <input type="checkbox" id="t1" name="type" checked>
                            <label for="t1">TYPE 1</label>
                            <small class="custom-text-muted font-weight-bold">(200)</small>
                        </div>
                        <div class="list-group-item">
                            <input type="checkbox" id="t2" name="type" checked>
                            <label for="t2">TYPE 2</label>
                            <small class="custom-text-muted font-weight-bold">(200)</small>
                        </div>
                        <div class="list-group-item">
                            <input type="checkbox" id="t3" name="type" checked>
                            <label for="t3">TYPE 3</label>
                            <small class="custom-text-muted font-weight-bold">(200)</small>
                        </div>
                        <div class="list-group-item">
                            <input type="checkbox" id="t4" name="type" checked>
                            <label for="t4">TYPE 4</label>
                            <small class="custom-text-muted font-weight-bold">(200)</small>
                        </div>
                        <div class="list-group-item">
                            <input type="checkbox" id="t5" name="type" checked>
                            <label for="t5">TYPE 5</label>
                            <small class="custom-text-muted font-weight-bold">(200)</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card custom-panel">
                    <div class="card-header">Price</div>
                </div>
                <div>
                    Between
                    <span id="price-min">250</span>$
                    And
                    <span id="price-max">800</span>$
                    <br>
                    <div id="price-range"></div>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn-primary custom-btn btn-block btn-lg">Search</button>
            </div>
        </form> -->

        <div id="search-results" class="col-12">
            <h3 class="heading-with-border-bottom">Result</h3>
            <div class="row">
            <!--    <div class="col-12 col-md-4">
                    <div class="card custom-thumbnail">
                        <div class="overlay">
                            <button class="btn custom-btn btn-secondary add-to-cart-btn" data-add-to-cart="">
                                Add to Cart
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>
                        <img src="imgs/Clothes/12.png" height="200px">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="float-left">nameeee</h4>
                                <div class="price float-right">
                                    200$
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="rating float-left">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <button class="float-right btn btn-default custom-btn add-to-cart-btn d-block d-lg-none" data-add-to-cart="">
                                    Add to Cart
                                    <i class="fa fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card custom-thumbnail">
                        <div class="overlay">
                            <button class="btn custom-btn btn-secondary add-to-cart-btn" data-add-to-cart="">
                                Add to Cart
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>
                        <img src="imgs/Clothes/12.png" height="200px">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="float-left">nameeee</h4>
                                <div class="price float-right">
                                    200$
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="rating float-left">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <button class="float-right btn btn-default custom-btn add-to-cart-btn d-block d-lg-none" data-add-to-cart="">
                                    Add to Cart
                                    <i class="fa fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card custom-thumbnail">
                        <div class="overlay">
                            <button class="btn custom-btn btn-secondary add-to-cart-btn" data-add-to-cart="">
                                Add to Cart
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>
                        <img src="imgs/Clothes/12.png" height="200px">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="float-left">nameeee</h4>
                                <div class="price float-right">
                                    200$
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="rating float-left">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <button class="float-right btn btn-default custom-btn add-to-cart-btn d-block d-lg-none" data-add-to-cart="">
                                    Add to Cart
                                    <i class="fa fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card custom-thumbnail">
                        <div class="overlay">
                            <button class="btn custom-btn btn-secondary add-to-cart-btn" data-add-to-cart="">
                                Add to Cart
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>
                        <img src="imgs/Clothes/12.png" height="200px">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="float-left">nameeee</h4>
                                <div class="price float-right">
                                    200$
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="rating float-left">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <button class="float-right btn btn-default custom-btn add-to-cart-btn d-block d-lg-none" data-add-to-cart="">
                                    Add to Cart
                                    <i class="fa fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card custom-thumbnail">
                        <div class="overlay">
                            <button class="btn custom-btn btn-secondary add-to-cart-btn" data-add-to-cart="">
                                Add to Cart
                                <i class="fa fa-cart-plus"></i>
                            </button>
                        </div>
                        <img src="imgs/Clothes/12.png" height="200px">
                        <div class="card-body">
                            <div class="clearfix">
                                <h4 class="float-left">nameeee</h4>
                                <div class="price float-right">
                                    200$
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="rating float-left">
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star active"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <button class="float-right btn btn-default custom-btn add-to-cart-btn d-block d-lg-none" data-add-to-cart="">
                                    Add to Cart
                                    <i class="fa fa-cart-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div> -->

                <?php
                if(isset($_POST['qSearch'])) {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "trst2";
                    $qSearch = $_POST['qSearch'];
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT img, discount, name1, price FROM product_in_sale WHERE name1 LIKE '%$qSearch%' ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0  ) {
                        while($row = $result->fetch_assoc()) {
                            $dis = $row["discount"];
                            $namee = $row["name1"];
                            $price = $row["price"];
                            $img = $row["img"];
                            echo "
       <div class=\"col-12 col-md-4\">
    <div class=\"card custom-thumbnail\">
        <div class=\"overlay\">
            <button class=\"btn custom-btn btn-secondary add-to-cart-btn\" data-add-to-cart=\"\">
                Add to Cart
                <i class=\"fa fa-cart-plus\"></i>
            </button>
        </div>
        <img src=\"$img\" height=\"200px\">
        <div class=\"card-body\">
            <div class=\"clearfix\">
                <h4 class=\"float-left\">$namee</h4>
                <div class=\"price float-right\">
                    $price$
                </div>
            </div>
            <div class=\"clearfix\">
                <div class=\"rating float-left\">
                    <i class=\"fa fa-star active\"></i>
                    <i class=\"fa fa-star active\"></i>
                    <i class=\"fa fa-star active\"></i>
                    <i class=\"fa fa-star\"></i>
                    <i class=\"fa fa-star\"></i>
                </div>
                <button class=\"float-right btn btn-default custom-btn add-to-cart-btn d-block d-lg-none\" data-add-to-cart=\"\">
                    Add to Cart
                    <i class=\"fa fa-cart-plus\"></i>
                </button>
            </div>
        </div>
    </div>
</div>
        ";
                        }
                    }
                    $conn->close();
                }


                ?>
            </div>

            <div class="col-lg-12 offset-lg-4">
                <nav id="search-pagination">
                    <ul class="pagination custom-pagination">
                        <li><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </nav>
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

<!-- contaainer fluied -->



<script src="js/jquery-slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/index.js"></script>
<script src="js/product.js"></script>
<script src="js/checkout.js"></script>
<script src="js/jquery-ui.js"></script>

<script>

    $(document).ready(function() {
        $('#price-range').slider({
            range: true,
            min: 50,
            max: 1000,
            step: 50,
            values: [250, 800],
            slide: function(event, ui) {

                $('#price-min').text(ui.values[0]);
                $('#price-max').text(ui.values[1]);
            }
        });
    });


</script>
</body>
</html>