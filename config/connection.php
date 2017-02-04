<?php
// used to connect to the database
$host = "localhost";
$db_name = "QThrive";
$username = "root";
$password = "";
try {
    $con = new mysqli($host,$username,$password,$db_name);
}

// show error
catch(Exception $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
