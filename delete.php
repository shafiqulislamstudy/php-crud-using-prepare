<?php
include 'connection.php';

$deleteId = $_GET['del'];

$sql = "DELETE FROM `crud` WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i",$deleteId);

if($stmt->execute()){
    echo"<script>alert('deleted successfully');</script>";

    echo"<script>window.open('index.php','_self');</script>";
}