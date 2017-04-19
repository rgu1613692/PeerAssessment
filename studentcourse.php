<?php

include('header.php');
require_once 'db.php';
?>
<body>
<div class="container">
    <div class="row">
        <div id="" class="col-md-6 col-md-offset-3 wrapper">
            <?php
            if (isset($_SESSION['course'])){
                echo $_SESSION['course'];
                unset($_SESSION['course']);
            } ?>
            <?php
            if (isset($_SESSION['student'])){
                echo $_SESSION['student'];
                unset($_SESSION['student']);
            } ?>
            <?php
            if (isset($_SESSION['ins'])){
                echo $_SESSION['ins'];
                unset($_SESSION['ins']);
            } ?>
            <form action="setstudentcourse.php" method="post">
                <div class="form-group">
                    <label for="start">Course</label>

                    <select class="selectpicker form-control" name="course" >
                        <?php
                        $sql = "SELECT * FROM course ";
                        $result = $link->query($sql);
                        while ($row=$result->fetch_array()){
                            $code=$row['courseid'];
                            $title=$row['coursename'];
                            echo'<option value="'.$code.'">'.$title.'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="start">Student</label>
                    <select class="selectpicker form-control" name="student[]" multiple="multiple">
                        <?php
                        $sql = "SELECT *FROM users where role=0";
                        $result = $link->query($sql);
                        while($row = $result->fetch_assoc()) {
                            $firstname=$row['username'];

                            echo'<option value="'.$row["userid"].'" >'.$row["username"].'</option>';
                        }
                        ?></select>
                </div>
                <button type="submit" name="submit" class="btn btn-default">Add Student to Course</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $('.selectpicker').selectpicker();
            });

        </script>
</body>
</html>