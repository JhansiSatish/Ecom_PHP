<?php
// session_start();
include('config/dbcon.php');
function getAllActive($table)
{
    global $con;
    $sql = "select * from $table where status='0'";
    return $result = mysqli_query($con, $sql);
}
function getSlugActive($table, $slug)
{
    global $con;
    $sql = "select * from $table where slug='$slug' and status='0' limit 1";
    return $result = mysqli_query($con, $sql);
}
function getProByCategoty($category_id)
{
    global $con;
    $sql = "select * from products where category_id='$category_id' and status='0' limit 1";
    return $result = mysqli_query($con, $sql);
}
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location:' . $url);
    exit();
}
