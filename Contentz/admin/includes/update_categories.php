 <form action="" method="post">
                               <div class="form-group">
                                  <label for="">Category Title</label>
                                  
                                   <?php 
                            if(isset($_GET['edit']))
                            {
                                 $cat_edit=$_GET['edit'];
                                 $query="select * from category where cat_id=$cat_edit";
                                 $result=mysqli_query($con,$query);
                                   while($row=mysqli_fetch_assoc($result))
                                  {   $cat_id=$row['cat_id'];
                                      $cat_title=$row['cat_title'];
                                   ?>
                                   
                             <input type="text" name=category class="form-control" value="<?php  echo $cat_title; ?>">

                                   
                                <?php  }}?>
                                 <?php 
                               if(isset($_POST['edit']))
                               {
                                   $category_title=$_POST['category'];
                                                                      
                               $query="update category set cat_title='$category_title' where cat_id=$cat_id";
                               $result=mysqli_query($con,$query);
                               header("Location:categories.php");    
                                   
                               }
                               ?>
                              

                               </div>
                               <input type="submit" class="btn btn-primary" name="edit" value="Edit Category">
                              
                               
                           </form>