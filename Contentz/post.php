
   <?php include "includes/header.php"; ?>
    <!-- Navigation -->
    
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
               
                <?php
                 if(isset($_GET['p_id'])){
                $the_post_id=$_GET['p_id'];
                 }
               $post_views="update posts set post_views_count=post_views_count+1 where post_id=$the_post_id";
                $result_views=mysqli_query($con,$post_views);     
                  $query="select * from posts where post_id=$the_post_id";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {
                    $title=$row['post_title'];
                    $author=$row['post_user'];
                    $dates=$row['post_date'];
                    $image=$row['post_image'];
                    $content=$row['post_content'];
                 ?>   
                  
                <h1 class="page-header">
                   Post
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                        by <a href="author.php?name=<?php echo $author ?>"><?php echo $author ?></a>
                   
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $dates ?></p>
                <hr>
                <a href="">
                <img class="img-responsive" src="images/<?php echo $image; ?>" alt="image">
                </a>
                <hr>
                <p><?php echo $content ?></p>
                <hr>  
                <p class="text-right"><a class="like" href="#" ><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></p>
                <p class="text-right">Likes:2</p>
                    
               <?php } ?>
                <!-- Blog Comments -->

                <!-- Comments Form -->
                
                <?php 
                   if(isset($_POST['create']))
                   {
                       $the_post_id=$_GET['p_id'];
                       $comment_author=$_POST['author'];
                       $comment_email=$_POST['email'];
                       $comment_content=$_POST['comment'];
                       $query="insert into comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) values($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','approved',now())";
                       $result=mysqli_query($con,$query);
                       if($result)
                       {
                           echo "<script>alert('Comment Added')</script>";
                       }
                       $query2="update posts set post_comment_count= post_comment_count + 1 where post_id=$the_post_id";
                       $result2=mysqli_query($con,$query2);
                   }
                  
                
                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post" >
                       <div class="form-group">
                           <label for="author">Author</label><br>
                            <input type="text" name="author" class="form-control" required>
                        </div>
                       <div class="form-group">
                           <label for="email">Email</label><br>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                           <label for="comment">Your Comment</label>
                            <textarea class="form-control" rows="3" name="comment" style="resize:none" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                $the_post_id=$_GET['p_id'];
                $query="select * from comments where comment_post_id={$the_post_id } and comment_status='approved' order by comment_id desc";
                $display_comments_aproved=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($display_comments_aproved))
                {
                    $the_comment_author=$row['comment_author'];
                    $the_comment_date=$row['comment_date'];
                    $the_comment_content=$row['comment_content'];
                    ?>
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $the_comment_author ?>
                            <small><?php echo $the_comment_date  ?></small>
                        </h4>
                        <?php  echo $the_comment_content ?>
                        </div>
                </div>

                    
               <?php }?>
                
               
                <!-- Comment -->
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            
        </div>
        <!-- /.row -->

        <hr>

        <?php include "includes/footer.php"; ?>
      