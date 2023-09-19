<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php') ?>
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
                    <div id="mycart">
                        <?php $item = getCart();
                        if (mysqli_num_rows($item) > 0) { ?>
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


                            <div id="mycart">
                                <?php
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
                                                <input type="hidden" class="prodId" value="<?= $citem['prod_id']; ?>">
                                                <div class="input-group mb-3" style="width: 110px;">
                                                    <button class="input-group-text decrement-btn updateQty">-</button>
                                                    <input type="text" class="form-control bg-white input-qty text-center" value="<?= $citem['prod_qty']; ?>" disabled>
                                                    <button class="input-group-text increment-btn updateQty">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger deleteItem" value="<?= $citem['cid']; ?>"><i class="fa fa-trash me-2"></i>Remove

                                                </button>

                                            </div>

                                        </div>
                                    </div>
                                <?php

                                }
                                ?>
                            </div>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-outline-primary">Proceed to Checkout</a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card card-bodt shadow text-center">
                                <h4 class="py-3">Your cart is empty</h4>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>