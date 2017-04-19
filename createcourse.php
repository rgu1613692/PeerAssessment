<?php

include('header.php');
if(!isset($_SESSION['userSession'])||($_SESSION['active'] == false)||($_SESSION['admin'] == false)){
    header('location:index.php');
}
?>
<div class="container">
    <div class="row">
            <div id="" class="col-md-6 col-md-offset-3">
                <?php
                if (isset($_SESSION['coursefield'])){
                    echo $_SESSION['coursefield'];
                    unset($_SESSION['coursefield']);
                } ?>
                <?php
                if (isset($_SESSION['codefield'])){
                    echo $_SESSION['codefield'];
                    unset($_SESSION['codefield']);
                } ?>
                <?php
                if (isset($_SESSION['coursecreated'])){
                    echo $_SESSION['coursecreated'];
                    unset($_SESSION['coursecreated']);
                } ?>
                <?php
                if (isset($_SESSION['coursefailed'])){
                    echo $_SESSION['coursefailed'];
                    unset($_SESSION['coursefailed']);
                } ?>
                <form id="login" action ="createcos.php" method="post">
                    <div class="form-group">
                        <label for="courseName">Course Name</label>
                        <input type="text" class="form-control" id="courseName" name="course" placeholder="Enter Course Name">
                    </div>
                    <div class="form-group">
                        <label for="courseCode">Course Code</label>
                        <input type="text" class="form-control" id="courseCode" name="coursecode" placeholder="Enter Course Code">
                    </div>

                    <button type="submit" name="create-course" class="btn btn-default">Submit</button>
                </form>
            </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>