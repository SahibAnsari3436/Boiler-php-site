<?php 

$host = "localhost";
$username = "root";
$password = "";
$database = "energyequipco_db";




// connection
$con = mysqli_connect($host, $username, $password, $database);

// check connection
if (!$con) {
    header("Location: ../errors/db.php");
    exit();
}

?>