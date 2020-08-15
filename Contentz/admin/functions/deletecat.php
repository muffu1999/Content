 <?php   
function delete_categories(){
global $con;
                        if(isset($_GET['delete']))
                               { 
                            $cat_id=$_GET['delete'];
                            $select_title="select cat_title from category where cat_id={$cat_id}";
                            $result=mysqli_query($con,$select_title);
                            $row=mysqli_fetch_assoc($result);
                            $title=$row['cat_title'];
                            $query="delete from category where cat_id={$cat_id}";
                            $delete=mysqli_query($con,$query);
                            $query2="delete from posts where post_cat_id='$title'";
                            $result2=mysqli_query($con,$query2);
                            
                             header("Location:categories.php");
                               }
}
                               ?>
                           