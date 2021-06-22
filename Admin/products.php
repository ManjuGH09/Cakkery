<?php include('includes/login_status.php');?>
<?php include('includes/header.php'); ?>
<?php include('includes/navabr.php'); ?>

        
        <div class="page-container">
            
            <?php include('includes/top.php'); ?>
            
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <form action="products.php" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    
                                    <h3 class="title-5 m-b-35">Products</h3>
                                    <div class="table-data__tool">
                                        <div class="table-data__tool-left">
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" id="category" name="category">
                                                    <option selected>All</option>
                                                    <option value="Cakes">Cakes</option>
                                                    <option value="Cookies">Cookies</option>
                                                    <option value="Rolls">Rolls</option>
                                                    <option value="Breads">Breads</option>                                                    
                                                </select>
                                                <div class="dropDownSelect2"></div>                                            
                                            </div>  
                                            <div class="rs-select2--light rs-select2--md">
                                                <select class="js-select2" id="stock" name="stock">
                                                    <option selected>Stock</option>
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out Of Stock">Out Of Stock</option>                                                                                                        
                                                </select>
                                                <div class="dropDownSelect2"></div>                                            
                                            </div>                      
                                            <button type="submit" name="view" class="btn btn-info">View</button>
                                        </div>                                        
                                        <div class="table-data__tool-right">
                                            <a class="au-btn au-btn-icon au-btn--green au-btn--small" href="project_add.php">
                                                <i class="zmdi zmdi-plus"></i>add item</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-responsive-data2">
                                        <table class="table table-data2">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Stock</th> 
                                                    <th>Quantity</th>                                                   
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php require "includes/connection.php";
                                                
                                                if(isset($_POST['view']) and $_POST['category']!="All" and $_POST['stock']!="Stock")
                                                {                                                    
                                                        $cat=$_POST['category']; 
                                                        $stock=$_POST['stock'];
                                                        echo $cat."  ".$stock;                                                                                                                                                     
                                                        $str="select * from product_table where category='$cat' and stock='$stock'";
                                                                                                    
                                                }elseif(isset($_POST['view'])){
                                                    if($_POST['category']=="All" and $_POST['stock']=="Stock"){
                                                        echo "All Stock";
                                                        $str="select * from product_table";
                                                    }elseif($_POST['category']!="All" and $_POST['stock']=="Stock"){
                                                        $cat=$_POST['category']; 
                                                        $stock=$_POST['stock'];                                                        
                                                        echo $cat."  ".$stock;                                                                                                                                                     
                                                        $str="select * from product_table where category='$cat'";
                                                    }else{         
                                                        $cat=$_POST['category'];                                                
                                                        $stock=$_POST['stock'];
                                                        echo $cat."  ".$stock;                                                                                                                                                     
                                                        $str="select * from product_table where stock='$stock'";
                                                    }
                                                  
                                                } else{
                                                    echo "All Stock";
                                                    $str="select * from product_table";
                                                }                                       
                                                $res=mysqli_query($con,$str);
                                                $n=mysqli_num_rows($res);
                                                if($n > 0)
                                                { for($i=0;$i<$n;$i++)
                                                    {
                                                    $row=mysqli_fetch_array($res);
                                                    echo "<tr class='tr-shadow'>
                                                    <td><img src='uploads/".$row['image']."' style='width:4rem;height:3rem'></td>
                                                    <td>".$row['name']."</td>
                                                    <td>".$row['category']."</td>
                                                    <td>".$row['price']."</td>
                                                    <td>".$row['stock']."</td>   
                                                    <td>".$row['quantity']."</td>                                                 
                                                    <td >    <span>                                                                                                       
                                                            <a href='project_edit.php?id=".$row['name']."' class='btn btn-success btn-sm' data-toggle='tooltip' data-placement='top' title='Edit'>
                                                                <i class='zmdi zmdi-edit'></i>
                                                            </a>
                                                            <a href='products.php?id=".$row['name']."' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                                <i class='fa fa-trash'></i>
                                                            </a>   </span>                                                                                                         
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
            $str="delete from product_table where name='$id'";
            if(mysqli_query($con,$str))
            {
                echo "<script> location.href='products.php'; </script>";
            }
        }
        ?>                                   
        <?php include('includes/footer.php'); ?>