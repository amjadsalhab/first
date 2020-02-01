<?php
//echo $_REQUEST["id"];
$string="location : product.php";
//header($string);
session_start();
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
        $username1=$_SESSION["User"];
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql="select * from usertable where username='$username1'";
        $result=$conn->query($sql);
        if($row=$result->fetch_assoc()){
            $userid=$row['ID'];
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