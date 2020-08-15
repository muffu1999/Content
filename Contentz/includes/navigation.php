<?php include "includes/db.php";?>
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <?php 
                    if(isset($_SESSION['role'])&&$_SESSION['role']=='Subscriber')
                    {?>
                   <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">Posts <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li class="dropdown-item"><a href="sub_posts.php">View All Posts</a></li>
                          <li class="dropdown-item"><a href="sub_posts.php?source=add_post">Add Post</a></li>
                      </ul>
                       
                   </li> 
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php if(isset($_SESSION['username']))
                                    {
                                        echo $_SESSION['username'];
                                    }
                    ?>
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="sub_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                            <li>
                            <a href="changepassword.php"><i class="fa fa-fw fa-lock"></i>Change Password</a>
                        </li>
                    <li class="divider"></li>
                        <li>
                            <a href="admin/includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                        
                    </ul>
                </li>
                
                <?php } ?>
                 <?php 
                    if(isset($_SESSION['role'])&&$_SESSION['role']=='Admin')
                    {?>
                    <li><a href="admin/index.php">Admin</a></li>
                    <?php }?>
                    <li><a href="contact.php">Contact</a></li>
                    
                    
                </ul>
            </div>
            
               
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

