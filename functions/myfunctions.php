<?php
include('../config/dbcon.php');
 function getAll($table)
 { global $con; 
   $sql="select * from $table";
   return $result= mysqli_query($con,$sql);
 }
 function redirect($url,$message){
    $_SESSION['message']=$message;
    header('location:'.$url);
    exit();

 }
