<?php require_once 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link rel="stylesheet"href="  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php
    //$usersession = $_SESSION['userSession'];
   // $user = $link->query("SELECT userid,username FROM user WHERE username='$usersession'");
    //$urow = $user->fetch_assoc();
   // $userid = $urow['userid'];
   // $username = $urow['username'];
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">Peer Assessment</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <?php
        if(isset($_SESSION['userSession'])&&$_SESSION['admin'] == false){
           echo "<li><a href=\"studentlanding.php\">Home</a></li>";
        }
        if(isset($_SESSION['userSession'])&&$_SESSION['admin'] == true){
            echo "<li><a href=\"adminlanding.php\">Home</a></li>";
        }

        ?>
        </ul>
            <?php
            $admin=$_SESSION['admin'];
            if ($admin) {
                echo"<ul class='nav navbar-nav'>
                <li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Course<span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href='createcourse.php'>Create Course </a></li>
                        <li><a href='viewcourse.php'>View Courses</a></li>
                    </ul>
                </li>
               
            </ul>";}?>
            <?php
            $admin=$_SESSION['admin'];
            if ($admin) {
                echo"<ul class='nav navbar-nav'>
                <li class='dropdown'>
                    <a class='dropdown-toggle' data-toggle='dropdown' href='#'>Course Work<span class='caret'></span></a>
                    <ul class='dropdown-menu'>
                        <li><a href='createtask.php'>Create Course work</a></li>
                         <li><a href='viewtask.php'>View Course work</a></li>
                    </ul>
                </li>
               
            </ul>";}?>

            <ul class="nav navbar-nav navbar-right">
                <?php
                if (isset($_SESSION['userSession'])) {
                    echo'<li><p class="navbar-text"> Welcome ' .$_SESSION['userSession'].'</p>
            <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> Log out</a></li>';
                }
                else{
                    echo'<li><a href="index.php"><span class="glyphicon glyphicon-user"></span> Sign Up / Login</a></li>';
                };
                ?>
            </ul>
        </div>
    </div>
</nav>

