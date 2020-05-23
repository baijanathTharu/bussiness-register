<?php 
$servername = "localhost";
$username = "root";
$password = "";
$database = "projects";

$conn = mysqli_connect($servername, $username, $password);
if(!$conn) {
    die("Error: ").mysqli_error($conn);
}
?>