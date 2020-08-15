<?php
function display()
{
    
                               global $con;
                           
                    $query="select * from category";
                    $result=mysqli_query($con,$query);
                    while($row=mysqli_fetch_assoc($result))
                    {   $cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                     echo "<tr>";
                     echo "<td>{$cat_id}</td>";
                     echo "<td>{$cat_title}</td>";
                     echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
                     echo "<td><a href='categories.php?edit={$cat_id}'>Select</a></td>";
                     echo "</tr>";   
                    }
                   
    
}

?>