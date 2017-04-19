<?php


session_start();
require_once 'db.php';
if (isset($_POST['submit'])) {
    if (empty($_POST['course'])||($_POST['course']=="")) {// this checks if email field is empty
        $_SESSION['course'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course name field cannot be empty </div>";
        header('Location: studentcourse.php');
    }else{
        $cos=$_POST['course'];
    }
    if (empty($_POST['student'])||($_POST['student']=="")) {// this checks if email field is empty
        $_SESSION['student'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course Code field cannot be empty </div>";
        header('Location: studentcourse.php');
    }else{
        $student=$_POST['student'];
    }
    if((!empty($_POST['course'])&&(sizeof($student)>0))){

        foreach ($student as $item){
            $ins= $link->query("INSERT INTO user_course(userid,courseid )values('$item','$cos')");
        }
        if($ins) {
            $_SESSION['ins'] = "<div class='alert alert-success'>
        <span class='glyphicon glyphicon-info-sign'></span>Student course mapping done successfully </div>";
            header('Location: studentcourse.php');
        }
    }
}