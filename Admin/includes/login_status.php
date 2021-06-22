<?php session_start();
      
        if(!isset($_SESSION['username']))
        {
            echo "<script>location.href='index.php';</script>";
        } 
        
  ?> 