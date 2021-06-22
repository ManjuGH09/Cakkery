<?php include('includes/login_status.php');?>
<?php include('includes/header.php');?>
<?php include('includes/navabr.php');?>
<?php include('includes/connection.php');?>

        
        <div class="page-container">
            <?php include('includes/top.php'); ?>

        
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <?php 
                                $str="select * from feedback_table";
                                $res=mysqli_query($con,$str);
                                $n=mysqli_num_rows($res);                                
                                ?>
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $n;?></h2>
                                                <span>Feedback</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <?php 
                                $str="select * from sales_table";
                                $res=mysqli_query($con,$str);
                                $n=mysqli_num_rows($res);                                
                                ?>
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-shopping-cart"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $n;?></h2>
                                                <span>Total Orders</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <?php 
                                $str="select * from product_table";
                                $res=mysqli_query($con,$str);
                                $n=mysqli_num_rows($res);                                
                                ?>
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $n;?></h2>
                                                <span>Products</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                            <?php 
                                $str="select * from user_table";
                                $res=mysqli_query($con,$str);
                                $n=mysqli_num_rows($res);                                
                                ?>
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $n;?></h2>
                                                <span>Users</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                            <!--<?php 
                                $str="select * from feedback_table";
                                $res=mysqli_query($con,$str);
                                $n=mysqli_num_rows($res);                                
                                ?>
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="fa fa-comments"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?php echo $n;?></h2>
                                                <span>Feedback</span>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart3"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                        

              
              
            </div>
          </div>                        
                    </div>
                </div>
            </div>
            
        </div>

       
    <?php include('includes/footer.php');?>

