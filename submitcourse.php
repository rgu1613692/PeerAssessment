<?php

session_start();
require_once 'db.php';

if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:index.php');
}

if (isset($_POST['create-task'])) {
    if ((empty($_POST['answer'])) || ($_POST['answer'] == "")) {// this checks if email field is empty
        $_SESSION['answermessage'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Answer field cannot be empty </div>";
        header('Location: viewcoursework.php');
    }else{

        $uid = $_POST['uid'];
        $taskid = $_POST['taskid'];
        $answer = $_POST['answer'];
        $ins=$link->query("INSERT INTO submissions(studentid,taskid,answer)VALUES($uid,$taskid,'$answer')");
        if($ins){
            $_SESSION['submission'] = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> Your submission was successfully</div>";
            header('Location: viewcoursework.php');
        }
    }
}