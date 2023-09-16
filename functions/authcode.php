<?php
session_start();
include('../config/dbcon.php');
include('myfunctions.php');
if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    // check email is registered or not
    $sql = "select email from  users where email='$email'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message'] = "Email already registerd";
        header('location:../register.php');
    } else {
        if ($password == $cpassword) {
            $sql = "insert into users(name,email,mobile,password) values ('$name','$email','$mobile','$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                $_SESSION['message'] = "Registered Successfully";
                header('location:login.php');
            } else {
                $_SESSION['message'] = "Something went wrong";
                header('location:/..register.php');
            }
        } else {
            $_SESSION['message'] = "Password is not match";
            header('location:../register.php');
        }
    }
} else if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $login_query = "select  * from users where email='$email' and password='$password'";
    $result = mysqli_query($con, $login_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($result);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];


        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail

        ];
        $_SESSION['role_as'] = $role_as;
        if ($role_as == 1) {
            redirect("../admin/index.php", "Welcome to Dashboard");
        } else {
            redirect("../index.php", "logged In Successfully");
        }
    } else {
        redirect("../login.php", "Invalid Credentials");
    }
}
