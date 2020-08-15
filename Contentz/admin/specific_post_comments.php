           <?php ob_start(); ?>
           <?php include "includes/admin_header.php"; ?>
           <?php 
      if($_SESSION['role']==null||$_SESSION['role']=='Subscriber')
      {
          header("Location:../index.php");
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
                        
                       
                     <table class="table table-bordered table-hover">
       <thead >
           <tr>
                
               <th  scope="col">ID</th>
               <th scope="col">Author</th>
               <th scope="col">comment</th>
               <th scope="col">Email</th>
               <th scope="col">Status</th>
               <th scope="col">In response to</th>
               <th scope="col">Date</th>
               <th scope="col">Approve</th>
               <th scope="col">UNApprove</th>
               <th scope="col">Delete</th>
           </tr>
       </thead>
       <tbody>
           <tr>
              <?php
               if(isset($_GET['p_id']))
             {
                   $the_post_id=$_GET['p_id'];
                   
               }
               ?>
               <?php
                  $query="select * from comments where comment_post_id=$the_post_id";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $comment_id=$row['comment_id'];
                    $comment_post_id=$row['comment_post_id'];
                    $comment_author=$row['comment_author'];
                    $comment_email=$row['comment_email'];
                    $comment_content=$row['comment_content'];
                    $comment_status=$row['comment_status'];
                    $comment_date=$row['comment_date'];
                   
                       echo "<tr>";
                       echo "<td>$comment_id</td>";
                       echo "<td>$comment_author</td>";
                       echo "<td>$comment_content</td>";
                       echo "<td>$comment_email</td>";
                       echo "<td>$comment_status</td>";
                    
                    $query="select * from posts where post_id=$comment_post_id";
                    $get_title=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($get_title))
                    {
                        $post_id=$row['post_id'];
                        $post_title=$row['post_title'];
                    
                        echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//                        
                    }
                    
//                    echo "<td>'some title'</td>";
                       echo "<td>$comment_date</td>";
                       echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>"; 
                       echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>"; 
                       echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>"; 
                       echo "</tr>";
                }
              
                 ?>
                 <?php 
               if(isset($_GET['approve']))
                  {
               $the_comment_id= $_GET['approve'];
               $query="update comments set comment_status='approved' where comment_id={$the_comment_id}";
               $approve=mysqli_query($con,$query);
               header("Location:comments.php");      
                  }
               
               ?>  
                 
                 <?php 
               if(isset($_GET['unapprove']))
                  {
               $the_comment_id= $_GET['unapprove'];
                $query="update comments set comment_status='unapproved' where comment_id={$the_comment_id}";
               $unapprove=mysqli_query($con,$query);
               header("Location:comments.php");      
                  }
               
               ?>
                 <?php 
               if(isset($_GET['delete']))
                  {
               $the_comment_id= $_GET['delete'];
                $query="delete from comments where comment_id={$the_comment_id}";
               $unapprove=mysqli_query($con,$query);
               header("Location:comments.php");      
                  }
               
               ?>
              
              </tr>
           
       </tbody>
   </table>
  
                       
                    
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

   <?php include "includes/admin_footer.php" ?>
   