<?php include('includes/login_status.php');?>
<?php include('includes/header.php'); ?>
<?php include('includes/navabr.php'); ?>

        
        <div class="page-container">
        <?php include('includes/top.php'); ?>

            
            <div class="main-content">
                <div class="section__content section__content--p40">
                    <div class="container-fluid" align="center">    
                            <div class="card" style="width:30rem;">
                                <div class="card-header">
                                    <strong>Add New Product</strong>
                                </div>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">                                
                                    <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="front-input" class=" form-control-label">Category</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <select name="cat"  class="form-control">
                                                        <option name="cat"value="0">Please select</option>
                                                        <option name="cat"value="Cakes">Cakes</option>
                                                        <option name="cat"value="Cookies">Cookies</option>
                                                        <option name="cat"value="Rolls">Rolls</option>
                                                        <option name="cat"value="Breads">Breads</option>
                                                    </select>
                                                </div>
                                            </div>                                          
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="id-input" class=" form-control-label">Product Name</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="id-input" name="name"  class="form-control">
                                                </div>
                                            </div>        
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="stock" class=" form-control-label">Stock</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <select name="stock"  class="form-control">
                                                        <option name="stock"value="0">Please select</option>
                                                        <option name="stock"value="In Stock">In Stock</option>
                                                        <option name="stock"value="Out Of Stock">Out Of Stock</option>                                                        
                                                    </select>
                                                </div>
                                            </div>                                           
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="price-input" class=" form-control-label">Price</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="price-input" name="price" class="form-control">                                                    
                                                </div>
                                            </div>                                                                                
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="image-input" class=" form-control-label">Image</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="file" id="image-input" name="image" class="form-control-file">
                                                </div>
                                            </div>   
                                            <div class="row form-group">
                                                <div class="col col-md-4">
                                                    <label for="quantity-input" class=" form-control-label">Quantity</label>
                                                </div>
                                                <div class="col-12 col-md-8">
                                                    <input type="text" id="quantity-input" name="quantity" class="form-control">                                                    
                                                </div>
                                            </div>                                         
                                            <?php
                                                    
                                                    $conn = mysqli_connect('localhost', 'root', '', 'bakery');
                                                    
                                                    if (isset($_POST['save'])) 
                                                    {                                                 
                                                    $name=$_POST['name'];
                                                    $price=$_POST['price'];                                                    
                                                    $category=$_POST['cat'];
                                                    $stock=$_POST['stock'];                                                    
                                                    $quantity=$_POST['quantity'];                                        
                                                    $image=$_FILES['image']['name'];
                                                    
                                                    $destination2 = 'uploads/' . $image;
                                                    
                                                    
                                                    $extension1 = pathinfo($image, PATHINFO_EXTENSION);                                                    

                                                    $img = $_FILES['image']['tmp_name'];
                                                    $sze = $_FILES['image']['size'];

                                                    /*if (!in_array($extension1, ["jpg", "png", "jpeg", "jfif"])) {
                                                            echo "You file extension must be .jpg, .gif, .png, .jpeg";
                                                    } else*/ 
                                                    if ($_FILES['image']['size'] > 10000000000) { 
                                                            echo "File too large!";
                                                    } else {
                                                            
                                                            if (move_uploaded_file($img, $destination2)) 
                                                            {
                                                                $sql = "INSERT INTO product_table VALUES ('$name','$category', $price,'$image','$stock','$quantity')";
                                                                if(mysqli_query($conn, $sql))
                                                                {
                                                                    echo "<script> location.href='products.php'; </script>";
                                                                }else{
                                                                    echo "Someting went wrong!";                                                                    
                                                                }
                                                            } else{
                                                                echo "Something wrong with your image";
                                                            }
                                                    }
                                                }
                                                /*if(isset($_POST['back'])){

                                                }*/
                                            ?>
                                        
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" name="save" class="btn btn-primary">
                                             ADD
                                        </button>
                                    </div>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>