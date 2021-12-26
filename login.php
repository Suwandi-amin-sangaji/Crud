<?php
session_start();
// if (isset($_SESSION['verified_user_id'])) {
//     $_SESSION['status']= "logout berhasil";
//     header("location:login.php");
//     exit();
// }
include "include/header.php"
?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <?php
                if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>mantap</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    unset($_SESSION['status']);
                }
                ?>
                <div class="card-body container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md 6">
                            <form action="proses_login.php" method="POST">
                                <div class="form-group mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="login" class="btn btn-primary float-end"> Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php" ?>