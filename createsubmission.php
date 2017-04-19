<?php

include('header.php');
require_once 'db.php';
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:index.php');
}
if (isset($_POST['make'])) {
    $coursename = $_POST['coursename'];
    $uid = $_POST['uid'];
    $courseid = $_POST['courseid'];
    $taskid = $_POST['taskid'];
    $question = $_POST['question'];


}?>
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div id="" class="col-md-6 col-md-offset-3">

            <form id="login" action ="submitcourse.php" method="post">
                <div class="form-group">
                    <label for="coursename">Course Name</label>
                    <input type="text" disabled class="form-control" id="coursename" name="coursename" value='<?php echo "$coursename";?>'></input>
                </div>
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" disabled class="form-control" id="question" name="question" value='<?php echo "$question";?>'></input>
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea type="text" class="form-control" id="answer" name="answer" placeholder="Please enter your submissions here"></textarea>
                </div>

                <input type='hidden' name= 'taskid' value='<?php echo "$taskid";?>'>
                <input type='hidden' name= 'courseid' value='<?php echo "$courseid";?>'>
                <input type='hidden' name= 'uid' value='<?php echo "$uid";?>'>
                <button type="submit" name="create-task" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<SCRIPT src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></SCRIPT>


</body>
</html>
