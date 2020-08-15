           <?php ob_start(); ?>
           <?php include "includes/header.php"; ?>
           
           
            <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>
       
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Page
                            <small>Subheading</small>
                        </h1>
                       
                       
                     <table class="table table-bordered table-hover">
       <thead >
           <tr>
                
               <th scope="col">Author</th>
               <th scope="col">comment</th>
               <th scope="col">Email</th>
               <th scope="col">Date</th>
               
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
                       echo "<td>$comment_author</td>";
                       echo "<td>$comment_content</td>";
                       echo "<td>$comment_email</td>";
                        echo "<td>$comment_date</td>";
                       echo "</tr>";
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
        

   <?php include "includes/footer.php" ?>
   