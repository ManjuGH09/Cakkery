<?php session_start(); 
include('includes/header.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">   
    <div class="collapse navbar-collapse" id="navbarSupportedContent">        
      <ul class="navbar-nav me-right mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#"><h4>Admin</h4></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="../login.php"><h4>User</h4></a>
        </li>        
      </ul>      
    </div>
  </div>
</nav>
        <div class="page-content--bge5 ">
            <div class="container" align="center">
                <div class="login-wrap"><br><br>
                    <div class="login-content " style="width: 22rem">
                        <div class="login-logo">
                            <h4>CAKKERY ADMIN</h4>                                                            
                        </div>
                        <div class="login-form">
                            <form action="login.php" method="post" class="">                            
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                                </div>
                                            </div>                                            
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-eye"></i>
                                                    </div>
                                                    <input type="password" id="password" name="pas" placeholder="Password" class="form-control">
                                                </div>
                                            </div>
                                            <?php 
                                    if(isset($_POST['login']))
                                    {
                                        require "includes/connection.php";
                                        $username=$_POST['username'];
                                        $pas=$_POST['pas'];
                                        $str="select * from admin_table where username='$username' and password='$pas'";
                                        $res=mysqli_query($con,$str);
                                        if(mysqli_num_rows($res)>0)
                                        {
                                            $_SESSION['admin_username']=$username;
                                            $str="select * from admin_table where username='$username'";
                                            $res=mysqli_query($con,$str);
                                            $row=mysqli_fetch_array($res);
                                            $_SESSION['username']=$row['username'];                                            
                                            echo "<script> location.href='home.php'; </script>";
                                        }
                                        else
                                        {
                                            echo " <div class='text-danger'>  
                                            <i class='fa fa-exclamation-triangle'></i>
                                                    <span class='text'>Invalid Credentials</span></div><br>";
                                        }
                                    }
                                ?>
                                            <div class="form-actions form-group" align="center">
                                                <button type="submit" name="login" class="btn btn-success">Login</button>
                                            </div>

                                        </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include('includes/footer.php'); ?>