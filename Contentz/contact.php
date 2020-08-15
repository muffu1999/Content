<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
  <?php
 if(isset($_POST['submit']))
 {
    $header="From:sawadiyamufaddal@gmail.com";
    $subject=$_POST['subject'];
    $body=$_POST['body'];
     $mail=mail("mufaddalsawadiya@yahoo.com",$subject,$body,$header);
     if(!$mail)
     {
         die("error".mysqli_error($con));
     }
     else
     {
         echo "sent";
     }
 }

?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container" >
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3" style="border-radius:10px;border: 1px solid;padding: 10px;  box-shadow: 5px 10px 18px black;" >
                   <h1 class="text-center">Contact</h1>
                    <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                         <div class="form-group">
                          <input type="email" name="email" id="email" class="form-control" placeholder="Your email" required>
                        </div>
                        <div class="form-group">
                           <input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject" required>
                        </div>
                        
                         <div class="form-group">
                           <textarea class="form-control" name="body" id="" placeholder="Your Message" style="resize:none;"></textarea>
                           </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-block"  value="Get in Touch">
                    </form>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
