
   <?php include "includes/header.php"; ?>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                
                if(isset($_POST['submit']))
                {
                    
                    $search=$_POST['search'];
                    $query="select * from posts where post_tags like '%$search%'";
                    $search_post=mysqli_query($con,$query);
                    $count=mysqli_num_rows($search_post);
                    
                    if($count<1)
                      { echo " <marquee scrollamount=12>No Results found</marquee>"; }
                   
                       $query="select * from posts where post_tags like '%$search%'";
                  $result=mysqli_query($con,$query);
                while($row=mysqli_fetch_assoc($result))
                {  
                    $id=$row['post_id'];
                    $title=$row['post_title'];
                    $author=$row['post_user'];
                    $dates=$row['post_date'];
                    $image=$row['post_image'];
                    $content=$row['post_content'];
                 ?>   
                  
                <h1 class="page-header">
                  Posts
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $id ?>"><?php echo $title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $dates ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $image; ?>" alt="image">
                <hr>
                <p><?php echo $content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>  
                    
                    
               <?php }
                
                    }
                    
                
                   
               ?>     
             </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            
        </div>
        <!-- /.row -->

        <hr>
        
        

        <?php include "includes/footer.php"; ?>