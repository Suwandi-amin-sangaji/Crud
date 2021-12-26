<?php
session_start();
include "include/header.php"
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Edit Dan Update Data Firebase php Crud
                        <a href="index.php" class="btn btn-danger float-end">Cancel</a>
                    </h3>
                </div>  
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md 6">
                            <?php
                            include "dbcon.php";
                            $id = $_GET['id'];
                            $ref_table = "mahasiswa";
                            $editdata = $database->getReference($ref_table)->getChild($id)->getValue();
                            ?>
                            <form action="proses.php" method="post">
                                <input type="hidden" name="id" value="<?= $id; ?>">
                                <div class="form-group mb-3">
                                    <input type="text" name="nama" class="form-control" value="<?= $editdata['nama']; ?>" placeholder="Nama">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="nim" class="form-control" value="<?= $editdata['nim']; ?>" placeholder="Nim">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="email" class="form-control" value="<?= $editdata['email']; ?>" placeholder="Email">
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="alamat" class="form-control" value="<?= $editdata['alamat']; ?>" placeholder="Alamat">
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="update_data" class="btn btn-primary float-end"> Update</button>
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