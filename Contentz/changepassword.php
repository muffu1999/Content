<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php 
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
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

                            
                                <h2 class="text-center">Change Password</h2>
                                <p>You can change your password here.</p>
                                <div class="panel-body">

                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                       <div class="form-group">
                                           <input type="password" name="opassword" class="form-control" placeholder="Enter your old Password" required>
                                        </div>
                                        
                                        <div class="form-group">
                                           <input type="password" name="password" class="form-control" placeholder="Enter your new Password" required>
                                        </div>
                                         <div class="form-group">
                                           <input type="password" name="cpassword" class="form-control" placeholder="Confirm your new Password" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input name="Submit" class="btn btn-lg btn-primary btn-block" value="Submit" type="submit">
                                        </div>

                                    </form>

                                </div><!-- Body-->
                                
                                <?php
                                        if(isset($_POST['Submit']))
                                        {
                                             $query_to_fetch_password="select user_password from users where username='$username'";
                                             $result=mysqli_query($con,$query_to_fetch_password);
                                             $row=mysqli_fetch_assoc($result);
                                             $db_password=$row['user_password'];

                                            $oldpassword=$_POST['opassword'];
                                            $newpassword=$_POST['password'];
                                            $cpassword=$_POST['cpassword'];
                                            $old=mysqli_real_escape_string($con,$oldpassword);
                                            $new=mysqli_real_escape_string($con,$newpassword);
                                            $confirm=mysqli_real_escape_string($con,$cpassword);
                                            if(password_verify($old,$db_password))
                                            {
                                                if($newpassword==$cpassword)
                                                {
                                                    $hashed_password=password_hash($new,PASSWORD_DEFAULT,array("cost"=>10));
                                                    $query="UPDATE users set user_password='$hashed_password' where username='$username'";
                                                    $result=mysqli_query($con,$query);
                                                }
                                                    
                                                else
                                                {
                                                    echo "<script>alert('Both passwords do not match');</script>";
                                                }
                                            }
                                            else
                                            {
                                                echo "<script>alert('old password is not correct');</script>";
                                            }     
                                            echo "<script>alert('Your Password is changed Successfully');window.location='admin/includes/logout.php';</script>";
                                          
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

