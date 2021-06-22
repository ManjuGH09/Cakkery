<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
   
    <div class="page-container"><br>
                        
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <form action="checkout.php?logid=<?php echo $id;?>" method="POST">
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <h3 class="title-5 m-b-35 text-center">Product Details</h3>                                   
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>                                                    
                                                    <th>Product Name</th>                                                    
                                                    <th>Price</th>
                                                    <th>Quantity</th>                                                    
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php require "includes/connection.php";                                                                                                                          
                                                $email=$_SESSION['email'];
                                                $str="select * from cart_table where email_id='$email'";                                                
                                                $res=mysqli_query($con,$str);                                                                             
                                                $ordid=$_SESSION['ORDER_ID']="ORDS" . rand(100,999);
                                                $payid="PAY".rand(01,1000);
                                                $n=mysqli_num_rows($res);
                                                $tot=0;
                                                $prname="";
                                                if($n > 0)
                                                { 
                                                    for($i=0;$i<$n;$i++)
                                                    {
                                                        $row1=mysqli_fetch_assoc($res);
                                                        $name=$row1['product_name'];
                                                        $prname=$prname." ".$name;
                                                        $quan=$row1['quantity'];                                                        
                                                        $str1="select * from product_table where name='$name'";
                                                        $res1=mysqli_query($con,$str1);
                                                        $row=mysqli_fetch_assoc($res1);
                                                        $tot+=($row['price']*$quan);
                                                    echo "<tr class='tr-shadow'>                                                    
                                                    <td>".$row['name']."</td>                                                    
                                                    <td>".$row['price']."</td>
                                                    <td>".$quan."</td>                                                                                                   
                                                 <td>".$row['price']*$quan."</td>
                                                    </tr>
                                                    ";
                                                }                                                                                                      
                                                    }                                                    
                                                if(isset($_POST['order'])){
                                                    $addr=$_POST['addr'];
                                                    $dat=date('Y-m-d');
                                                    $pay=$_POST['pay'];                                                    
                                                    $str="insert into sales_table values('$ordid','$prname','$email',$tot,'$addr','$dat')";
                                                    if(mysqli_query($con,$str))
                                                    {
                                                        echo "<script>alert('Your order is successful')</script>";
                                                        echo "<script> location.href='product.php?logid=1'; </script>";
                                                        /*$str="insert into payment values('$payid','$prname',$tot,'$email','$pay')";
                                                        if(mysqli_query($con,$str))
                                                        {
                                                            echo "<script>alert('Your order is successful')</script>";
                                                            echo "<script> location.href='product.php?logid=1'; </script>";
                                                        }*/
                                                    }
                                                }
                                            ?>                                            
                                            </tbody>
                                        </table>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="row form-group text-center col-md-6">
                                                    <div class="col col-md-6">
                                                        <label for="id-input" class=" form-control-label">Total Products</label>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <input type="text" id="id-input" name="name"  class="form-control" value="<?php echo $n;?>" readonly/>
                                                    </div>                                                
                                        </div>  
                                        <div class="row form-group text-center col-md-6">
                                                    <div class="col col-md-5">
                                                        <label for="id-input" class=" form-control-label">Total Price</label>
                                                    </div>
                                                    <div class="col-12 col-md-7">
                                                        <input type="text" id="id-input" name="name"  class="form-control" value="<?php echo $tot;?>" readonly/>
                                                    </div>                                                
                                        </div>
                                    </div>                                      
                                    <hr>
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <h3 class="title-5 m-b-35 text-center">Billing Details</h3>                                   
                                    <hr>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="name" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="name" name="name"  class="form-control" value="<?php echo $_SESSION['name']?>" readonly>
                                        </div>
                                    </div> 
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="email" class=" form-control-label">Email-Id</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="email" name="email"  class="form-control" value="<?php echo $_SESSION['email']?>" readonly>
                                        </div>
                                    </div> 
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="mobile" class=" form-control-label">Mobile Number</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="mobile" name="mobile"  class="form-control" value="<?php echo $_SESSION['mobile']?>" readonly>
                                        </div>
                                    </div>  
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="addr" class=" form-control-label">Address</label>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <textarea name="addr" id="addr" class="form-control" cols="50" rows="2"><?php echo $_SESSION['address']?></textarea>
                                        </div>
                                    </div>  
                                    <hr>  
                                    <h3 class="title-5 m-b-35 text-center">Payment Details</h3><hr>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pay" id="pay1" value="Cash on Delivery" checked>
                                        <label class="form-check-label" for="pay1">
                                            Cash on Delivery
                                        </label>
                                    </div>
                                    <!--<div class="form-check">
                                        <input class="form-check-input" type="radio" name="pay" id="pay2" value="Debit/Credit Card">
                                        <label class="form-check-label" for="pay2">
                                            Debit/Credit Card
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pay" id="pay2" value="Mobile Banking/UPI">
                                        <label class="form-check-label" for="pay2">
                                            Mobile Banking/UPI
                                        </label>
                                    </div><br>-->
                                    <!-- END DATA TABLE -->
                                </div>                                
                            </div>
                            <div class="text-center">
                                <button type="submit" name="order" class="btn btn-warning text-center">Order</button>
                            </div>
                            <!--<div class="text-center">
                                <button type="submit" name="back" class="btn btn-warning text-center">Back</button>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>            

    
    <?php include('includes/footer.php');?>