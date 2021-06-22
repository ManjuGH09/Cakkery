<?php include('includes/login_status.php');?>
<?php include('includes/header.php');?>
<?php include('includes/navabr.php');?>
<?php include('includes/connection.php');?>
<?php  
require "includes/connection.php";
?>
       
        <div class="page-container">
            <?php include('includes/top.php'); ?>

       
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid" align="center" style="width:60rem">                                                                                                           
                            <div class="card" style="width:45rem;">
                                <div class="card-header">
                                    <strong>Profile</strong>
                                </div>                                             
                                    <form class="row contact_form" action="admin_profile.php" method="post" novalidate="novalidate">                          
                                    <div class="card-body card-block">           
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="images/user.png" alt="">
                                            </div>
                                        <div class="col-lg-7" >
							                <div class="row form-group text-center">	                                                							
									            <?php 
                                                    if(isset($_POST['update'])){
                                                        $username=$_SESSION['admin_username'];
                                                        $password=$_POST['password'];
                                                        $str="update admin_table set password='$password' where username='$username'";
                                                        if(mysqli_query($con,$str)){
                                                            $_SESSION['admin_username']=$username;                                                            
                                                            echo "<p class='text-success'>Updated Successfully.</p>";
                                                        }else{
                                                            echo "<p class='text-success'>Error in updation!</p>";
                                                        }
                                                    }
                                                
                                                ?>
                                                <div class="form-group col-lg-11  p_star">
                                                    <input type="text" class="form-control" id="username" name="username" placeholder="UserName" value="<?php echo $_SESSION['admin_username'];?>"readonly>
                                                </div>	
                                                <div class="form-group col-lg-11  p_star">
                                                    <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="<?php echo $_SESSION['password'];?>">
                                                </div>
                                                <div class="col-4"></div>
                                                <div class="form-group p_star text-center">
                                                    <input type="submit" class="btn btn-priary" id="update" name="update" value="Update">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

       
    <?php include('includes/footer.php');?>

