<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "projectfinal55");
mysqli_set_charset($con, "utf8");
$errors = array();
$_SESSION['login'] == "";
date_default_timezone_set('Asia/Kolkata');
$ldate = date('d-m-Y h:i:s A', time());
mysqli_query($con, "UPDATE userlog  SET logout = '$ldate' WHERE userEmail = '" . $_SESSION['login'] . "' ORDER BY id DESC LIMIT 1");
session_unset();
$_SESSION['errmsg'] = "You have successfully logout";
array_push($errors, "<script>alert('You have successfully logout');</script>");;
?>
<script language="javascript">
    document.location = "../index.php";
</script>