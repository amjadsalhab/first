<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webproject";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT IMG1 FROM product WHERE category ='men' LIMIT 1 OFFSET 1";
$result = $conn->query($sql);
if ($result->num_rows > 0  ) {
    while($row = $result->fetch_assoc()) {

        $img = $row["IMG1"];

        echo "
      <div class=\"carousel-item \">
                                        <div class=\"row\">
                                            <div class=\"col-5\">
                                                <img src=\"$img\" class=\"immmg\">
                                                <a href=\"#\" class=\"btn btn-primary custom-btn custom-btn-primary btn-block\">Shop now!</a>
                                            </div>
                                            <div class=\"col-7 cat-men-details\">
                                                <div class=\"clearfix\">
                                                    <div class=\"float-left\">
                                                        <h1>Men's Section</h1>
                                                    </div>

                                                </div>
                                                <div class=\"custom-text-muted\">
                                                    An awesome selection of men's clothing is here
                                                </div>


                                            </div>
                                        </div>
                                    </div>
        ";
    }
}
$conn->close();
?>
