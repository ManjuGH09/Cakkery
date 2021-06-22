<?php include('includes/navbar.php');?>
    <section class="slider_section">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1>
                      Delicious Cakes
                    </h1>
                    <p>
                      YOU make someone's day with a <B>BEAUTIFUL CAKE</B> and realize all the craziness was worthwhile.
                    </p>                    
                  </div>
                </div>
                <div class="col-md-5 col-lg-6">
                  <div class="img-box col-lg-10 mx-auto px-0">
                    <img src="images/slider-img.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>        
      </div>

    </section>
    

  <section class="about_section layout_padding">
    <div class="container  ">

      <div class="row">
        <div class="col-md-6 ">
          <div class="img-box">
            <img src="images/about-img.png" alt="">
          </div>
        </div>
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                We Are Cakkery
              </h2>
            </div>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly believable. If you
              are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in
              the middle of text. All
            </p>                         
            <a href="About.php?logid=<?php echo $id;?>">Read More</a>                 
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our product
        </h2>
      </div>
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="product.php?logid=<?php echo $id;?>&cat=Cakes" class="nav-link">
              <div>
                <div class="img-box">
                  <img src="images/cake-cat.png" alt="">
                </div>
                <div class="detail-box">                  
                   <p style="color:black"><b>Cakes</b></p>                 
                </div>
              </div>
            </a>            
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="product.php?logid=<?php echo $id;?>&cat=Rolls" class="nav-link">
              <div>
                <div class="img-box">
                  <img src="images/rolls.png" alt="">
                </div>
                <div class="detail-box">                  
                   <p style="color:black"><b>Rolls</b></p>                  
                </div>
              </div>
            </a>            
          </div>
        </div> 
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="product.php?logid=<?php echo $id;?>&cat=Cookies" class="nav-link">
              <div>
                <div class="img-box">
                  <img src="images/Cookies.png" alt="">
                </div>
                <div class="detail-box">                  
                   <p style="color:black"><b>Cookies</b></p>                  
                </div>
              </div>
            </a>            
          </div>
        </div> 
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="product.php?logid=<?php echo $id;?>&cat=Breads" class="nav-link">
              <div>
                <div class="img-box">
                  <img src="images/breads.png" alt="">
                </div>
                <div class="detail-box">                  
                   <p style="color:black"><b>Breads</b></p>                 
                </div>
              </div>
            </a>            
          </div>
        </div>         
      </div>      
    </div>
  </section>


  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center ">
        <h2>
          What Says Our Customers
        </h2>
      </div>
      <div class="carousel-wrap row text-center ">                 
          <div class="item">
          <?php require "includes/connection.php";
            $str="select * from feedback_table"; 
            $res=mysqli_query($con,$str);
            if(mysqli_num_rows($res)>0)
            {
              for($i=0;$i<1;$i++)
              {
                $row=mysqli_fetch_assoc($res);            
                        
          ?>
            <div class="box text-left">              
              <div class="detail-box">
              <h4><b>
                <?php echo $row['name'];?></b>
                </h4>
                <h7><b>
                <?php echo $row['email_id'];?></b>
                </h7><hr>
                <p>
                  <?php echo $row['message'];?>
                </p>                
              </div>
            </div> 
          <?php }}?>            
            <a href="feedback.php?logid=<?php echo $id;?>" class="btn1 text-center">
              <button type="button" class="btn btn-warning">View All</button>
            </a>  
                     
          </div>
        </div>
      </div>
    </div>
  </section>

