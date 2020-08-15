<?php
if(isset($_POST['submit']))
{
   
     $firstname=$_POST['user_firstname'];
    $lastname=$_POST['user_lastname'];
    $username=$_POST['username'];
    $password=$_POST['user_password'];
    $email=$_POST['user_email'];
    $role=$_POST['user_role'];

//    $post_image=$_FILES['post_image']['name'];
//    $post_image_temp=$_FILES['post_image']['tmp_name'];
//    move_uploaded_file($post_image_temp,"../images/$post_image");
    $password=password_hash($password,PASSWORD_DEFAULT,array("cost"=>10));
 $query="insert into users(user_firstname,user_lastname,username,user_password,user_email,user_role) values('{$firstname}','{$lastname}','{$username}','{$password}','{$email}','{$role}')";
    $insert=mysqli_query($con,$query);
    if($insert)
    {
        echo "<script>alert('record inserted')</script>";
    }
}



?>
   

   
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
   <div class="form-group">
        <label for="">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">
       </div>       
        
     <div class="form-group">
        <label for="">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
   
     <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>
<!--
    <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="post_image">
        
    </div>
-->
    <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>
     <div class="form-group">
        <label for="">Role</label>
       <select name="user_role" id="">
           <option value="Subscriber">Select</option>
           <option value="Admin">Admin</option>
           <option value="Subscriber">Subscriber</option>
       </select>
    </div>
  <input type="submit" name='submit' class="btn btn-primary" value="Add User"> 
   
    
    </form>