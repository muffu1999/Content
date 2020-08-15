           
           <?php include "includes/admin_header.php"; ?>
           <?php 
      if($_SESSION['role']==null||$_SESSION['role']=='Subscriber')
      {
          header("Location:../index.php");
  }

?>           

        <?php
            
            if(isset($_SESSION['username']))
            {
                $username=$_SESSION['username'];
                $query="select * from users where username='$username'";
                $select_profile=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($select_profile))
                {
                    $user_name=$row['username'];
                    $user_firstname=$row['user_firstname'];
                    $user_lastname=$row['user_lastname'];
                    $user_email=$row['user_email'];
                    $user_password=$row['user_password'];        
                }
            }

            ?>
           
            <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php"; ?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header text-center">
                            Welcome <?php echo $_SESSION['username']; ?>
                            
                        </h1>
                       
                       
                       <div class="col-md-12">
                           <form action="" method="post" enctype="multipart/form-data">
    
   <div class="form-group">
        <label for="">First Name</label>
        <input type="text"  value="<?php echo $user_firstname ?>" name="user_firstname" class="form-control" required> 
    </div>
   <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" value="<?php echo $user_lastname ?>" name="user_lastname" class="form-control" required>
       </div>       
        
     <div class="form-group">
        <label for="">Username</label>
        <input type="text" value="<?php echo $user_name ?>" name="username" class="form-control" required>
    </div>
   
     <div class="form-group">
        <label for="">Email</label>
        <input type="email"  value="<?php echo $user_email ?>" name="user_email" class="form-control" required>
    </div>
<!--
    <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="post_image">
        
    </div>
-->
      
  <input type="submit" name='submit' class="btn btn-primary" value="Edit profile"> 
   
    
    </form>
                   <?php
if(isset($_POST['submit']))
{
    $firstname=$_POST['user_firstname'];
    $lastname=$_POST['user_lastname'];
    $username=$_POST['username'];
    $email=$_POST['user_email'];
    

//    $post_image=$_FILES['post_image']['name'];
//    $post_image_temp=$_FILES['post_image']['tmp_name'];
//    move_uploaded_file($post_image_temp,"../images/$post_image");
     
  
$query_update="update users set
 user_firstname='{$firstname}',user_lastname='{$lastname}',username='{$username}',user_email='{$email}' where username='$username'";
$update_user=mysqli_query($con,$query_update);
        echo "<script>alert('profile updated');window.location='includes/logout.php';</script>";
        
 
}
?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

   <?php include "includes/admin_footer.php" ?>
   