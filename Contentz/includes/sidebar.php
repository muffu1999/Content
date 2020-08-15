<div class="col-md-4">
                <div class="well">
                    <h4>Blog Search</h4>
                    
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button  name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
               
                 <!--login -->
                 <?php if(isset($_SESSION['username']))
{
    echo "logged in as ". $_SESSION['username'] ;
}
    else
    {
    ?>
                 
                 
                 <div class="well" id="mydiv" style="border-radius:10px;border: 1px solid;padding: 10px;  box-shadow: 5px 10px 18px black;">
                    <h2 class="text-center">Login</h2>
                    <form action="index.php" method="post">
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="enter username" required>
                    </div>
                     <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="enter password" required>
                    </div>
                        <p class="text-left"><a href="forgot.php" name="forgot">forgot password?</a></p>
               
                
                 <p class="text-center">
                    <input type="submit" value="Login" name="login" class="btn btn-primary" style="margin-right:25px; width:100px">
                    <input type="reset" value="Reset" class="btn btn-primary" style="width:100px">
                </p>    
                        <p>Don't have account?<a href="registration.php">Sign up</a></p>
                    </form>
              
                </div>
                <?php }?>
                <?php
                    if(isset($_POST['login']))
                    {
                        $username=$_POST['username'];
                        $password=$_POST['pass'];
                        $user=mysqli_real_escape_string($con,$username);
                        $pass=mysqli_real_escape_string($con,$password);
                        $query="select * from users where username='{$user}'"; 
                        $select=mysqli_query($con,$query);
                        $count=mysqli_num_rows($select);
                        if($count==0)
                        {
                            echo "<script>alert(' username is not correct');</script>";
                        }
                        else{
                        
                        
                        while($row=mysqli_fetch_array($select))
                        {
                            $user_id=$row['userid'];
                            $user_name=$row['username'];
                            $user_firstname=$row['user_firstname'];
                            $user_lastname=$row['user_lastname'];
                            $user_password=$row['user_password'];
                            $user_role=$row['user_role'];
                        }
                       // $pass=crypt($password,$user_password);
                          if(password_verify($pass,$user_password)){
                             $_SESSION['username']=$user_name;
                             $_SESSION['firstname']=$user_firstname;
                             $_SESSION['lastname']=$user_lastname;
                             $_SESSION['role']=$user_role;
                              if(isset($_SESSION['role'])&& $_SESSION['role']=='Admin')
                              {
                             header("Location:admin/index.php");
                              }
                               else
                               {
                                header("Location:index.php");
                               }
                        
                          }
                            else
                            {
                                echo "<script>alert('password is not correct');</script>";
                            }
                       
                        
                    }
                    }
                     ?>
                     
                     
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                               
                               <?php 
                                
                                 $query="select * from category";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {
                        $cat_title=$row['cat_title'];
                        echo "<li><a href='category.php?cat_title=$cat_title'>{$cat_title}</a></li>";
                    }
                                
                                ?>
                               
                            </ul>
                        </div>
                       
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              
            </div>
            
            
            
