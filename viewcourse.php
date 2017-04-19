<?php

include('header.php');
require_once 'db.php';
if(!isset($_SESSION['userSession'])||$_SESSION['active'] == false){
    header('location:index.php');
}
?>
<div class=' container'>
    <div class='row'>
        <div class='col-lg-8 col-lg-offset-2'>
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
            <table id ='listrooms' class='table table-condensed table-striped'>
                <thead>
                <tr>
                    <th class=>Course Name</th>
                    <th class=>Course Code</th>
                    <th class=></th>
                    <th class=></th>
                </tr>
                </thead>
                <?php

                $query = $link->query("SELECT courseid, coursename, code FROM course");
                while ($row=$query->fetch_assoc()) {

                    $id = $row["courseid"];
                echo'<tr>
    							<td class=>'.$row["coursename"].'</td>
								<td class=>'.$row["code"].'</td>
                                <td class=" ">
                                    <form action="editcourse.php" method="post">
                                        <input type="hidden" name="courseid" value='.$id.'>
                                        <button class="btn btn-success" name="courseedit">Edit <i class="fa fa-pencil-square-o"></i></button>
                                    </form>
                                </td>
								<td class=""><button class="btn btn-danger" data-href='.'deletecourse.php?id='.$id.' data-toggle="modal" data-target="#confirm-delete"> Delete
								<i class="fa fa-trash-o"></i></button></td></tr>';
 }
                ?>
        </div>
    </div>
</div>
<div id="confirm-delete" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure that you want to delete this course</p>
                <p class="text-warning"><small>If you click "delete" your data will be lost permanently</small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close <i class="fa fa-times-circle-o "></i></button>
                <button type="button" class="btn btn-danger btn-ok">Delete</button>
            </div>
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
    $(document).ready(function() {
        $('#confirm-delete').on('show.bs.modal', function(e) {
            var deleteid = $(e.relatedTarget).data('href');
            $('.btn-ok').click(function() {
                window.location.assign(deleteid)
            });
        });
    });
</script>

</body>
</html>