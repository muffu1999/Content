<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
  <?php
 if(isset($_POST['submit']))
 {
     $usernames=trim($_POST['username']);
     $emails=trim($_POST['email']);
     $passwords=trim($_POST['password']);
     $cpasswords=trim($_POST['cpassword']);
     $fname=trim($_POST['firstname']);
     $lname=trim($_POST['lastname']);
     
     $query_user_exists="select username from users where username='$usernames'";
     $check_user=mysqli_query($con,$query_user_exists);
     $count=mysqli_num_rows($check_user);
     if($count>0)
     {
         echo "<script>alert('username already exists');</script>";
     }
     elseif(strlen($usernames)<4)
     {
         echo "<script>alert('username needs to be longer');</script>";
     }
     elseif($passwords!=$cpasswords)
     {
          echo "<script>alert('Password is not matching');</script>";
     }
     else
     {
     
     $username=mysqli_real_escape_string($con,$usernames);
     $email=mysqli_real_escape_string($con,$emails);
     $password=mysqli_real_escape_string($con,$passwords);
     $password=password_hash($password,PASSWORD_DEFAULT,array("cost"=>10));
     $query_to_insert="insert into users(username,user_password,user_email,user_role,user_firstname,user_lastname)values('$username','$password','$email','Subscriber','$fname','$lname')";
     $result_insert=mysqli_query($con,$query_to_insert);
        
     echo "<script>alert('User Created')</script>";
         header("Location:index.php");
     }
 }
?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container" >
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style="border-radius:10px;border: 1px solid;padding: 10px;  box-shadow: 5px 10px 18px black;" >
                <h1 class="text-center">Register</h1>
                 
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username" title="Username must be of atleast 4 characters" required>
                        </div>
                         <div class="form-group">
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your First Name" required>
                        </div>
                       
                        <div class="form-group">
                              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Your Last Name" required>
                        </div>
                       
                         <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                        </div>
                         <div class="form-group">
                            <input type="password" name="password" id="key" class="form-control" placeholder="Enter your Password" required>
                        </div>
                         <div class="form-group">
                             <input type="password" name="cpassword" id="key" class="form-control" placeholder="Confirm Password" required>
                         </div>

                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-block"  value="Register">
                    </form>
                 
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
