<?php
include('includes/header.php');
include('../middleware/adminmiddleware.php');
?>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Category</h4>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="col-md-6">
                                <label for="">Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
                            </div>
                            <div class="col-md-12">
                                <label for="">Description</label>
                                <textarea name="description" placeholder="Enter Description" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Uplode Img</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Titel</label>
                                <input type="text" class="form-control" name="meta_titel" placeholder="Enter meta titel">
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Description</label>
                                <textarea rows="3" class="form-control" name="meta_description" placeholder="Enter meta Description"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" placeholder="Enter meta keywords" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="">status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-6">
                                <label for="">Popular</label>
                                <input type="checkbox" name="popular">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_category">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



</div>





<?php include('includes/footer.php'); ?>