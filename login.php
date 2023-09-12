<?php
// session_start();
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Your are already logged In";

    header('location:index.php');
    exit();
}


include('includes/header.php'); ?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['message']);
                }
                ?>
                <div class="card-header">
                    <h4>Login Form</h4>
                    <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputemail" class="form-label">Email</label>
                                <input type="Email" class="form-control" id="exampleInputemail" placeholder="Enter Email" name="email">
                            </div>


                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1 " placeholder="Enter Password" name="password">
                            </div>


                            <button type="submit" class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<?php include('includes/footer.php'); ?>