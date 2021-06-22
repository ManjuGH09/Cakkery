<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
 
  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container row">
        <nav class="navbar navbar-light">
          <div class="container-fluid">
          <h2>Our Products</h2> 
            <form class="d-flex">
              <div class="dropdown col-mb-6">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="product.php?logid=<?php echo $id;?>">All</a></li>                
                  <li><a class="dropdown-item" href="product.php?logid=<?php echo $id;?>&cat=Cakes">Cakes</a></li>
                  <li><a class="dropdown-item" href="product.php?logid=<?php echo $id;?>&cat=Rolls">Rolls</a></li>
                  <li><a class="dropdown-item" href="product.php?logid=<?php echo $id;?>&cat=Cookies">Cookies</a></li>
                  <li><a class="dropdown-item" href="product.php?logid=<?php echo $id;?>&cat=Breads">Breads</a></li>                  
                </ul>
              </div>
            </form>
          </div>
        </nav>                          
      </div>
      <div class="row">
      <?php require "includes/connection.php";
        if(isset($_GET['cat']))
        {
          $cat=$_GET['cat'];
          $str="select * from product_table where category='$cat' and stock='In Stock'";
        }else{
          $str="select * from product_table where stock='In Stock'";
        }            
            $res=mysqli_query($con,$str); 
            if(mysqli_num_rows($res)>0)
            {                       
              for($i=0;$i<mysqli_num_rows($res);$i++)
            {
                $row=mysqli_fetch_assoc($res);                                                         
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
      <?php  }}else{
          echo "No Products";
        }?>        
      </div>      
    </div>
  </section>

  
<?php include('includes/footer.php');?>