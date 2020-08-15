           <?php ob_start(); ?>
           <?php include "includes/admin_header.php"; ?>
           <?php include "functions/insert_categories.php"; ?>
           <?php include "functions/dispcat.php"; ?>
           <?php include "functions/deletecat.php"; ?>
           <?php 
      if($_SESSION['role']==null)
      {
          header("Location:../index.php");
  }

?>           

           
           
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
                       
                       
                       <div class="col-md-6">
                           
                           <?php insert_cat(); ?>
                           <form action="" method="post">
                               <div class="form-group">
                                  <label for="">Category Title</label>
                                   <input type="text" name=category class="form-control" required title="This should not be blank">
                               </div>
                               <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                       
                               
                           </form>
                          <?php 
                           
                           if(isset($_GET['edit']))
                           {
                               $cat_id=$_GET['edit'];
                               include "includes/update_categories.php";
                           }
                           ?>
                       
                       </div>
                       
                       <div class="col-md-6">
                       <table class="table table-bordered table-hover">
                       <thead>
                           <tr>
                               <th scope="col">Category Id</th>
                               <th scope="col">Category Title</th>
                               <th scope="col">Remove</th>
                               <th scope="col">Edit</th>
                            </tr>
                       </thead>
                       
                           
                           
                           
                       <tbody>
                           <tr>
                               
                               <?php display(); ?>
                               <?php delete_categories(); ?>
                       
                               </tr>
                          
                   </table>

             </div>
                       
                       
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

   <?php include "includes/admin_footer.php" ?>