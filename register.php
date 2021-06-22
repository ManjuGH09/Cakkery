<?php include('includes/header.php');?>


  <section class="contact_section layout_padding">

    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Sign Up
        </h2>
      </div>
      <div class="row">
        <div class="col-md-9 mx-auto">
          <div class="form_container">
            <form action="register.php" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="first" placeholder="First Name" />
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="last"placeholder="Last Name" />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" name="email" placeholder="Email" />
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="mobile" placeholder="Phone Number" />
                </div>
              </div>
              <div class="form-row ">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" name="addr" placeholder="Address" />
                </div>
                <div class="form-group col-md-6">
                  <input type="password" class="form-control" name="pass" placeholder="Password" />
                </div>                
              </div>
              <?php 
									if(isset($_POST['signup']))
									{	
										require "includes/connection.php";
										                $first=$_POST['first'];
                                    $last=$_POST['last'];
                                    $email=$_POST['email'];
                                    $pas=$_POST['pass'];
                                    $mobile=$_POST['mobile'];
                                    $addr=$_POST['addr'];
                                    if($first=="" or $email=="" or $pas==""or $mobile=="")
                                    {
                                        echo "All the fields should be filled";
                                    }
                                    else
                                    {   
                                      
                                      if (!preg_match("/^[a-zA-Z-' ]*$/",$first))
                                      {												
                                        echo "<p class='text-danger'>Name should contain Only letters and white space</p>";
                                      }
                                      else
                                      {	$n= strlen($mobile);
                                        if(!preg_match("/^[0-9-' ]*$/",$mobile))
                                        {												
                                          echo "<p class='text-danger'>Mobile Number should contain only numbers!</p>";
                                        }else{	
                                          if($n!=10){
                                            echo "<p class='text-danger'>Invalid Mobile Number!</p>";
                                          }
                                          else{																			
                                            if(!email_validation($email)) 
                                            { 
                                              echo "<p class='text-danger'>Invalid Email address!</p>"; 
                                            } 
                                            else 
                                            { 	$paslen=strlen($pas);
                                              if(!preg_match("/^[a-zA-Z0-9-' ]*$/",$pas))
                                              {												
                                                echo "<p class='text-danger'>Special characters are not allowed!</p>";
                                              }else{
                                                if(!($paslen>=6 && $paslen<=8))
                                                {
                                                  echo "<p class='text-danger'>Password should be more than 6 characters and less than 8 characters.!</p>";
                                                }else{
                                                  $pas=md5($pas);
                                                  $str="select * from user_table where email_id='$email'";
                                                  $res=mysqli_query($con,$str);
                                                  if(mysqli_num_rows($res)>0)
                                                  {
                                                      echo "User with the email ".$email." already exist";
                                                  }else{
                                                    $str="insert into user_table values('$first','$last','$email',$mobile,'$addr','$pas')";
                                                      if(mysqli_query($con,$str))
                                                      {
                                                          echo "Account created successfully";
                                                          header('location:login.php');
                                                      }else{
                                                        echo "Some Error! Please try again later.";
                                                      }                                                                                                                                               
                                                  }        
                                                }	
                                              }													 
                                            }
                                          }	
                                        }	
                                      }
									                  }											
                                  }
								?>              
              <div class="btn-box">
                <button type="submit" name="signup">Register</button>
              </div>
              <div class="form-group text-center ">
              <a href="login.php" class="nav-link">Already a Memeber?</a>
              </div>              
            <?php
              function email_validation($str) { 
                return (!preg_match( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $str)) ? FALSE : TRUE; 
              }  
            ?>
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