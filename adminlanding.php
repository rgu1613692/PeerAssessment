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
            <i class="fa fa-university fafont"></i>
            <a class="dashlink" href="viewcourse.php">Courses</a>
        </div>
        <div class="col-md-4 mydash">
            <i class="fa fa-tasks fafont"></i>
            <a class="dashlink" href="viewtask.php">Course Works</a>
        </div>
        <div class="col-md-4 mydash">
            <i class="fa fa-graduation-cap fafont"></i>
            <a class="dashlink" href="studentcourse.php">Students course Mapping</a>
        </div>

    </div>
    <br class="break">
    <div class = "row">
        <div class="col-md-4 mydash">
            <i class="fa fa-folder-open-o fafont"></i>
            <a class="dashlink" href="">Submissions</a>
        </div>
        <div class="col-md-4 mydash ">
            <i class="fa fa-files-o fafont"></i>
            <a class="dashlink" href="">Pear Assessments</a>
        </div>
        <div class="col-md-4 mydash">
            <i class="fa fa-users fafont"></i>
            <a class="dashlink" href="">Groups</a>
        </div>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>