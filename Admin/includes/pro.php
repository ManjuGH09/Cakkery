            <?php 
                $res=mysqli_query($con,$str);
				$str1="select * from project_table where technology='VB.Net'";
				$res1=mysqli_query($con,$str1);
				$vbn=mysqli_num_rows($res1);
				$str2="select * from project_table where technology='ASP.Net'";
				$res2=mysqli_query($con,$str2);
				$aspn=mysqli_num_rows($res2);
				$str3="select * from project_table where technology='PHP'";
				$res3=mysqli_query($con,$str3);
				$phpn=mysqli_num_rows($res3);
				$str4="select * from project_table where technology='Android'";
				$res4=mysqli_query($con,$str4);
				$andn=mysqli_num_rows($res4);
				$str5="select * from project_table where technology='Python'";
				$res5=mysqli_query($con,$str5);
                $pytn=mysqli_num_rows($res5);
            ?>