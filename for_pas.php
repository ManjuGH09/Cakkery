
<?php include('includes/header.php');?>
  <section class="contact_section layout_padding">

<div class="container">
  <div class="heading_container heading_center">
    <h2>
      Reset your password
    </h2>
  </div>
  <div class="row">
    <div class="col-md-9 mx-auto">
      <div class="form_container">
        <form  method="post">
          <div class="form-row">
            <div class="form-group col-md-6 text-center">
              <img src="images/login.gif" alt="" width="" height="250px">
            </div>     
            <div class=" col-md-6">            
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email"/>
              </div>
              <div class="form-group text-center">
                <input type="password" class="form-control" name="pass1" placeholder="New Password" />                
              </div>
              <div class="form-group text-center">
                <input type="password" class="form-control" name="pass2" placeholder="Confirm Password" />                
              </div>              
              <?php 
                                include('includes/connection.php');
                                if(isset($_POST['signin']))
                                {                                    
                                    $email=mysqli_real_escape_string($con,$_POST['email']);
                                    $pas1=mysqli_real_escape_string($con,$_POST['pass1']);
                                    $pas2=mysqli_real_escape_string($con,$_POST['pass2']);
                                    if($pas1!=$pas2)
                                    {
                                        echo "<p class='text-danger text-center'>Password doesn't match</p>";
                                    }
                                    else
                                    {               
                                            $pas=md5($pas1);                                            
                                            $str="select * from user_table where email_id='$email'";
                                            $res=mysqli_query($con,$str);
                                            if(mysqli_num_rows($res)>0)
                                            {
                                                if(mysqli_query($con,"update user_table set password='$pas' where email_id='$email'"))                                                
                                                {
                                                    echo "<script>alert('password updated successfully');</script>";
                                                    echo "<script>location.href='login.php';</script>";
                                                }                                                
                                            }else{                                            
                                                echo "<p class='text-danger text-center'>Invalid Email ID</p>";
                                            }                                        
                                    }
                                }
                            
                            ?> 
              <div class="btn-box">
                <button type="submit" name="signin">Reset</button>                
              </div>    <br>          
              <div class="form-group text-center ">            
              <p><a href="login.php" class="nav-link">Return to Login</a></p>                                
              </div>
          </div>       
          </div>                           
                        
        </form>
      </div>
    </div>
  </div>
</div>
</section>
  
  <script src="js/jquery-3.4.1.min.js"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  
  <script src="js/bootstrap.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  
  <script src="js/custom.js"></script>
  
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  

</body>

</html>