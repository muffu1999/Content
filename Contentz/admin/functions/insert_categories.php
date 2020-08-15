                       <?php  
function insert_cat()
    {
                                        global $con;
                               if(isset($_POST['submit']))
                               {
                                   $title=$_POST['category'];
                                   $query="insert into category(cat_title) values('$title')";
                                   mysqli_query($con,$query);

                               }
}
                           
                         ?>
                          