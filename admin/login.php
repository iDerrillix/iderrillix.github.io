<?php
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == 'admin' && $password == 'secret'){
            $_SESSION['login'] = true;
            header("Location: dashboard.php");
            exit;
        } else {
            header("Location: admin-login.php?status=fail");
            exit;
        }
    }


    
?>