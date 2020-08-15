<?php
if(isset($_GET['edit']))
{
    $userid=$_GET['edit'];
    $query="select * from users where userid={$userid}";
    $display_users=mysqli_query($con,$query);
    while($row=mysqli_fetch_assoc($display_users))
    {
        $user_name=$row['username'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_role=$row['user_role'];
        $user_email=$row['user_email'];
        $user_db_password=$row['user_password'];
    }
   
}



?>
<?php
if(isset($_POST['submit']))
{
   $usersid=$_GET['edit'];
    $firstname=$_POST['user_firstname'];
    $lastname=$_POST['user_lastname'];
    $username=$_POST['username'];
    $email=$_POST['user_email'];
    $role=$_POST['user_role'];


//    $post_image=$_FILES['post_image']['name'];
//    $post_image_temp=$_FILES['post_image']['tmp_name'];
//    move_uploaded_file($post_image_temp,"../images/$post_image");
   }
 $query="update users set user_firstname='{$firstname}',user_lastname='{$lastname}',username='{$username}',user_email='{$email}',user_role='{$role}' where userid=$usersid";
$update_user=mysqli_query($con,$query);
header("Location:users.php");    

?>
   

   
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
     <div class="form-group">
        <label for="">Role</label>
       <select name="user_role" id="" >
           <option value='<?php echo $user_role ?>'><?php echo $user_role?></option>
        <?php if($user_role=='Admin')
           echo "<option value='Subcriber'>Subscriber</option>";
               else 
                   echo "<option value='Admin'>Admin</option>";
           
           ?>   
           
           
       </select>
    </div>
  <input type="submit" name='submit' class="btn btn-primary" value="Edit User"> 
   
    
    </form>