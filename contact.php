<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>

  
  <section class="contact_section layout_padding">

    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Add Review
        </h2>
      </div>
      <div class="row">
        <div class="col-md-9 mx-auto">
          <div class="form_container">
            <form action="contact.php?logid=<?php echo $id;?>" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="First Name" name="first"/>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Last Name" name="last" />
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" value="<?php echo $_SESSION['email'];?>" name="email" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Phone Number" name="mobile"/>
                </div>
              </div>
              <div class="form-group ">
                <input type="text" class="message-box" placeholder="Message" name="message"/>
              </div>
              <?php 
                                include('includes/connection.php');
                                if(isset($_POST['send']))
                                {
                                  if($_SESSION['log_status']==true)
                                  {
                                    $name=$_POST['first']." ".$_POST['last'];                                    
                                    $email=$_POST['email'];
                                    $msg=$_POST['message'];
                                    $mobile=$_POST['mobile'];
                                    if($name=="" or $email=="" or $msg=="" or $mobile=="")
                                    {
                                        echo "<p class='text-danger text-center'>All the fields should be filled</p>";
                                    }
                                    else
                                    {                                                                                                                                                                                                                       
                                               $str="insert into feedback_table values('$name',$mobile,'$email','$msg')";
                                                if(mysqli_query($con,$str))
                                                {
                                                    echo "<p class='text-success text-center'><i class='fa fa-check'></i>Feedback sent successfully</p>";
                                                    
                                                }else{
                                                  echo "<p class='text-success text-center'>Some Error! Please try again later.</p>";
                                                }                                                                                                                                                                                                                                
                                    }
                                  } else{
                                    echo "please login to send feedback";
                                  }                                   
                                }
                            
                            ?> 
              <div class="btn-box">
                <button type="submit" name="send">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
<?php include('includes/footer.php');?>