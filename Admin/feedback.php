<?php include('includes/login_status.php');?>
<?php include('includes/header.php'); ?>
<?php include('includes/navabr.php'); ?>

        
        <div class="page-container">
            
        <?php include('includes/top.php'); ?>
        
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                             
                                <div class="user-data">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>User Reviews</h3>
                                    <div class="table-responsive table-data">
                                        <table class="table">                                            
                                            <tbody>
                                                <?php require "includes/connection.php";
                                                    $str="select * from feedback_table";
                                                    $res=mysqli_query($con,$str);
                                                    $n=mysqli_num_rows($res);
                                                    if($n > 0)
                                                    {   
                                                        for($i=0;$i<$n;$i++)
                                                        {
                                                        $row=mysqli_fetch_array($res);?>
                                                        <div class="container">
                                                        <div class="card" width="100rem">
                                                            <div class="card-header">
                                                                <h4><?php echo $row['name'];?></h4>                                                                
                                                                <h6><?php echo $row['email_id'];?></h6>
                                                            </div>
                                                            <div class="card-body">
                                                                <blockquote class="blockquote mb-0">
                                                                <p><?php echo $row['message'];?></p>                                                                
                                                                </blockquote>
                                                            </div>
                                                        </div>
                                                        </div>                                                        
                                                        <?php
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        if(isset($_GET['m']))
        {
            $mail=$_GET['m'];
            $str="delete from user_table where email_id='$mail'";
            if(mysqli_query($con,$str))
            {
                echo "<script> location.href='users.php'; </script>";
            }
        }
        ?>
        <?php include('includes/footer.php'); ?>