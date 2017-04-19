<?php

session_start();
require_once 'db.php';

if (isset($_POST['login-btn'])) {
    if ((empty($_POST['email']))||($_POST['email']=="")) {// this checks if email field is empty
        $_SESSION['emailmessage'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Email field cannot be empty </div>";
        header('Location: index.php');
    }
    if ((empty($_POST['password']))||($_POST['password']=="")) {//this checks if password field is empty
        $_SESSION['passwordmessage'] = "<div class='alert alert-danger'>
     <span class='glyphicon glyphicon-info-sign'></span> Password field cannot be empty </div>";
        header('Location:index.php');
    }


    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    $email = $link->real_escape_string($email);
    $password = $link->real_escape_string($password);

    $query = $link->query("SELECT userid, username, email, password, active, role FROM users WHERE email='$email'");
    $row=$query->fetch_array();
    $admin =$row['role'];
    $active = $row['active'];
    $count = $query->num_rows; // if email is correct returns must be 1 row
    if($active==1){
            $_SESSION['active'] = true;
        echo "$admin";
        if (password_verify($password, $row['password']) && $count==1) {
            $_SESSION['userSession'] = $row['username'];
            $_SESSION['useridSession'] = $row['userid'];

            if($admin==1){
                $_SESSION['admin'] = true;
                header("Location: adminlanding.php");
            }else {
                header("Location: studentlanding.php");
            }
        } else {

            $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Invalid Username or Password !
        </div>";
            header("Location: index.php");
        }
    }else{
        $_SESSION['loginmessage'] = "<div class='alert alert-danger'>
         <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Please verify your account by clicking the link sent to your email!
        </div>";
        header("Location: index.php");
    }

$conn->close();

}