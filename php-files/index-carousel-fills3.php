<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT `PRODUCTID`,`productNAME`, `IMG1`, `PRICE`,`discount` FROM `product` join `discount` on discount.product=product.productid LIMIT 4 OFFSET 8";
$result = $conn->query($sql);
if ($result->num_rows > 0  ) {
    while($row = $result->fetch_assoc()) {
        $dis = $row["discount"];
        $namee = $row["productNAME"];
        $price = $row["PRICE"];
        $img = $row["IMG1"];
        $new_price = ($dis * $price)/ 100;
        echo "
        <div class=\"col-3\">
    <div class=\"card custom-thumbnail\">
        <div class=\"sale\"> -$dis %</div>
        <div class=\"overlay\">
            <button class=\"btn custom-btn btn-secondary add-to-cart-btn\">
                Add to carts
                <i class=\"fa fa-cart-plus\"></i>
            </button>
        </div>
        <img src=\"$img\" height=\"200px\">
        <div class=\"card-body\">
            <h4>$namee</h4>
            <div class=\"price\">
                $new_price $
            </div>
            <div class=\"rating\">
                <i class=\"fa fa-star active\"></i>
                <i class=\"fa fa-star active\"></i>
                <i class=\"fa fa-star active\"></i>
                <i class=\"fa fa-star active\"></i>
                <i class=\"fa fa-star\"></i>
            </div>
        </div>
    </div>
</div>
        ";
    }
}
$conn->close();
?>