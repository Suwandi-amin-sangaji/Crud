<?php
session_start();
include "dbcon.php";

if (isset($_POST['register']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userProperties = [
        'email' => $email,
        'emailVerified' => false,
        'password' => $password,
        'displayName' => $username
    ];
    $createdUser = $auth->createUser($userProperties);

    if ($createdUser) {
        $_SESSION['status'] = "Register berhasil";
        header("location:register.php");
    }else{
        $_SESSION['status'] = "Register gagal";
        header("location:index.php");
    }
    
}

?>