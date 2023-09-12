<?php
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getById("products", $id);
                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Products
                                <a href="displayproducts.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Select Category</label>
                                        <select name="category_id" class="form-select mb-2">
                                            <option selected>Select Category</option>
                                            <?php
                                            $categories = getAll("categories");
                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }

                                            ?>


                                        </select>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                    <div class="col-md-6">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $data['name']; ?>" placeholder="Enter name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="<?= $data['slug']; ?>" placeholder="Enter Slug">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Small Description</label>
                                        <textarea name="small_description" placeholder="Enter Small Description" rows="3" class="form-control"><?= $data['small_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="description" placeholder="Enter Description" rows="3" class="form-control"><?= $data['description']; ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Original Price</label>
                                        <input type="text" class="form-control" name="original_price" value="<?= $data['original_price']; ?>" placeholder="Enter original Price">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Selling Price</label>
                                        <input type="text" class="form-control" name="selling_price" value="<?= $data['selling_price']; ?>" placeholder="Enter Selling price">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Uplode Img</label>
                                        <input type="file" class="form-control" name="image">
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uplodes/<?= $data['image'] ?>" height="50px" width="50px" alt="product image">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Quantity</label>
                                            <input type="number" class="form-control" name="qty" value="<?= $data['qty']; ?>" placeholder="Enter Quantity ">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">status</label><br>
                                            <input type="checkbox" name="status" <?= $data['status'] ? "checked" : "" ?>>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="">Trending</label><br>
                                            <input type="checkbox" name="trending" <?= $data['trending'] ? "checked" : "" ?>>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Titel</label>
                                        <input type="text" class="form-control mb-2" name="meta_titel" value="<?= $data['meta_title']; ?>" placeholder="Enter meta titel">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <textarea rows="3" class="form-control mb-2" name="meta_description" placeholder="Enter meta Description"><?= $data['meta_description']; ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <textarea name="meta_keywords" placeholder="Enter meta keywords" rows="3" class="form-control"><?= $data['meta_keywords']; ?></textarea>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary my-4" name="update_product">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product Not Found with given id";
                }
            } else {
                echo "Id is missing from url";
            }
            ?>
        </div>

    </div>



</div>





<?php include('includes/footer.php'); ?>