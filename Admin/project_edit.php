<?php include('includes/login_status.php');?>
<?php include('includes/header.php'); ?>
<?php include('includes/navabr.php'); ?>
<?php include('includes/connection.php'); ?>
        
        <div class="page-container">
        <?php include('includes/top.php'); ?>

            
            <div class="main-content">
                <div class="section__content section__content--p40">
                    <div class="container-fluid" align="center">
                        <?php
                            if(isset($_GET['id']))
                            {
                                $id=$_GET['id'];
                                $str="select * from product_table where name='$id'";
                                $res=mysqli_query($con,$str);
                                $row=mysqli_fetch_array($res);
                            }
                        ?>
                            
                            <div class="card" style="width:45rem;">
                                <div class="card-header">
                                    <strong>Edit Product</strong>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="card-body card-block">           
                                        <div class="row">
                                            <div class="col-4">
                                                <img src="uploads/<?php echo $row['image']; ?>" alt="">
                                            </div>
                                            <div class="col-8">
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="cat" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="cat" name="cat"  class="form-control" value="<?php echo $row['category'];?>" readonly>
                                                </div>
                                            </div>                                          
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="id-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="id-input" name="name"  class="form-control" value="<?php echo $row['name'];?>" readonly>
                                                </div>
                                            </div>        
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for=stock" class=" form-control-label">Stock</label>
                                                </div>
                                                <select class="js-select2 col-12 col-md-8" id="stock" name="stock">
                                                    <option selected><?php echo $row['stock'];?></option>
                                                    <option value="In Stock">In Stock</option>
                                                    <option value="Out Of Stock">Out Of Stock</option>                                                                                                        
                                                </select>
                                                <div class="dropDownSelect2"></div>                                            
                                            </div>                                        
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="price-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="price-input" name="price" class="form-control" value="<?php echo $row['price'];?>">                                                    
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="quantity-input" class=" form-control-label">Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="quantity-input" name="quantity" class="form-control" value="<?php echo $row['quantity'];?>">                                                    
                                                </div>
                                            </div>                                            
                                            </div>
                                        </div>                             
                                            <?php
                                                   
                                                    $conn = mysqli_connect('localhost', 'root', '', 'bakery');                                                    
                                                    if (isset($_POST['save'])) 
                                                    {                                 
                                                        
                                                        $price=$_POST['price'];
                                                        $stock=$_POST['stock'];
                                                        $quantity=$_POST['quantity'];
                                                                                                                                                                
                                                        $sql = "UPDATE product_table SET price=$price, stock='$stock', quantity='$quantity' WHERE name='$id'";
                                                        if(mysqli_query($conn, $sql))
                                                        {     
                                                            echo "<script>alert('Updated successfully');</script>";
                                                            echo "<script>location.href='project_edit.php?id=".$row['name']."';</script>";
                                                        }
                                                        else
                                                        {
                                                            echo "<p class='text-danger'> error!</p>";
                                                        }
                                                    }                                                     
                                            ?>                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="save" class="btn btn-primary">
                                             Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>