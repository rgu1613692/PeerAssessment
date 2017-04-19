<?php

include('header.php');
require_once 'db.php';
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:index.php');
}
?>
<div class="container">
    <div class="row">
        <div id="" class="col-md-8 col-md-offset-2">
            <?php if (isset($_SESSION['answermessage'])){
                echo $_SESSION['answermessage'];
                unset($_SESSION['answermessage']);
            } ?>
            <?php
            if (isset($_SESSION['submission'])){
                echo $_SESSION['submission'];
                unset($_SESSION['submission']);
            } ?>
            <table id ='listrooms' class='table table-condensed table-striped'>
                <thead>
                <tr>
                    <th class=>Course</th>
                    <th class=>Question</th>
                    <th class=></th>

                </tr>
                </thead>
                </tbody>

                <?php
                    $question = $link->query("SELECT * FROM task");
                    $uid =$_SESSION['useridSession'];

                while ($row=$question->fetch_array()) {
                    $quest=$row['question'];
                    $courseids=$row['courseid'];
                    $taskid=$row['taskid'];

                    $course=$link->query("SELECT coursename FROM course where courseid='$courseids'");
                    $me = $course->fetch_array();
                    $thecourse =$me['coursename'];
                    echo'<tr><td class=>'.$thecourse.'</td>
                                    <td class=>'.$quest.'</td>';
                    echo"<td>
                                    <form action='createsubmission.php' method='post'>
                                    <input type='hidden' name= 'uid' value='$uid'>
                                    <input type='hidden' name= 'courseid' value='$courseids'>
                                    <input type='hidden' name= 'taskid' value='$taskid'>
                                    <input type='hidden' name= 'coursename' value='$thecourse'>
                                    <input type='hidden' name= 'question' value='$quest'>
                                    <button type='submit' name='make'  class='btn btn-success'>Add Submissions</button>
                                    </form></td></tr>";
                }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<SCRIPT src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></SCRIPT>

<script type="text/javascript">
    $(document).ready(function() {
        $('#listrooms').DataTable();
    } );
</script>

</body>
</html>
