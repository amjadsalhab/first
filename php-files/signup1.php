

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$username1 = $_POST['usrnm'];
$email = $_POST['email'];
$pass = $_POST['psw'];
$phone = $_POST['phone'];
$city = $_POST['city'];
$village = $_POST['village'];
$street = $_POST['street'];
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO address (ID, CITY, VILLAGE, STREET) VALUES (NULL, '$city', '$village', '$street');";
$conn->query($sql);

$sql = "SELECT * FROM address ORDER BY id DESC LIMIT 1;";
$result = $conn->query($sql);
$data = mysqli_fetch_assoc($result);
$nums = $data['ID'];

$sql = "INSERT INTO `usertable` (`ID`, `USERNAME`, `EMAIL`, `PHONE`, `ADDRESS`, `type`, `PASSWORD`) VALUES (NULL, '$username1', '$email', '$phone', '$nums', '1', SHA1('$pass'));";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
header("location: ../index.php");

?>
