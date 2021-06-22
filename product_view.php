<?php include('includes/header.php');?>
<?php include('includes/navbar.php');
        include('includes/connection.php');
?>
    <section class="slider_section text-center"  style="background-color: white;">   
        <div class="container text-center"> 
        <form action="" method="post">

        <?php 
            if(isset($_GET['name']))    
            {
                $name=$_GET['name']; 
                $id=$_GET['logid'];                
                $email=$_SESSION['email'];
                //$quantity="select quantity from product_table where product_name='$name'";
                $str1="select * from cart_table where product_name='$name' and email_id='$email'";
                $res1=mysqli_query($con,$str1);   
                if(mysqli_num_rows($res1)>0)
                {
                    $row=mysqli_fetch_assoc($res1);
                    $quan=$row['quantity'];
                    $temp=true;
                }else{
                    $quan=1;
                    $temp=false;
                }                           
                $str="select * from product_table where name='$name'";
                $res=mysqli_query($con,$str);
                $row=mysqli_fetch_assoc($res); 
                if(isset($_POST['remove']))    
                {
                if($_SESSION['log_status']==true)
                {                    
                    $email=$_SESSION['email'];
                    $name=$_GET['name'];
                    $str="delete from cart_table where product_name='$name' and email_id='$email'";      
                    if(mysqli_query($con,$str))
                        {   
                            $temp=false;
                            $quan=1;
                        echo "<script>alert('".$name." removed successfully from cart')</script>";
                    }
                    
                    
                }  else{
                    echo "<script>alert('Login/Register before  remove from wishlist')</script>";
                }                                                     
            }                
                /*$q = $row['quantity'];
                if($quan<=$q){*/
                    if(isset($_POST['update']))    
                {
                    if($_SESSION['log_status']==true)
                    {                    
                        $email=$_SESSION['email'];
                        $name=$_GET['name'];
                        $str="select * from cart_table where product_name='$name' and email_id='$email'";
                        $res=mysqli_query($con,$str);
                        //$q=$res1['quantity'];
                        if(mysqli_num_rows($res)==0)
                        {   $temp=true;                        
                            echo "<script>alert('".$name." not added to cart')</script>";
                        }else{
                            $n=$_POST['quan'];
                            if($n=="" or $n<=0){
                                echo "<script>alert('quantity must be 1 or more')</script>";
                            }
                            else{
                                $str="Update cart_table set quantity='$n' where email_id='$email' and product_name='$name'";
                                if(mysqli_query($con,$str))
                                {
                                    $temp=true;
                                    $quan=$n;
                                    echo "<script>alert('".$name." quantity updated successfully')</script>";
                                }
                            }                    
                        }
                        
                    }else{
                        echo "<script>alert('Login/Register before add to wishlist')</script>";
                }    }                   
                if(isset($_POST['add']))    
                {
                if($_SESSION['log_status']==true)
                {                    
                    $email=$_SESSION['email'];
                    $name=$_GET['name'];
                    $qu=$row['quantity'];
                    $str="select * from cart_table where product_name='$name' and email_id='$email'";
                    $res=mysqli_query($con,$str);
                    if(mysqli_num_rows($res)>0)
                    {   $temp=true;                        
                        echo "<script>alert('".$name." already added to cart')</script>";
                    }else{
                        $n=$_POST['quan'];
                        if($n=="" or $n<=0){
                            echo "<script>alert('quantity must be 1 or more')</script>";
                        }
                        else{
                            $total=$qu-$n;
                            $str="Update product_table set quantity='$total' where product_name='$name'" ;
                            $str="insert into cart_table values('$name','$email',$n)";
                            if(mysqli_query($con,$str))
                            {
                                
                                $temp=true;
                                $quan=$n;
                                echo "<script>alert('".$name." added to cart successfully')</script>";
                            }
                        }                    
                    }
                    
                }  else{
                    echo "<script>alert('Login/Register before add to wishlist')</script>";
                }
                }
                                                                     
            /*}else{
                echo "<script>alert('".$quan." Should be less then or Same ".$q." ')</script>";
            }*/
            }
            
        ?>
            <div class="card col-md-12" style="width: 18rem;">
                <img src="Admin/uploads/<?php echo $row['image'];?>" class="card-img-top" alt="..." height="250px">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?php echo $row['name'];?></h5>
                    <p class="card-text">Rs. <?php echo $row['price'];?></p>
                    <p class="card-text">Available Quantity. <?php echo $row['quantity'];?></p>
                    <div class="row form-group">
                        <div class="col col-md-4">
                            <label for="quan" class=" form-control-label">Quantity</label>
                        </div>
                        <div class="col-12 col-md-8">
                            <input type="number" id="quan" name="quan"  class="form-control" min="1" max="<?php echo $row['quantity'] ?>" value="<?php echo $quan;?>">
                        </div>
                    </div>                             
                    <?php 
                        if($temp==true and $_SESSION['log_status']==true) 
                        {                                          
                    ?>
                    <a href="product_view.php?logid=<?php echo $id;?>&name=<?php echo $row['name'];?>">
                        <button type="submit" class="btn btn-warning" name="remove">Remove from Wish-List</button>                        
                    </a><br><br>        
                    <a href="product_view.php?logid=<?php echo $id;?>&name=<?php echo $row['name'];?>">                        
                        <button type="submit" class="btn btn-warning" name="update">Update Quantity</button>  
                    </a>
                    <?php }else{?> 
                        <a href="product_view.php?logid=<?php echo $id;?>&name=<?php echo $row['name'];?>">
                            <button type="submit"   class="btn btn-warning" name="add">Add to Wish-List</button>  
                        </a>
                        <?php }?>                                                                          
                    </div>
                </div>
            </div>      
        </form>
                                        
        </div>                    
    </section> 



<?php include('includes/footer.php');?>  