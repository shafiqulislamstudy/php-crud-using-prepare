<?php
$localhost = "localhost";
$username = "root";
$password ="";
$db = "preparecrud";

$conn = new mysqli($localhost,$username,$password,$db);

if($conn->connect_error){
    die("Connection Failed".$conn->connect_error);
}