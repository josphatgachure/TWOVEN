<?php
$server = "localhost";
$user = "root";
$password= "";
$database = "shop";

$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn){
    die("<script>alert('connection failed bro!')</script>");
}
?>