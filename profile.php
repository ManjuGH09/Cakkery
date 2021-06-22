
<?php include('includes/header.php');?>
<?php include('includes/navbar.php');?>
  
<?php 
    require "includes/connection.php";
    $email=$_SESSION['email'];
    $str="select * from user_table where email_id='$email'";
    $res=mysqli_query($con,$str);
    $row=mysqli_fetch_assoc($res);
?>

  <section class="contact_section layout_padding">

    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          My Profile
        </h2>
      </div>
      <div class="row">
        <div class="col-md-9 mx-auto">
          <div class="form_container">
            <form action="profile.php?logid=<?php echo $id;?>" method="post"> 
              <div class="form-row text-center">
                <div class="form-group col-md-12 text-center">
                  <img src="images/profile.jpg" alt="" width="" height="250px">
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo $row['first_name'];?>"/>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Last Name" name="last" value="<?php echo $row['last_name'];?>"/>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $row['email_id'];?>" readonly/>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" placeholder="Phone Number" name="mobile" value="<?php echo $row['mobile_number'];?>"/>
                </div>
              </div> 
              <div class="form-group col-md-12">
                  <input type="text" class="form-control" placeholder="Address" name="addr" value="<?php echo $row['address'];?>"/>
                </div>    
              <?php
              
              if(isset($_POST['refresh']))
              {
                echo "<script>location:profile.php?logid=".$id."</script";
              }
                  if(isset($_POST['update']))
                  {
                    $first=$_POST['first'];
                    $last=$_POST['last'];
                    $mobile=$_POST['mobile'];
                    $email=$_POST['email'];
                    $addr=$_POST['addr'];
                    $str="update user_table set first_name='$first',last_name='$last',mobile_number=$mobile,address='$addr' where email_id='$email'";
                    if(mysqli_query($con,$str))                    
                    {
                      $_SESSION['mobile']=$mobile;
                      $_SESSION['address']=$addr;
                      $_SESSION['name']=$first." ".$last;                      
                      echo "<script>location:profile.php?logid=".$id."</script";                      
                    }else{
                      echo "<h4 class='text-center text-danger'>error ! in updating</h4>";
                    }
                  }
              ?>     
              <div class="form-row row col-md-12 text-center">
                
                  <button type="submit" name="update" class="btn btn-warning">Update</button>                  
                
                                
                  <button type="submit" name="refresh" class="btn btn-warning">Refresh</button>
                                
              </div>                               
              </div>                            
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php include('includes/footer.php');?>