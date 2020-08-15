<?php
if(isset($_GET['edit']))
{ 
    $post_id=$_GET['edit'];
    
               $query="select * from posts where post_id=$post_id";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $id=$row['post_id'];
                    $title=$row['post_title'];
                    $user=$row['post_user'];
                    $dates=$row['post_date'];
                    $image=$row['post_image'];
                    $content=$row['post_content'];
                    $tags=$row['post_tags'];
                    $comment_count=$row['post_comment_count'];
                    $category_id=$row['post_cat_id'];
                }
}

?>
   
   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="">Post Title</label>
        <input value="<?php echo $title; ?>" type="text" name="post_title" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Post Category</label>
        <select name="post_cat_id" id="">
              <option value="<?php echo $category_id ?>"><?php echo $category_id ?></option>
            <?php 
                $temp_category=$category_id;
               $query="select * from category where cat_title!='$temp_category'";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {   $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                    ?>
              <option value="<?php echo $cat_title ?>"><?php echo $cat_title ?></option>
            <?php }?>
            
            
           
            
        </select>
    </div>
    <div class="form-group">
        <label for="">User</label>
        <input value="<?php echo $user; ?>" type="text" name="post_user" class="form-control" readonly>
      </div>   
     <div class="form-group">
        
    </div>
    <div class="form-group">
      <label for="">Post Image</label><br>
       <img width="500"  src="/images/<?php echo $image ?>" alt="">
       <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="">Post Comment</label>
        <textarea name="post_comment" id="" class="form-control"><?php echo $content; ?>
            
        </textarea>
        
    </div>
     <div class="form-group">
        <label for="">Post tags</label>
        <input value="<?php echo $tags; ?>" type="text" name="post_tag" class="form-control">
    </div>
  <input type="submit" name='update' class="btn btn-primary" value="Update"> 
   <?php 
if(isset($_POST['update']))
{
     $post_title=$_POST['post_title'];
    $post_category=$_POST['post_cat_id'];
    $post_user=$_POST['post_user'];
    $post_cooment=$_POST['post_comment'];
    $post_tags=$_POST['post_tag'];
    $post_date=date('dd-mm-yyyy');
    $post_comment_count=$comment_count;
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    move_uploaded_file($post_image_temp,"../images/$post_image");
    if(empty($post_image))
    {
        $query="select * from posts where post_id=$post_id";
        $change_image=mysqli_query($con,$query);
        while($row=mysqli_fetch_assoc($change_image))
        {
            $post_image=$row['post_image'];
        }
    }
    
    
    
    $query="update posts set post_cat_id='$post_category',post_title='$post_title',post_user='$post_user',post_date=now(),post_image='$post_image',post_content='$post_cooment',post_tags='$post_tags',post_comment_count='$post_comment_count' where post_id=$post_id";
    $res=mysqli_query($con,$query);
    if(!$res)
    {
        die("error".mysqli_error($con));
    }
    header("Location:sub_posts.php");
   
}



?>
   

 
   
    
    
    
</form>