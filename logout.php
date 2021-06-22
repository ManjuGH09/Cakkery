<?php 
session_start();
	
        unset($_SESSION['email']);
		session_destroy();
		echo "<script>location.href='index.php?logid=0&st=false';</script>";

?>