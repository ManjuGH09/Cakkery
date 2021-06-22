<?php include('includes/login_status.php');?>
<?php include('includes/header.php'); ?>
<?php include('includes/navabr.php'); ?>

        
        <div class="page-container">
            
        <?php include('includes/top.php'); ?>
            
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <form action="orders.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <h3 class="title-5 m-b-35">Orders</h3>                                    
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>                                                
                                                    <th>Order ID</th>
                                                    <th>Product Name</th>
                                                    <th>Email Id</th>                                                    
                                                    <th>Total Price</th>                                                                                                       
                                                    <th>Order Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php require "includes/connection.php";                                                
                                                $str="select * from sales_table";                                      
                                                $res=mysqli_query($con,$str);
                                                $n=mysqli_num_rows($res);
                                                if($n > 0)
                                                { for($i=0;$i<$n;$i++)
                                                    {
                                                    $row=mysqli_fetch_array($res);
                                                    echo "<tr class='tr-shadow'>                                                    
                                                    <td>".$row['order_id']."</td>
                                                    <td>".$row['product_name']."</td>
                                                    <td>".$row['email_id']."</td>                                                    
                                                    <td>".$row['total_price']."</td>                                                    
                                                    <td>".$row['date']."</td>
                                                    <td >                                                                                                                                                                   
                                                            <a href='orders.php?id=".$row['order_id']."' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                                <i class='fa fa-trash'></i>
                                                            </a>                                                                                                            
                                                    </td>
                                                    </tr>
                                                    <tr class='spacer'></tr>";
                                                    }                                                    
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
            $str="delete from sales_table where order_id='$id'";
            if(mysqli_query($con,$str))
            {
                echo "<script> location.href='orders.php'; </script>";
            }
        }
        ?>                                   
        <?php include('includes/footer.php'); ?>