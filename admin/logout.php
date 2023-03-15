<?php
session_start();
ob_start();
unset($_SESSION['adminName']);
header("Location: /phimhay/admin/index.php");
?>