<?php
session_start();
include "dbcon.php";

if (isset($_POST['login'])) 
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $user = $auth->getUserByEmail($email);
        $signInResult = $auth->signInWithEmailAndPassword($email, $password);
        $idTokenString = $signInResult->idToken();

        try {
            $verifiedIdToken = $auth->verifyIdToken($idTokenString);
            $uid = $verifiedIdToken->claims()->get('sub');

            $_SESSION['verified_user_id'] = $uid;
            $_SESSION['idTokenString'] = $uid;
            $_SESSION['status']= "Login Sukses";
            header("location:admin/index.php");

        } catch (InvalidToken $e) {
            echo 'The token is invalid: '.$e->getMessage();
        } catch (\InvalidArgumentException $e) {
            echo 'The token could not be parsed: '.$e->getMessage();
        }


    } catch (\Kreait\Firebase\Exception\Auth\UserNotFound $e) {
       $_SESSION['status']= "Email Belum Terdaftar";
       header("location:login.php");
       exit();
    }

}
?>