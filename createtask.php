<?php

include('header.php');
require_once 'db.php';
if(!isset($_SESSION['userSession'])||($_SESSION['active'] == false)||($_SESSION['admin'] == false)){
    header('location:index.php');
}
?>
<div class="container" xmlns="http://www.w3.org/1999/html">
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
            <form id="login" action ="create-task.php" method="post">
                <div class="form-group">
                    <label for="courseCode">Question</label>
                    <textarea type="text" class="form-control" id="question" name="question" placeholder="Enter question"></textarea>
                </div>
                <div class="form-group">
                    <label for="course">Course</label>
                    <select type="text" class="form-control selectpicker" id="question" name="course" >
                    <option disabled selected>Select a Course</option>
                        <?php
                        $query = $link->query("SELECT * FROM course");
                        while ($row=$query->fetch_assoc()) {
                            echo'<option value='.'"'.$row['courseid'].'"'.'>'.$row['coursename'].'</option>';

                        }
                        ?>
                    </select>
                </div>

                <button type="submit" name="create-task" class="btn btn-default">Create Task</button>
            </form>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.js"></script>

</body>
</html>