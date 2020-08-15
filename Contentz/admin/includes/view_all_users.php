 <table class="table table-bordered table-hover">
       <thead >
           <tr>
                
               <th  scope="col">Userid</th>
               <th scope="col">Userame</th>
               <th scope="col">First Name</th>
               <th scope="col">Last Name</th>
               <th scope="col">Email</th>
               <th scope="col">Role</th>
               <th scope="col">Image</th>
               <th scope="col">Remove</th>
               <th scope="col">Admin</th>
               <th scope="col">Subscriber</th>
               <th scope="col">Edit</th>
              
           </tr>
       </thead>
       <tbody>
           <tr>
               <?php
                  $query="select * from users";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $id=$row['userid'];
                    $username=$row['username'];
                    $password=$row['user_password'];
                    $firstname=$row['user_firstname'];
                    $lastname=$row['user_lastname'];
                    $email=$row['user_email'];
                    $image=$row['user_image'];
                    $role=$row['user_role'];
                
               echo "<tr>";
                   echo "<td>{$id}</td>";
                   echo "<td>{$username}</td>";
                   echo "<td>{$firstname}</td>";
                    echo "<td>{$lastname}</td>";
                    echo "<td>{$email}</td>";
                    echo "<td>{$role}</td>";
                   echo "<td><img class='img-responsive' src='../images/{$image}'></td>";
                    echo "<td><a href=users.php?delete={$id}>delete</td>";
                    echo "<td><a href=users.php?roleadmin={$id}>Admin</td>";
                    echo "<td><a href=users.php?rolesub={$id}>Subscriber</td>";
                    echo "<td><a href=users.php?source=edit_user&edit={$id}>select</td>";
                  echo "</tr>";
                }
              
                 ?>  
                 <?php 
               if(isset($_GET['delete']))
                  {
                   if(isset($_SESSION['role']))
                   {
                       if($_SESSION['role']=='Admin')
                       {
                             $userid= mysqli_real_escape_string($con,$_GET['delete']);
                               $query="delete from users where userid={$userid}";
                               $delete=mysqli_query($con,$query);
                               header("Location:users.php");      

                       }
                   }
                  }
               
               ?>
               <?php
               if(isset($_GET['roleadmin']))
                  {
               $userid= $_GET['roleadmin'];
               $query="update users set user_role='Admin' where userid={$userid}";
               $update_to_admin=mysqli_query($con,$query);
               header("Location:users.php");      
                  }              
                             
              ?>
              <?php
               if(isset($_GET['rolesub']))
                  {
               $userid= $_GET['rolesub'];
               $query="update users set user_role='Subscriber' where userid={$userid}";
               $update_to_admin=mysqli_query($con,$query);
               header("Location:users.php");      
                  }              
                             
              ?>
              </tr>
           
       </tbody>
   </table>
  
                       
                    