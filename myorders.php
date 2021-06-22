<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
	
	<section class="section_gap_bottom"><br>
		<div class="container"><br>
			<div class="row">
				<div class="card col-lg-7 col-md-5 col-sm-6 mb-20">
					<div class=" order_details_table">
						<h2  align="center">Your Orders</h2><hr class="text-dark">
						<div class="order_box">
                            <div class="row">
                                <form action="my_orders.php?<?php echo $id;?>" method="post">                                    
                                        <div class="row">
                                            <?php 
                                                require "includes/connection.php";
                                                $email=$_SESSION['email'];
                                                $str="select * from sales_table where email_id='$email'";
                                                $res=mysqli_query($con,$str);
                                                if(mysqli_num_rows($res)>0)
                                                {
                                                    for($i=0;$i<mysqli_num_rows($res);$i++){
                                                        $row1=mysqli_fetch_array($res);                                                        
                                            ?>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="single-related-product d-flex btn btn-outline-warning">
                                                <a href="myorders.php?logid=<?php echo $id;?>&orderid=<?php echo $row1['order_id']; ?>" class="nav-link text-secondary">
                                                    <div class="desc">                                                        
                                                        <div class="name">
                                                            <h6><?php echo $row1['order_id']; ?></h6>
                                                            <h6><?php echo $row1['product_name']; ?></h6>
                                                        </div>
                                                    </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <?php }}else{
                                                echo "No Orders";
                                            } ?>
                                        </div>                                    
                                </form>
                            </div>
						</div>
					</div>
				</div>
				
                            <?php  
                                require "includes/connection.php";
                                if(isset($_GET['orderid'])){
                                    $orderid=$_GET['orderid'];
                                    $str="select * from sales_table where order_id='$orderid'";                                    
                                    $res=mysqli_query($con,$str);
                                    $row1=mysqli_fetch_assoc($res);
                                    ?>
                                    <div class=" col-lg-5 col-md-5 col-sm-6 mb-20">
					<div class="card order_details_table text-dark btn">
						<h2  align="center">Order Details</h2><hr>
						<div class="order_box ">
                                    <ul class="list card btn-outline-secondary text-left">
                                <pre>   <li>Order ID     :<?php echo  $row1['order_id']; ?></li>
                                        <li>Product Name :<?php echo  $row1['product_name']; ?></li>
                                        <li>Email ID     :<?php echo  $row1['email_id']; ?></li>
                                        <li>Address      :<?php echo  $row1['address']; ?></li>
                                        <li>Price        :<?php echo  "Rs.".$row1['total_price']; ?></li>
                                        <li>Order Date   :<?php echo  $row1['date']; ?></li></pre>
                                    </ul>
                            
						</div>
					</div>
                </div>
                <?php } ?>
			</div>
		</div>
	</section><br>
	
	
	<?php include('includes/footer.php');?>
