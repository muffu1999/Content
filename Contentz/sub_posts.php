         <?php include "includes/header.php"; ?>
           
            <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/navigation.php"; ?>
       
        <div id="page-wrapper">
            <?php
if(!isset($_SESSION['role'])&&$_SESSION['role']===null)
{
    header("Location:index.php");
}


?>                    
                      
  

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header text-center">
                        <?php echo "Welcome ".$_SESSION['username']; 
                            ?>
                        </h1>
                       <div class="col-md-12">
                           <?php 
                           
                             if(isset($_GET['source']))
                             {
                                 $source=$_GET['source'];
                             }else{ $source='';}
                                 
                                 switch($source)
                                 {
                                         
                                     case 'add_post':
                                     include "includes/sub_add_post.php";   
                                     break;    
                                     case 'edit_post':
                                     include "includes/sub_update_post.php";
                                     break;    
                                     default :
                                      include "includes/sub_view_all_posts.php";   
                                         
                                 }
                             
                           ?>   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        

   <?php include "includes/footer.php" ?>
   