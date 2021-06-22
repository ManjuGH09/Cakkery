<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php');include('includes/connection.php'); ?>



<section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container row">
        <nav class="navbar navbar-light">
          <div class="container-fluid">
          <h2>Cart Products</h2>             
          </div>
        </nav>                          
      </div>
      <div class="row">
      
    <?php 
      if(isset($_GET['logid']))
      {
        $id=$_GET['logid'];
      }
      if($id==0)
      {
        echo "<script>alert('Please login to view your cart/wishlist')</script>";
      }else{
        $email=$_SESSION['email'];
        $str="select * from cart_table where email_id='$email'";
        $res=mysqli_query($con,$str);              
        $n=mysqli_num_rows($res);
                    if(mysqli_num_rows($res)>0)
                    {                
                 echo '<a href="checkout.php?logid=1" class="btn1 text-center">
                      <button type="button" class="btn btn-warning">Buy All</button>
                      </a>';                                                                     
                      for($i=0;$i<mysqli_num_rows($res);$i++)
                      {
                        $row1=mysqli_fetch_assoc($res);
                      $name=$row1['product_name'];
                      $str1="select * from product_table where name='$name'";
                      $res1=mysqli_query($con,$str1);
                      $row=mysqli_fetch_assoc($res1);
                                        
                  ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                      <div class="box">
                        <a href="product_view.php?logid=<?php echo $id;?>&name=<?php echo $row['name'];?>" class="nav-link">
                          <div>
                            <div class="img-box">
                            <?php echo "<img src='Admin/uploads/".$row['image']."' alt='' width='200rem'>"; ?>
                            </div>
                            <div class="detail-box">                  
                              <p style="color:black"><b> <?php echo $row['name'];?></b></p>                  
                            </div>
                          </div>
                        </a>            
                      </div>
                    </div>                                 
                        <?php }}else{
                        ?>
                        <div class="col-md-7 col-lg-12 text-center">                                                                                         
                                <h4 style="color: white;">No Items in the Cart</h4> <br>   
                                <a  href="product.php?logid=<?php echo $id;?>">
                                  <button type="button" class="btn btn-warning">Add Products</button>
                                </a>                                            
                        </div> 
                        <?php }}?>                                                        
                </div>                           
              </div>
        </section> 


<?php include('includes/footer.php'); ?>