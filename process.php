<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['Login'])) {
    if(empty($_POST['uname']) || empty($_POST['psw'])) {
        header("location:index.php?Empty=Please fill in the blanks");
    }
    else {
        $ppp = $_POST['psw'];

$query = "SELECT * FROM usertable WHERE USERNAME ='".$_POST['uname']."' AND PASSWORD = SHA1('$ppp')";
$result = $conn->query($query);
if($row= $result->fetch_assoc()) {
    $_SESSION['User'] = $_POST['uname'];
    $_SESSION['id']=$row['ID'];
    echo $row['ID'];
    if($row['type'] == 2) {
        header("location: admin/panel/inidex.php");
    }
    else {
        header("location: index.php");
    }

}
else {
    header("location: index.php?Empty= Please Enter Correct User Name and password");
}

    }
}


$conn->close();
?>
