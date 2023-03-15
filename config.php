<?php
$connect = mysqli_connect("localhost", "root", "") or die ("Server not found!");
mysqli_select_db( $connect,"webphim") or die("Database not found!");
mysqli_query($connect,"SET NAMES 'utf8'");
?>