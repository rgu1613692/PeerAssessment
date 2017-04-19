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
        header('Location: viewcourse.php');
    }else{
        $name=$_POST['course'];
    }
    if (empty($_POST['coursecode'])||($_POST['coursecode']=="")) {// this checks if email field is empty
        $_SESSION['codefield'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course Code field cannot be empty </div>";
        header('Location: viewcourse.php');
    }else{
        $code=$_POST['coursecode'];
    }
    if (!empty($_POST['coursecode'])||!($_POST['coursecode']=="")&&(!(empty($_POST['course'])||!($_POST['course']=="")))){
        $courseCode = $link->real_escape_string(strip_tags($code));
        $courseName= $link->real_escape_string(strip_tags($name));
        $id=$_POST['courseid'];

        $ins=$link->query("UPDATE course SET coursename='$courseName',code='$courseCode' WHERE courseid='$id'");
        if($ins){
                $_SESSION['coursecreated'] = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> Course was updated successfully</div>";
                header('Location: viewcourse.php');
        }else{
            $_SESSION['coursefailed'] = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> Course failed to be updated. Course name and code must be unique</div>";
            header('Location: viewcourse.php');
        }
    }
}