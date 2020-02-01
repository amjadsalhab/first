

<?php
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
?>