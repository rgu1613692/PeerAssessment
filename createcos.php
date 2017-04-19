<?php

session_start();
require_once 'db.php';
if(!isset($_SESSION['userSession'])||($_SESSION['active'] == false)||($_SESSION['admin'] == false)){
    header('location:index.php');

}
if (isset($_POST['create-course'])) {
    if (empty($_POST['course'])||($_POST['course']=="")) {// this checks if email field is empty
        $_SESSION['coursefield'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course name field cannot be empty </div>";
        header('Location: createcourse.php');
    }else{
        $name=$_POST['course'];
    }
    if (empty($_POST['coursecode'])||($_POST['coursecode']=="")) {// this checks if email field is empty
        $_SESSION['codefield'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course Code field cannot be empty </div>";
        header('Location: createcourse.php');
    }else{
        $code=$_POST['coursecode'];
    }
    if (!empty($_POST['coursecode'])||!($_POST['coursecode']=="")&&(!(empty($_POST['course'])||!($_POST['course']=="")))){
        $courseCode = $link->real_escape_string(strip_tags($code));
        $courseName= $link->real_escape_string(strip_tags($name));

        $ins=$link->query("INSERT INTO course(code,coursename)VALUES('$courseCode','$courseName')");
        if($ins){
                $_SESSION['coursecreated'] = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> Course was created successfully</div>";
                header('Location: createcourse.php');
        }else{
            $_SESSION['coursefailed'] = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> Course failed to be created. Course name and code must be unique</div>";
            header('Location: createcourse.php');
        }
    }
}