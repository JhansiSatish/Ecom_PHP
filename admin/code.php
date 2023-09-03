<?php
session_start();

include('../config/dbcon.php');

include('../functions/myfunctions.php');
if (isset($_POST['add_category'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_titel = $_POST['meta_titel'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uplodes";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;
    $sql = "insert into categories(name,slug,description,meta_title,meta_description,mete_keywords,status,popular,image) values ('$name','$slug','$description','$meta_titel','$meta_description','$meta_keywords','$status','$popular','$filename')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("category.php", "Category Add Successfully ");
    } else {
        redirect("category.php", "Something Went Wrong ");
    }
}
