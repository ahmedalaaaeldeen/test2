<?php 
    include 'dbconn.php';
    session_start();
    if (isset($_POST['submitRegister'])) {
        $name =$_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        
        $check = checkEmail($email);
        if (count($check) == 0 ) {
            addUser($name,$email,$password);
            $_SESSION['accountCreated'] = 'your account has been created';
            header("Location:../index.php");

        }else{
            $_SESSION['accountExist'] = 'account exists';
            header("Location:../index.php");
        }
        

    }

    function checkEmail($email)
    {
        global $conn;
        $checkEmail = $conn->prepare("SELECT id FROM usersInfo WHERE email=? LIMIT 1");
        $checkEmail->execute([$email]);
        return $checkEmail->fetchAll();
    }

    function addUser($name,$email,$password){
        global $conn;
        $add = $conn->prepare("INSERT INTO usersInfo(name,email,password) VALUES (?,?,?)");
        $add->execute([$name,$email,$password]);
        
    }