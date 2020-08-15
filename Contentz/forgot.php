<?php use PHPMailer\PHPMailer\PHPMailer; ?>
<?php  include "includes/header.php"; ?>
<?php  include "includes/db.php"; ?>
<?php
require './vendor/autoload.php';
 if(isset($_POST['email'])) {

            $email = $_POST['email'];
            $length = 50;
            $token = bin2hex(openssl_random_pseudo_bytes($length));

     $query = "SELECT user_email FROM users WHERE user_email='$email'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0) {

        $query2="update users set token=? where user_email=?";
        $stmt=mysqli_prepare($con,$query2);
        $stmt->bind_param("ss",$token,$email);
        $stmt->execute();
        $stmt->close();
        
                    /**
                     *
                     * configure PHPMailer
                     *
                     *
                     */

//                    $mail = new PHPMailer();
//                    $mail->SMTPDebug=1;
//                    $mail->isSMTP();
//                    $mail->Host = "smtp.yahoo.com";
//                    $mail->Username = "mufaddalsawadiya@yahoo.com";
//                    $mail->Password = "MS19995253";
//                    $mail->Port = 587;
//                    $mail->SMTPSecure = 'tls';
//                    $mail->SMTPAuth = true;
//                    $mail->isHTML(true);
//                    $mail->CharSet = 'UTF-8';
//        
//                    $mail->setFrom('mufaddalsawadiya@yahoo.com', 'Mufaddal Sawadiya');
//                    $mail->addAddress($email);
//                    $mail->Subject = 'This is a test email';
//
//                    $mail->Body = 'Please click to reset your password';
//                    if($mail->send())
//                    {
//                        echo "sent";
//                    }
//                    else 
//                    {
//                        echo "not sent";
//                    }
        
                        
        echo '<a href="http://localhost/cms/reset.php?token='.$token.' " class="btn btn-warning">Click Here</a>';
        
        
    }
     else
         echo  '<script>alert("Please provide correct email address");</script>';

 }


?>

<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">


                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->

