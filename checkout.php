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
            <a class="text-white" href="checkout.php">
                Checkout
            </a>

        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeorder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" required placeholder="Enter Your Full Name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Email</label>
                                    <input type="email" name="email" required placeholder="Enter Your Email" class="form-control">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" required placeholder="Enter Your Phone Number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">pincode</label>
                                    <input type="text" name="pincode" required placeholder="Enter Your Pincode" class="form-control">
                                </div>
                                <div class="col-md-12 mt-3 ">
                                    <label class="fw-bold ">Address</label>
                                    <textarea name="adress" required rows="3" class=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <?php $item = getCart();
                            $totalPrice = 0;
                            foreach ($item as $citem) {
                            ?>

                                <div class="mb-1 border">
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
                                        <div class="col-md-2">
                                            <h5>×<?= $citem['prod_qty']; ?></h5>
                                        </div>


                                    </div>
                                </div>
                            <?php
                                $totalPrice += $citem['selling_price'] *  $citem['prod_qty'];
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice; ?></span></h5>
                            <div>
                                <input type="hidden" name="payment_method" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary my-2">Confirm and place order | COD</button>
                                <div id="paypal-button-container"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>
<!-- Replace the "test" client-id value with your client-id -->
<script src="https://www.paypal.com/sdk/js?client-id=AXucFrDx7Dl78mf23PNsQ7MMsfHXugysMer81CylbRnJSj8cncZstmNkwg_wD6PzVAzl4jXczmdqtLIb&currency=USD"></script>