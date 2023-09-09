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
} else if (isset($_POST['update_category'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_titel = $_POST['meta_titel'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular']) ? '1' : '0';
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        // $update_file = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_file = time() . '.' . $image_ext;
    } else {
        $update_file = $old_image;
    }

    $path = "../uplodes";
    $update = "update categories set name='$name',slug='$slug',description='$description',meta_title='$meta_titel',meta_description='$meta_description',mete_keywords='meta_keywords',status='$status',popular='$popular',image='$update_file' where id='$category_id'";
    $update_result = mysqli_query($con, $update);
    if ($update_result) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_file);
            if (file_exists("../uplodes/" . $old_image)) {
                unlink("../uplodes/" . $old_image);
            }
        }
        redirect("edit.cat.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit.cat.php?id=$category_id", "Something Went Wrong");
    }
} else if (isset($_POST['delete_cat'])) {
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_img = "select * from categories where id='$category_id'";
    $img_result = mysqli_query($con, $category_img);
    $image_data = mysqli_fetch_array($img_result);
    $image = $image_data['image'];

    $delete_item = "delete from categories where id='$category_id'";
    $delete_result = mysqli_query($con, $delete_item);
    if ($delete_result) {
        if (file_exists("../uplodes/" . $image)) {
            unlink("../uplodes/" . $image);
        }
        redirect("displaycategory.php", "Category Deleted Successfully");
    } else {
        redirect("displaycategory.php", "Something Went wrong");
    }
}
