<?php 
session_start();
require_once('../connect/db_connect.php');
require_once('../lib/paging.php');
$db=new DB_Connect();
$conn=$db->connect();
$userid= $_SESSION['userid'];

$result = $conn->query("select * from user where id=$userid");
$row = mysqli_fetch_array($result);
$update = $row['tiennap']+$_GET['amount'];
$result_update = mysqli_query($conn,"UPDATE user SET tiennap=$update WHERE id='$userid'");
$username = $row['hoten'];
$result_insert = mysqli_query($conn,"INSERT INTO thongketiennap(user_name, money) VALUES ('$username','$_GET[amount]')");
header('location: ../NapCard.php');