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
function getCart()
{
    global $con;
    $userId = $_SESSION['auth_user']['user_id'];
    $sql = "select c.id as cid,  c.prod_id,c.prod_qty, p.id as pid, p.name,p.image,p.selling_price  from carts c , products p where c.prod_id=p.id and c.user_id = '$userId' order by c.id desc ";
    return $result = mysqli_query($con, $sql);
}
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location:' . $url);
    exit();
}
