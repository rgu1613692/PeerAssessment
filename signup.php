<?php

session_start();

require_once 'db.php';

require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

        if(isset($_POST['signup-btn'])) {
            if (($_POST['password1'] == $_POST['password2'])) {// this checks to see if both password fields are a match
                $up = $_POST['password1'];
            } else {
                $_SESSION['passmsg'] = "<div class='alert alert-danger'>
                 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Password fields cannot be empty or they do not match</div>";
                header("Location: index.php");

            }
            if (empty($_POST['username'])) {//this checks if username field is empty
                $_SESSION['usernamemsg'] = "<div class='alert alert-danger'>
                 <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Username field cannot be empty</div>";
                header("Location: index.php");

            } else {
                $un = $_POST['username'];
            }
            if (empty($_POST['email'])) {// this checks if email field is empty
                $_SESSION['emailmsg'] = "<div class='alert alert-danger'>
                <span class='glyphicon glyphicon-info-sign'></span> &nbsp;Email field cannot be empty</div>";
                header("Location: index.php");
            } else {
                $em = $_POST['email'];
            }

            $unam = strip_tags($un);
            $emai = strip_tags($em);
            $upas = strip_tags($up);

            $uname = $link->real_escape_string($unam);
            $email = $link->real_escape_string($emai);
            $upass = $link->real_escape_string($upas);

            $hash = md5(rand(0, 1000)); // Generate random 32 character hash and
            $active = 0;
            $role = 0;

            $hashed_password = password_hash($upass, PASSWORD_DEFAULT); //here i am hashing the password

            $check_email = $link->query("SELECT email FROM users WHERE email ='$email'");
            $count = $check_email->num_rows;
            if ($check_email){
               
            }
            if (($count == 0)&&($_POST['password1'] == $_POST['password2'])) {

                $ins=$link->query("INSERT INTO users(username,password,role,hash,email,active)VALUES('$uname','$hashed_password',$role,'$hash','$email',$active)");

                if ($ins) {
                  
                    $mail->IsSMTP();
                    $mail->Host = 'ssl://smtp.gmail.com';
                    $mail->Port = 465; //can be 587
                    $mail->SMTPAuth = TRUE;

                    $mail->Username = 'trialpeerassessment@gmail.com';

                    $mail->Password = 'trialpeerassessment)(';


                    $mail->setFrom('trialpeerassessment@gmail.com', 'Peer Assessment');
                    $mail->addAddress("$email", "$uname");
                    $mail->Subject = 'Signup | Verification';
                    $mail->Body = 'Thanks for signing up!
                        Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
                        ------------------------
                        Username: ' . $unam . '
                        Password: ' . $upass . '
                        ------------------------
 
                        Please click this link to activate your account:
                        http://myassessment.azurewebsites.net/verify.php?email=' . $email . '&hash=' . $hash . '';
                    if (!$mail->send()) {
                        $_SESSION['mailmsg'] = "<div class='alert alert-success'>
                             <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Failed to send Verification Email !
                            </div>";
                        header("Location: index.php");
                    } else {
                        $_SESSION['mailmsg'] = "<div class='alert alert-success'>
                            <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Successfully registered please verify account by clicking on the link sent to your email !
                            </div>";

                        header("Location: index.php");
                    }

                } else {

                    $_SESSION['sqlmsg'] = "<div class='alert alert-danger'>
                        <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry!!! your account failed to be created!
                        </div>";
                    header("Location: index.php");
                }

            } else {
                $_SESSION['errormsg'] = "<div class='alert alert-danger'>
                    <span class='glyphicon glyphicon-info-sign'></span> &nbsp; Sorry!!! somthing went wrong !
                    </div>";
                header("Location: index.php");
            }
        }

    $link->close();
        ?>

