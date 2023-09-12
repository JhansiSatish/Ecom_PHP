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
                $category = getById("categories", $id);
                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);


            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category
                                <a href="displaycategory.php" class="btn btn-primary float-end">Back</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?= $data['name'] ?>" placeholder="Enter name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" class="form-control" name="slug" value="<?= $data['slug'] ?>" placeholder="Enter Slug">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="description" placeholder="Enter Description" rows="3" class="form-control"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Uplode Img</label>
                                        <input type="file" class="form-control" name="image">
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../uplodes/<?= $data['image'] ?>" height="50px" width="50px" alt="">

                                    </div>
                                    <label for="">Meta Titel</label>
                                    <input type="text" class="form-control" name="meta_titel" value="<?= $data['meta_title'] ?>" placeholder="Enter meta titel">
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Description</label>
                                    <textarea rows="3" class="form-control" name="meta_description" placeholder="Enter meta Description"><?= $data['meta_description'] ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Meta Keywords</label>
                                    <textarea name="meta_keywords" placeholder="Enter meta keywords" rows="3" class="form-control"><?= $data['mete_keywords'] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="">status</label>
                                    <input type="checkbox" name="status" <?= $data['status'] ? "checked" : "" ?>>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Popular</label>
                                    <input type="checkbox" name="popular" <?= $data['popular'] ? "checked" : "" ?>>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_category">Update</button>
                                </div>
                        </div>
                        </form>
                    </div>
        </div>
<?php
                } else {
                    echo "Category Not found";
                }
            } else {
                echo "Id missing from url";
            }
?>
    </div>

</div>



</div>





<?php include('includes/footer.php'); ?>