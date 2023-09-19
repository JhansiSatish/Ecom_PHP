<?php
session_start();
include('../config/dbcon.php');

if (isset($_SESSION['auth'])) {
    if (isset($_POST['placeOrderBtn'])) {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $pincode = mysqli_real_escape_string($con, $_POST['pincode']);
        $adress = mysqli_real_escape_string($con, $_POST['adress']);
        $payment_method = mysqli_real_escape_string($con, $_POST['payment_method']);
        // $payment_id =  mysqli_real_escape_string($con, $_POST['payment_id']);
        if ($name == "" || $email == "" || $phone == "" || $pincode == "" || $adress == "") {
            $_SESSION['message'] = "All fields are mqndatory";
            header('location: ../checkout.php');
            exit(0);
        }

        $userId = $_SESSION['auth_user']['user_id'];
        $sql_cart = "select c.id as cid,  c.prod_id,c.prod_qty, p.id as pid, p.name,p.image,p.selling_price  from carts c , products p where c.prod_id=p.id and c.user_id = '$userId' order by c.id desc ";
        $result_cart = mysqli_query($con, $sql_cart);

        $totalPrice = 0;
        foreach ($result_cart as $citem) {

            $totalPrice += $citem['selling_price'] *  $citem['prod_qty'];
        }


        $tracking_no = "jhansi" . rand(1111, 9999) . substr($phone, 2);
        $insert_querry = "insert into orders(tracking_no,user_id,name,email,phone,adress,pincode,total_price,	payment_method) values ('$tracking_no','$userId','$name','$email','$phone','$adress','$pincode','$totalPrice','$payment_method')";


        $result_insert_querry = mysqli_query($con, $insert_querry);
        if ($result_insert_querry) {
            $order_id = mysqli_insert_id($con);
            foreach ($result_cart as $citem) {
                $prod_id = $citem['prod_id'];
                $prod_qty = $citem['prod_qty'];
                $price = $citem['selling_price'];
                $insert_items_querry = "insert into order_items(order_id,prod_id,qty,price) values ('$order_id','$prod_id','$prod_qty','$price')";
                $result_insert_items_querry =  mysqli_query($con, $insert_items_querry);
            }
            $deteteCartItems = "delete from carts where user_id = '$userId'";
            $result_deteteCartItems =  mysqli_query($con, $deteteCartItems);
            $_SESSION['message'] = "Order placed successfully";
            header('location: ../myorders.php');
            die();
        }
    }
} else {
    header('location:../index.php');
}
