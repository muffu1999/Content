    <?php 
if(isset($_SESSION['role'])&&$_SESSION['role']=='Subscriber')
{  $users=$_SESSION['username'];}
?>
    
    <form action="" method="post">
     
      <table class="table table-bordered table-hover">
       <thead >
           <tr>
               
               <th scope="col">ID</th>
               <th scope="col">Title</th>
               <th scope="col">Date</th>
               <th scope="col">Image</th>
               <th scope="col">Comment</th>
               <th scope="col">Status</th>
               <th scope="col">Comments Count</th>
               <th scope="col">Tags</th>
               <th scope="col">Category</th>
               <th scope="col">Views Count</th>
                <th scope="col">Remove</th>
               <th scope="col">Edit</th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <?php
                  $query="select * from posts where post_user='$users'";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $id=$row['post_id'];
                    $title=$row['post_title'];
                    $user=$row['post_user'];
                    $dates=$row['post_date'];
                    $image=$row['post_image'];
                    $content=$row['post_content'];
                    $status=$row['post_status'];
                    $count=$row['post_comment_count'];
                    $tags=$row['post_tags'];
                    $category_id=$row['post_cat_id'];
                    $post_views=$row['post_views_count'];
                
                   echo "<tr>";
                   echo "<td>{$id}</td>";
                   echo "<td>{$title}</td>";
                    echo "<td>{$dates}</td>";
                   echo "<td><img class='img-responsive' src='images/{$image}'></td>";
                   echo "<td>{$content}</td>";
                   echo "<td>{$status}</td>";
                   echo "<td><a href='sub_post_comments.php?p_id=$id'>{$count}</a></td>";
                   echo "<td>{$tags}</td>";
                   echo "<td>{$category_id}</td>";
                   echo "<td>{$post_views}</td>";
                    echo "<td><a href='' data-toggle='modal' data-target='#myModal'>delete</a></td>";
//                    echo "<td><a onclick=\"javacript: return confirm('Are you sure you want delete?');\" href=posts.php?delete={$id}>delete</td>";
                    echo "<td><a href=sub_posts.php?source=edit_post&edit={$id}>select</td>";
                    echo "</tr>";
                }
              
                 ?>  
                 <?php 
               if(isset($_GET['delete']))
                  {
               $post_id= $_GET['delete'];
               $query="delete from posts where post_id={$post_id}";
               $delete=mysqli_query($con,$query);
               header("Location:sub_posts.php");      
                  }
               
               ?>
              </tr>
           
       </tbody>
   </table>
  </form>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Confirmation</h4>
      </div>
      <div class="modal-body">
            <h3>Are you sure you want to delete?</h3>
        </div>
      <div class="modal-footer">
       <a class="btn btn-danger" href="sub_posts.php?delete=<?php echo $id?>">Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div> 

