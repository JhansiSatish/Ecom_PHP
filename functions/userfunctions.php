<?php
// session_start();
include('config/dbcon.php');
function getAllActive($table)
{
  global $con;
  $sql = "select * from $table where status='0'";
  return $result = mysqli_query($con, $sql);
}
function redirect($url, $message)
{
  $_SESSION['message'] = $message;
  header('location:' . $url);
  exit();
}
