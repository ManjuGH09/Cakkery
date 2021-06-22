<?php include('includes/header.php');
        include('includes/navbar.php');
        include('includes/connection.php');
?>
<section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
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
              for($i=0;$i<mysqli_num_rows($res);$i++)
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
                <h6>                
              </div>
            </div>
            <?php }}else{
                echo "No feedbacks";
            }?>            
          </div>
        </div>
      </div>
    </div>
</section>

<?php include("includes/footer.php");?>