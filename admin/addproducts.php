<?php
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Products</h4>
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
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                    <?php
                                        }
                                    } else {
                                        echo "No category available";
                                    }

                                    ?>


                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                            </div>
                            <div class="col-md-12">
                                <label for="">Small Description</label>
                                <textarea name="small_description" placeholder="Enter Small Description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" placeholder="Enter Description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Original Price</label>
                                <input type="text" class="form-control" name="original_price" placeholder="Enter original Price">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Selling Price</label>
                                <input type="text" class="form-control" name="selling_price" placeholder="Enter Selling price">
                            </div>
                            <div class="col-md-12">
                                <label for="">Uplode Img</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Quantity</label>
                                    <input type="number" class="form-control" name="qty" placeholder="Enter Quantity ">
                                </div>
                                <div class="col-md-3">
                                    <label for="">status</label><br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label for="">Trending</label><br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Titel</label>
                                <input type="text" class="form-control mb-2" name="meta_titel" placeholder="Enter meta titel">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea rows="3" class="form-control mb-2" name="meta_description" placeholder="Enter meta Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" placeholder="Enter meta keywords" rows="3" class="form-control"></textarea>
                            </div>

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary my-4" name="add_product">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>





<?php include('includes/footer.php'); ?>