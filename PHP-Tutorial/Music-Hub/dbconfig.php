<?php
$dbuser = "root";
$dbpass = "";
$dbhost = "localhost";
$db = "skillvertex";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$db);
if(!$conn) {
    echo "Database connection unsuccessful:",mysqli_connect_error();
}
?>
