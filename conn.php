<?php

  $DB_host = "localhost";
  $DB_user = "root";
  $DB_pass = "";
  $DB_name = "lifecity";
  
  $conn = new MySQLi($DB_host,$DB_user,$DB_pass,$DB_name);
    
     if($conn->connect_errno)
     {
         die("ERROR : -> ".$conn->connect_error);
     }

?>


