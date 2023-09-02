<?php
$con = new mysqli('localhost', 'root', '', 'phpecom');
if ($con) {
    // echo " connection is successful";
} else {
    die(mysqli_error($con));
}
