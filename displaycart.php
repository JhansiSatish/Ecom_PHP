<?php
include('functions/userfunctions.php');
include('includes/header.php'); ?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home/
            </a>
            <a class="text-white" href="displaycart.php">
                Cart
            </a>

        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card card-body shadow">
            <div class="row">
                <div class="col-md-12">
                    <div class="card product-data shadow-sm mb-2 bg-light">
                        <div class="row align-items-center">
                            <div class="col-md-2">
                                <h5>Image</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>Product Name</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Selling Price</h5>
                            </div>
                            <div class="col-md-3">
                                <h5>Quantity</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>Action</h5>
                            </div>

                        </div>
                    </div>
                    <?php
                    $item = getCart();

                    foreach ($item as $citem) {
                    ?>
                        <div class="card product-data shadow-sm mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uplodes/<?= $citem['image']; ?>" alt="image" width="80px">
                                </div>
                                <div class="col-md-3">
                                    <h5><?= $citem['name']; ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <h5><?= $citem['selling_price']; ?></h5>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group mb-3" style="width: 110px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control bg-white input-qty text-center" value="<?= $citem['prod_qty']; ?>" disabled>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger"><i class="fa fa-trash me-2"></i>Remove

                                    </button>

                                </div>

                            </div>
                        </div>

                </div>
            </div>
        <?php

                    }
        ?>

        </div>
    </div>
</div>
</div>


<?php include('includes/footer.php'); ?>