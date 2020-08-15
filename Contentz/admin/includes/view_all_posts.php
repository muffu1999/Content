<?php
if(isset($_POST['checkboxArray']))
{
    foreach($_POST['checkboxArray'] as $checkboxValue)
    {
     
      $bulk_options=$_POST['bulk'];
        switch($bulk_options)
        {
            case 'Published':
            $query_to_publish="update posts set post_status='$bulk_options' where post_id=$checkboxValue";
            $result=mysqli_query($con,$query_to_publish);
            break;
            case 'Draft':
            $query_to_draft="update posts set post_status='$bulk_options' where post_id=$checkboxValue";
            $result=mysqli_query($con,$query_to_draft);
            break;
            case 'Delete':
            $query_to_delete="delete from posts where post_id=$checkboxValue";
            $result=mysqli_query($con,$query_to_delete);
            break;   
            default:
                echo "<script>alert('please select activity to be performed');</script>";
        }
    }
}


?> 
    
    
    <form action="" method="post">
     
     <div class="col-md-4">
         <select name="bulk" id="" class="form-control">
         <option value="">Select</option>
         <option value="Published">Publish</option>
         <option value="Draft">Draft</option>
         <option value="Delete">Delete</option>
         </select>
     </div>
     <input class="btn btn-primary" type="submit" name="submit" value="Apply">
     <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
      <table class="table table-bordered table-hover">
       <thead >
           <tr>
               <th scope="col"><input type="checkbox" id="select" onclick="check()"></th> 
               <th scope="col">ID</th>
               <th scope="col">Title</th>
               <th scope="col">Users</th>
               <th scope="col">Date</th>
               <th scope="col">Image</th>
               <th scope="col">Comment</th>
               <th scope="col">Status</th>
               <th scope="col">Comments Count</th>
               <th scope="col">Tags</th>
               <th scope="col">Category</th>
               <th scope="col">Views Count</th>
               <th scope="col">View Post</th>
               <th scope="col">Remove</th>
               <th scope="col">Edit</th>
           </tr>
       </thead>
       <tbody>
           <tr>
               <?php
                  $query="select * from posts";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $id=$row['post_id'];
                    $title=$row['post_title'];
                    $author=$row['post_user'];
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
                   ?>
                   <td><input type="checkbox" class="boxes" name="checkboxArray[]" value="<?php echo $id ?>"></td>
                   <?php 
                    
                   echo "<td>{$id}</td>";
                   echo "<td>{$title}</td>";
                    echo "<td>{$author}</td>";
                   echo "<td>{$dates}</td>";
                   echo "<td><img class='img-responsive' src='../images/{$image}'></td>";
                   echo "<td>{$content}</td>";
                   echo "<td>{$status}</td>";
                   echo "<td><a href='../admin/specific_post_comments.php?p_id=$id'>{$count}</a></td>";
                   echo "<td>{$tags}</td>";
                   echo "<td>{$category_id}</td>";
                   echo "<td>{$post_views}</td>";
                   echo "<td><a href=../post.php?p_id={$id}>View Post</td>";
                    echo "<td><a href='' data-toggle='modal' data-target='#myModal'>delete</a></td>";
//                    echo "<td><a onclick=\"javacript: return confirm('Are you sure you want delete?');\" href=posts.php?delete={$id}>delete</td>";
                    echo "<td><a href=posts.php?source=edit_post&edit={$id}>select</td>";
                    echo "</tr>";
                }
              
                 ?>  
                 <?php 
               if(isset($_GET['delete']))
                  {
               $post_id= $_GET['delete'];
               $query="delete from posts where post_id={$post_id}";
               $delete=mysqli_query($con,$query);
               header("Location:posts.php");      
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
       <a class="btn btn-danger" href="posts.php?delete=<?php echo $id?>">Yes</a>
        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
      </div>
    </div>

  </div>
</div> 

