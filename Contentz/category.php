
   <?php include "includes/header.php"; ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
                <?php
                if(isset($_GET['cat_title']))
                {
                    $the_cat_title=$_GET['cat_title'];
                }
                  $query="select * from posts where post_cat_id='$the_cat_title' And post_status='Published'" ;
                  $result=mysqli_query($con,$query);
                  $count=mysqli_num_rows($result);
                   if($count<1)
                    { echo " <marquee scrollamount=12>No Posts Available Related to this Category</marquee>"; }

                        while($row=mysqli_fetch_assoc($result))
                        {   $id=$row['post_id'];
                            $title=$row['post_title'];
                            $author=$row['post_user'];
                            $dates=$row['post_date'];
                            $image=$row['post_image'];
                            $content=substr($row['post_content'],0,100);
                         ?>   
                  
                <h1 class="page-header">
                    Posts
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $id?>"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="#"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $dates ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $image; ?>" alt="image">
                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>  
                <?php }?>
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            
        </div>
        <!-- /.row -->

        <hr>
        

        <?php include "includes/footer.php"; ?>