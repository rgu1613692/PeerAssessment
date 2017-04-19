<?php

session_start();
require_once 'db.php';
if(!isset($_SESSION['userSession'])||($_SESSION['active'] == false)||($_SESSION['admin'] == false)){
    header('location:index.php');

}
if (isset($_POST['create-task'])) {
    if (empty($_POST['question'])||($_POST['question']=="")) {// this checks if email field is empty
        $_SESSION['coursefield'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Question field cannot be empty </div>";
        header('Location: createtask.php');
    }else{
        $questions=$_POST['question'];
    }
    if (empty($_POST['course'])||($_POST['course']=="")) {// this checks if email field is empty
        $_SESSION['codefield'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course field cannot be empty </div>";
        header('Location: createtask.php');
    }else{
        $course=$_POST['course'];
    }
    if (!empty($_POST['question'])||!($_POST['question']=="")&&(!(empty($_POST['course'])||!($_POST['course']=="")))) {
        $question = $link->real_escape_string(strip_tags($questions));
        $course = intval($link->real_escape_string(strip_tags($course)));



        if($link->query("INSERT INTO task(question,courseid)VALUES('$question','$course')")){

            $_SESSION['coursecreated'] = "<div class='alert alert-success'>
            <span class='glyphicon glyphicon-info-sign'></span> Question was created successfully</div>";
            header('Location: createtask.php');
        }else{
            $_SESSION['coursefailed'] = "<div class='alert alert-danger'>
            <span class='glyphicon glyphicon-info-sign'></span> Question failed to be created. </div>";
           header('Location: createtask.php');
        }
    }
}