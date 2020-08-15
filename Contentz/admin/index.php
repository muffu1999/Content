<?php include "includes/admin_header.php"; ?>
<!--
<?php 
      if($_SESSION['role']==null||$_SESSION['role']=='Subscriber')
      {
          header("Location:../index.php");
  }

?>           
-->
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
                       
                       </div>
                </div>
                <!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                     $query="select * from posts";
                     $result_posts=mysqli_query($con,$query);
                    $count1=mysqli_num_rows($result_posts); 
                    echo "<div class='huge'>$count1</div>";
                     ?>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php 
                     $query="select * from comments";
                     $result_comments=mysqli_query($con,$query);
                    $count2=mysqli_num_rows($result_comments); 
                     echo "<div class='huge'>$count2</div>";
                     ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php 
                     $query="select * from users";
                     $result_users=mysqli_query($con,$query);
                    $count3=mysqli_num_rows($result_users); 
                    echo "<div class='huge'>$count3</div>";
                    ?>
                    
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php 
                     $query="select * from category";
                     $result_categories=mysqli_query($con,$query);
                    $count4=mysqli_num_rows($result_categories); 
                    echo "<div class='huge'>$count4</div>";
                    ?>
                       
                       
                        
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
          
           <?php 
                     $query1="select * from posts where post_status='draft'";
                     $result_draft_posts=mysqli_query($con,$query1);
                    $count1_draft=mysqli_num_rows($result_draft_posts); 
                   
           ?>
           <?php 
                     $query1="select * from posts where post_status='published'";
                     $result_published_posts=mysqli_query($con,$query1);
                    $count1_published=mysqli_num_rows($result_published_posts); 
                   
           ?>
           
           <?php 
                     $query2="select * from comments where comment_status='unapproved'";
                     $result_unapproved_comments=mysqli_query($con,$query2);
                    $count2_unapproved=mysqli_num_rows($result_unapproved_comments); 
                   
           ?>
           <?php 
                     $query3="select * from users where user_role='Subscriber'";
                     $result_subscribers=mysqli_query($con,$query3);
                    $count3_subscribers=mysqli_num_rows($result_subscribers); 
                   
           ?>
           
           <div class="row">
              
     <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data','count'],
            <?php 
            $title=['All posts','Published Posts','Draft Posts','Comments','Unapproved comments','Users','Subscribers','Categories'];
            $title_count=[$count1,$count1_published,$count1_draft,$count2,$count2_unapproved,$count3,$count3_subscribers,$count4];
            for($i=0;$i<8;$i++)
            {
            echo "['{$title[$i]}'".","."{$title_count[$i]}],";    
            }
            
            
            ?>
            
          //['posts',1000],
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
<div id="columnchart_material" style="width:'auto'; height: 500px;"></div>  
               
           </div>
           
           
           
           
           </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>