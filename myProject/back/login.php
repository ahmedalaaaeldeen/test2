<?php 

include 'dbconn.php';
session_start();
if (isset($_POST['submitLogin'])){

$email=$_POST['email'];
$password=$_POST['password'];
$checkEmail=checkEmail($email);

if(count($checkEmail) !=0){

    $logIn = $cont->prepare("SELECT * FROM users WHERE email=? AND password=? LIMIT 1");
    $logIn->execute([$email,$password]);

    $userData = $logIn->fetch();
    if (!empty($userData)) {
        $_SESSION['userName']=$userData['name'];
        header("Location:../index.php");

    }
}



}

function checkEmail($email)
{
    global $conn;
    $checkEmail = $conn->prepare("SELECT id FROM usersInfo WHERE email=? LIMIT 1");
    $checkEmail->execute([$email]);
    return $checkEmail->fetchAll();
}