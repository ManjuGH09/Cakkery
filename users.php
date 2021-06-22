<?php include('includes/login_status.php');?>
<?php include('includes/header.php'); ?>
<?php include('includes/navabr.php'); ?>

        
        <div class="page-container">
            
        <?php include('includes/top.php'); ?>
        
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                              
                                <div class="user-data">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td>First Name</td>
                                                    <td>Last Name</td>
                                                    <td>Mobile Number</td>
                                                    <td>Email</td>
                                                    <td>Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php require "includes/connection.php";
                                                    $str="select * from user_table";
                                                    $res=mysqli_query($con,$str);
                                                    $n=mysqli_num_rows($res);
                                                    if($n > 0)
                                                    {   
                                                        for($i=0;$i<$n;$i++)
                                                        {
                                                        $row=mysqli_fetch_array($res);
                                                        echo "<tr>
                                                        <td>".$row['first_name']."</td>
                                                        <td>".$row['last_name']."</td>
                                                        <td>".$row['mobile_number']."</td>
                                                        <td>".$row['email_id']."</td>
                                                        <td><a href='users.php?m=".$row['email_id']."' class='btn btn-danger btn-sm' data-toggle='tooltip' data-placement='top' title='Delete'>
                                                                <i class='fa fa-trash'></i>
                                                            </a></td>
                                                        </tr>";
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        if(isset($_GET['m']))
        {
            $mail=$_GET['m'];
            $str="delete from user_table where email_id='$mail'";
            if(mysqli_query($con,$str))
            {
                echo "<script> location.href='users.php'; </script>";
            }
        }
        ?>
        <?php include('includes/footer.php'); ?>