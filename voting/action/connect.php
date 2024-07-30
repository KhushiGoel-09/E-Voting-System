<?php
   
    $servername = "localhost"; 
    $username = "root"; 
    $password = "";
   
    $database = "votingsystem";
  
     $con = mysqli_connect($servername, 
         $username, $password, $database);
   
    if(!$con) {
        die("Error". mysqli_connect_error()); 
    } 
     
?>
