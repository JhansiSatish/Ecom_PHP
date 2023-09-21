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
        redirect("edit-cat.php?id=$category_id", "Category Updated Successfully");
    } else {
        redirect("edit-cat.php?id=$category_id", "Something Went Wrong");
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
} else if (isset($_POST['add_product'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_titel = $_POST['meta_titel'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uplodes";
    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($name != "" && $slug != "" && $description != "") {
        $pro_querry = "insert into products(category_id,name,slug,small_description,description,original_price,selling_price,qty,status,trending,meta_title,meta_keywords,meta_description,image) values ('$category_id','$name','$slug','$small_description','$description','$original_price','$selling_price','$qty','$status','$trending','$meta_titel','$meta_keywords','$meta_description','$filename')";
        $pro_result = mysqli_query($con, $pro_querry);
        if ($pro_result) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            redirect("addproducts.php", "Product Add Successfully ");
        } else {
            redirect("addproducts.php", "Something went Wrong ");
        }
    } else {
        redirect("addproducts.php", "All Fields are mandatory ");
    }
} else if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_titel'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending']) ? '1' : '0';
    $image = $_FILES['image']['name'];
    $path = "../uplodes";
    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    if ($new_image != "") {
        // $update_file = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_file = time() . '.' . $image_ext;
    } else {
        $update_file = $old_image;
    }

    $update_pro = "update products set name='$name',slug='$slug',small_description='$small_description',description='$description',original_price='$original_price',selling_price='$selling_price',qty='$qty',meta_title='$meta_title',meta_description='$meta_description',meta_keywords='$meta_keywords',status='$status',trending='$trending',image='$update_file' where id='$product_id'";
    $updatepro_result = mysqli_query($con, $update_pro);
    if ($updatepro_result) {
        if ($_FILES['image']['name'] != "") {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_file);
            if (file_exists("../uplodes/" . $old_image)) {
                unlink("../uplodes/" . $old_image);
            }
        }
        redirect("edit-product.php?id=$product_id", "Category Updated Successfully");
    } else {
        redirect("edit-product.php?id=$product_id", "Something Went Wrong");
    }
} else if (isset($_POST['delete_product_btn'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);

    $product_img = "select * from products where id='$product_id'";
    $img_result = mysqli_query($con, $product_img);
    $image_data = mysqli_fetch_array($img_result);
    $image = $image_data['image'];

    $delete_product = "delete from products where id='$product_id'";
    $product_result = mysqli_query($con, $delete_product);
    if ($product_result) {
        if (file_exists("../uplodes/" . $image)) {
            unlink("../uplodes/" . $image);
        }
        // echo 200;
        redirect("displayproduct.php", "product Deleted Successfully");
    } else {
        redirect("displayproduct.php", "Something Went wrong");
        // echo 500;
    }
} else if (isset($_POST['update_order_status_btn'])) {
    $track_no = $_POST['tracking_no'];
    $order_satuse = $_POST['order_satuse'];
    $update_order_status = "update orders set status='$order_satuse' where tracking_no='$track_no'";
    $result_status = mysqli_query($con, $update_order_status);
    if ($result_status) {
        redirect("view-order.php?t=$track_no", "Order Status Updated Successfully");
    }
} else {
    header('location:../index.php');
}
