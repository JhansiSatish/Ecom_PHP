<?php
include('functions/userfunctions.php');
include('includes/header.php');
include('authenticate.php');
if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];
    $orderdata = checkTackingValid($tracking_no);
    if (mysqli_num_rows($orderdata) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>tracking no is missing from url</h4>
<?php
    die();
}
$data = mysqli_fetch_array($orderdata);
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">
                Home/
            </a>
            <a class="text-white" href="myorders.php">
                My Orders/
            </a>
            <a class="text-white" href="#">
                View Order
            </a>

        </h6>
    </div>
</div>
<div class="py-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <span class="text-white fs-4"> View Order</span>
                        <a href="myorders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i>Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Delivery Details</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="fw-bold mb-2">Name</label>
                                        <div class="border p-1">
                                            <?= $data['name']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold mb-2">Email</label>
                                        <div class="border p-1">
                                            <?= $data['email']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold mb-2">Phone</label>
                                        <div class="border p-1">
                                            <?= $data['phone']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold mb-2">Adress</label>
                                        <div class="border p-1">
                                            <?= $data['adress']; ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="fw-bold mb-2">Pincode</label>
                                        <div class="border p-1">
                                            <?= $data['pincode']; ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $userId = $_SESSION['auth_user']['user_id'];
                                        $order_Query = "select o.id as oid , o.tracking_no,o.user_id,oi.*,oi.qty as orderqty ,p.* from orders o,order_items oi ,products p where o.user_id='$userId' and oi.order_id=o.id and p.id = oi.prod_id and o.tracking_no='$tracking_no'";
                                        $result_order_Query = mysqli_query($con, $order_Query);
                                        if (mysqli_num_rows($result_order_Query) > 0) {
                                            foreach ($result_order_Query as $items) {
                                        ?>
                                                <tr>
                                                    <td class="align-middle">
                                                        <img src="uplodes/<?= $items['image']; ?>" alt="<?= $items['name']; ?>" width="80px">
                                                        <?= $items['name']; ?>
                                                    </td>
                                                    <td class="align-middle"><?= $items['price']; ?></td>
                                                    <td class="align-middle"><?= $items['orderqty']; ?></td>
                                                </tr>

                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <hr>
                                <h4>Total Price : <span class="float-end"><?= $data['total_price']; ?></span></h4>
                                <hr>
                                <label class="fw-bold">Payment Mode : </label>
                                <div class="border p-1 mb-3">

                                    <?= $data['payment_method']; ?>
                                </div>

                                <label class="fw-bold">Status : </label>
                                <div class="border p-1 mb-3">

                                    <?php
                                    if ($data['status'] == 0) {
                                        echo "Under Process";
                                    } else if ($data['status'] == 1) {
                                        echo "Completed";
                                    } else if ($data['status'] == 2) {
                                        echo "Cancelled";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<?php include('includes/footer.php'); ?>