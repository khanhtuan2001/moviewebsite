<?php
session_start();
require_once('../connect/db_connect.php');
require_once('../lib/paging.php');
$db = new DB_Connect();
$conn = $db->connect();
$userid = $_SESSION['userid'];
$value = $_GET['value'];


if (isset($_GET['value']) && $_GET['value'] == 1) {
    $result = $conn->query("select * from user where id=$userid");
    $row = mysqli_fetch_array($result);
    $update = $row['tiennap'] - 30000;
    $result_update = mysqli_query($conn, "UPDATE user SET tiennap=$update WHERE id='$userid'");
    $date = date('Y-m-j');
    $newdate = strtotime ( '+1 month' , strtotime ( $date ) ) ;
    $newdate = date ( 'Y-m-j' , $newdate );
    $muagoi = mysqli_query($conn, "INSERT INTO muagoi(userid, value, date, date_end) VALUES ('$userid','$value',NOW(),'$newdate')");
}

if (isset($_GET['value']) && $_GET['value'] == 2) {
    $result = $conn->query("select * from user where id=$userid");
    $row = mysqli_fetch_array($result);
    $update = $row['tiennap'] - 160000;
    $result_update = mysqli_query($conn, "UPDATE user SET tiennap=$update WHERE id='$userid'");
    $date = date('Y-m-j');
    $newdate = strtotime ( '+6 month' , strtotime ( $date ) ) ;
    $newdate = date ( 'Y-m-j' , $newdate );
    $muagoi = mysqli_query($conn, "INSERT INTO muagoi(userid, value, date, date_end) VALUES ('$userid','$value',NOW(),'$newdate')");
}

if (isset($_GET['value']) && $_GET['value'] == 3) {
    $result = $conn->query("select * from user where id=$userid");
    $row = mysqli_fetch_array($result);
    $update = $row['tiennap'] - 300000;
    $result_update = mysqli_query($conn, "UPDATE user SET tiennap=$update WHERE id='$userid'");
    $date = date('Y-m-j');
    $newdate = strtotime ( '+1 year' , strtotime ( $date ) ) ;
    $newdate = date ( 'Y-m-j' , $newdate );
    $muagoi = mysqli_query($conn, "INSERT INTO muagoi(userid, value, date,date_end) VALUES ('$userid','$value',NOW(),'$newdate')");
}

header('location: ../NapCard.php');