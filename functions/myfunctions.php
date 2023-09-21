<?php

include('../config/dbcon.php');
function getAll($table)
{
  global $con;
  $sql = "select * from $table";
  return $result = mysqli_query($con, $sql);
}
function getById($table, $id)
{
  global $con;
  $sql = "select * from $table where id='$id'";
  return $result = mysqli_query($con, $sql);
}

function redirect($url, $message)
{
  $_SESSION['message'] = $message;
  header('location:' . $url);
  exit();
}
function getOrderHistory()
{
  global $con;
  $sql = "select * from orders where status!='0'";
  return $result = mysqli_query($con, $sql);
}
function getAllOrders()
{
  global $con;
  $sql = "select o.*,u.name from orders o, users u where status='0' and o.user_id=u.id";
  return $result = mysqli_query($con, $sql);
}
function checkTackingValid($trackingNo)
{
  global $con;

  $sql = "select * from orders where tracking_no='$trackingNo'";
  return $result = mysqli_query($con, $sql);
}
