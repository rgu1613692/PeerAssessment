
<?php
session_start();
require_once 'db.php';

if ((!empty($_GET['email']))&&(!empty($_GET['hash']))) {

    $emaill=$_GET['email'];
    $hashl=$_GET['hash'];
    $emai = strip_tags($emaill);
    $ha = strip_tags($hashl);

    $email = $link->real_escape_string($emai);
    $hash = $link->real_escape_string($ha);

    $link->query("UPDATE users SET active=1 WHERE email='$email'And hash='$hash'");
    $_SESSION['verifymsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Account verification was successful. You can now login to your account !
                            </div>";
    header("Location: index.php");

}