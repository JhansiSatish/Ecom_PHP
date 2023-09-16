<?php
if(!isset($_SESSION['auth'])){
    header('location:');
    redirect("login.php",'Login to Continue');
}
