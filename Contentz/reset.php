<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php if(!isset($_GET['token']))
         { header("Location:index.php");
         }  ?>


<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            
                                <h2 class="text-center">Reset Password</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">

                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                           <input type="password" name="password" class="form-control" placeholder="Enter your new Password" required>
                                        </div>
                                         <div class="form-group">
                                           <input type="password" name="cpassword" class="form-control" placeholder="Confirm your new Password" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input name="Submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->
                                
                                <?php
                            if(isset($_GET['token']))
                            {
                                $token=$_GET['token'];
                            }
                            if(isset($_POST['Submit']))
                            {
                                $passwords=$_POST['password'];
                                $cpasswords=$_POST['cpassword'];
                                if($passwords!==$cpasswords)
                                {
                                    echo "<script>alert('both password must be same');</script>";
                                }
                                else
                                {
                                    $password=password_hash($passwords,PASSWORD_DEFAULT,array("cost"=>10));
                                    $query="update users set user_password=? where token=?";
                                    $stmt=mysqli_prepare($con,$query);
                                    if(!$stmt)
                                        die("error".mysqli_error($con));
                                    $stmt->bind_param("ss",$password,$token);
                                    $stmt->execute();
                                    header("Location:index.php");
                                    $stmt->close;
                                }
                            }
                                    ?>
                                

                                

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->

