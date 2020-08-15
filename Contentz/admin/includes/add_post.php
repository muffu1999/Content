<?php 
if(isset($_SESSION['role'])&&$_SESSION['role']=='Admin')
{
    $user=$_SESSION['username'];
}
?>



<?php
if(isset($_POST['submit']))
{
    $post_title=$_POST['post_title'];
    $post_category=$_POST['post_cat_id'];
    $post_user=$_POST['post_user'];
    $post_status=$_POST['post_status'];
    $post_cooment=$_POST['post_comment'];
    $post_tags=$_POST['post_tag'];
    $post_date=date('dd-mm-yyyy');
    $post_cooment_count=0;
    $post_image=$_FILES['post_image']['name'];
    $post_image_temp=$_FILES['post_image']['tmp_name'];
    move_uploaded_file($post_image_temp,"../images/$post_image");
    $query="insert into posts(post_cat_id,post_title,post_user,post_date,post_image,post_content,post_tags,post_comment_count,post_status) values('{$post_category}','{$post_title}','{$post_user}',now(),'{$post_image}','{$post_cooment}','{$post_tags}','{$post_cooment_count}','{$post_status}')";
    $insert=mysqli_query($con,$query);
    if($insert)
    {
        echo "<script>alert('record inserted')</script>";
    }
}



?>
   

   
  <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>
   <div class="form-group">
        <label for="">Post Category</label>
        <select name="post_cat_id" id="">
            <?php 
               $query="select * from category";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {   $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                    ?>
              <option value="<?php echo $cat_title?>"><?php echo $cat_title ?></option>
            <?php }?>
        </select>
      </div>
      <div class="form-group">
        <label for="">User</label>
         <input type="text" name="post_user" class="form-control" value="<?php echo $user; ?>" readonly>
       </div>
     
     <div class="form-group">
        <label for="">Post Status</label>
        <select name="post_status" id="">
            <option value="Published">Select</option>
            <option value="Published">Publish</option>
            <option value="Draft">Draft</option>
        </select>
    </div>
    <div class="form-group">
        <label for="">Post Image</label>
        <input type="file" name="post_image">
        
    </div>
    <div class="form-group">
        <label for="">Post Comment</label>
        <input type="text" name="post_comment" class="form-control">
    </div>
     <div class="form-group">
        <label for="">Post tags</label>
        <input type="text" name="post_tag" class="form-control">
    </div>
  <input type="submit" name='submit' class="btn btn-primary" value="publish"> 
   
    
    </form>