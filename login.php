<?php session_start();?>
<?php include('includes/header.php');?>
<?php $_SESSION['log_status']=false;?>
  
  <?php session_start();?>
<?php 
  if(isset($_GET['logid']))
  {
    $id=$_GET['logid'];      
  }else{
    $id=0;
    $_SESSION['log_status']=false;
  }  
  if(isset($_GET['st']))
    {
      $_SESSION['log_status']=$_GET['st'];
    }  
?>

<div class="hero_area">
  <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <span>
              Cakkery
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">            
              <li class="nav-item active">
                <a class="nav-link active" href="">User</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin/">Admin</a>
              </li>                     
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>                                                        
            </ul>
          </div>
        </nav>
      </div>
    </header>
</div>
  <section class="contact_section layout_padding">

<div class="container">
  <div class="heading_container heading_center">
    <h2>
      Sign-In
    </h2>
  </div>
  <div class="row">
    <div class="col-md-9 mx-auto">
      <div class="form_container">
        <form action="login.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6 text-center">
              <img src="images/login.gif" alt="" width="" height="250px">
            </div>     
            <div class=" col-md-6">            
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email"/>
              </div>
              <div class="form-group text-center">
                <input type="password" class="form-control" name="pass" placeholder="Password" />
                <p><a href="for_pas.php" class="nav-link">Forgot password?</a></p>                                
              </div>              
              <?php 
                                include('includes/connection.php');
                                if(isset($_POST['signin']))
                                {                                    
                                    $email=mysqli_real_escape_string($con,$_POST['email']);
                                    $pas=mysqli_real_escape_string($con,$_POST['pass']);                                    
                                    if($email=="" or $pas=="")
                                    {
                                        echo "All the fields should be filled";
                                    }
                                    else
                                    {               
                                            $pas=md5($pas);                                            
                                            $str="select * from user_table where email_id='$email' and password='$pas'";
                                            $res=mysqli_query($con,$str);
                                            if(mysqli_num_rows($res)>0)
                                            {
                                                $row=mysqli_fetch_assoc($res);
                                                $_SESSION['email']=$email;
                                                $_SESSION['name']=$row['name'];                                               
                                                $_SESSION['log_status']=true;
                                                header('location:index.php?logid=1');
                                            }else{                                            
                                                    echo "Invalid credentials";                                                                                                                                                                                                                                               
                                            }                                        
                                    }
                                }
                            
                            ?> 
              <div class="btn-box">
                <button type="submit" name="signin">Login</button>                
              </div>              
              <div class="form-group text-center ">
              <br>
              <p>Don't have an account?<a href="register.php" class="nav-link">Register</a></p>                                
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