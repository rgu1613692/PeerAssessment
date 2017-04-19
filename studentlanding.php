<?php
include('header.php');
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:index.php');
}

?>
<div class="container">
    <div class = "row">
        <br class="breaks">
        <div class="col-md-4 mydash">
            <i class="fa fa-book fafont"></i>
            <a class="dashlink" href="../../Desktop/MustaphAkinsanmi/myRGU2016/CMM007IntranetSystemDevelopment/courseworkPart2/viewcoursework.php">Course Works</a>
        </div>
        <div class="col-md-4 mydash">
            <i class="fa fa-file-text fafont"></i>
            <a class="dashlink" href="">Submissions</a>
        </div>
        <div class="col-md-4 mydash">
            <i class="fa fa-users fafont"></i>
            <a class="dashlink" href="">Peer Assessments</a>
        </div>

    </div>