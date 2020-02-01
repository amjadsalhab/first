<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);
$sure=$_SESSION['id'];
echo $sure;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `cart` inner  join `usertable` on cart.userid=usertable.id  where userid='$sure'";
$result = $conn->query($sql);
if ($result->num_rows > 0  ) {
    while($row = $result->fetch_assoc()) {
        $id=$row["PRODUCTID"];
         $address=$row["ADDRESS"];

        $quantity=$row["quantity"];
        $amjad1="select * from `PRODUCT` where productid='$id' ";
        $result1=$conn->query($amjad1);
        $priceresult=$result1->fetch_assoc();
        $price = $priceresult["PRICE"];
        $totalprice=$price*$quantity;

        $amjad="INSERT INTO ordertable ( `PRODUCT`, `USERID`, `ADDRESS`, `QUANTITY`, `PRICE`) VALUES ( '$id', '35', '$address', '$quantity', '$totalprice'); ";
        $finaladd=$conn->query($amjad);
        echo "done";
        // echo "<img src='$img'>";
        ;
    }
}
$sql="delete from cart where userid='35'";
$result1=$conn->query($sql);
header("Location: index.php");
$conn->close();
?>