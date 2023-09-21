<?php
include('../functions/myfunctions.php');

if (isset($_SESSION['auth'])) {
    if ($_SESSION['role_as'] != 1) {
        redirect("../index.php", "Your are not authorized to access this page");
        header('location:../index.php');
    }
} else {
    redirect("../login.php", "login to continue ");
}
