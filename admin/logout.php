<?php
session_destroy();
// unset($_SESSION['verified_user_id']);
// unset($_SESSION['idTokenString']);
$_SESSION['status']= "logout berhasil";
header("location:../index.php");
exit();

?>