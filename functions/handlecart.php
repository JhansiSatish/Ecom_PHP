<?php
session_start();
include('../config/dbcon.php');
if (isset($_SESSION['auth'])) {
    if (isset($_POST['scope'])) {
        $scope = $_POST['scope'];
        switch ($scope) {
            case "add":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['auth_user']['user_id'];
                $chk_prod_cart = "select * from carts where prod_id='$prod_id' and user_id='$user_id' ";
                $chk_prod_cart_result = mysqli_query($con, $chk_prod_cart);
                if (mysqli_num_rows($chk_prod_cart_result) > 0) {
                    echo "existing";
                } else {
                    $cart_insert = "insert into carts (user_id,prod_id,prod_qty) values ('$user_id','$prod_id','$prod_qty')";
                    $cart_result = mysqli_query($con, $cart_insert);
                    if ($cart_result) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                }
                break;
            case "update":
                $prod_id = $_POST['prod_id'];
                $prod_qty = $_POST['prod_qty'];
                $user_id = $_SESSION['auth_user']['user_id'];
                $chk_prod_cart = "select * from carts where prod_id='$prod_id' and user_id='$user_id' ";
                $chk_prod_cart_result = mysqli_query($con, $chk_prod_cart);
                if (mysqli_num_rows($chk_prod_cart_result) > 0) {
                    $update_cart = "update carts set prod_qty='$prod_qty' where prod_id='$prod_id' and user_id='$user_id' ";
                    $update_cart_result = mysqli_query($con, $update_cart);
                    if ($update_cart_result) {
                        echo 200;
                    } else {
                        echo 500;
                    }
                } else {
                    echo " Something Went Wrong";
                }
                break;

            default:
                echo 500;
        }
    }
} else {
    echo 401;
}
