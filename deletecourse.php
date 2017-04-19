<?php
include('header.php');
require_once 'db.php';
if(!isset($_SESSION['userSession'])||($_SESSION['active'] == false)||($_SESSION['admin'] == false)){
    header('location:index.php');
}
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    echo "$id";
 $delete = $link->query("DELETE FROM course WHERE courseid ='$id'");
    if ($delete) {
        $_SESSION['codefield'] = "<div class='alert alert-success'>
        <span class='glyphicon glyphicon-info-sign'></span>Course was deleted successfully </div>";
        header('Location: viewcourse.php');
    }else{
        $_SESSION['codefield'] = "<div class='alert alert-danger'>
        <span class='glyphicon glyphicon-info-sign'></span>Course failed to be deleted </div>";
        header('Location: viewcourse.php');
    }
}