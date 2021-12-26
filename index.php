<?php 
session_start();
include "auth.php";
include "include/header.php" 
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-12 my-3 text-end">
            <a href="login.php" class="btn btn-outline-primary">Login</a>
            <a href="register.php" class="btn btn-outline-danger">Register</a>
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
            <div class="card mt-4">
                <div class="card-header">
                    <h3>Data Mahasiswa PHP - FIREBASE
                        <a href="add.php" class="btn btn-primary float-end">+ Add</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nim</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('dbcon.php');
                            // nama table di firebase
                            $ref_table = "mahasiswa";
                            $fetchdata = $database->getReference($ref_table)->getValue();

                            if ($fetchdata > 0) {
                                $no = 1;
                                foreach ($fetchdata as $key => $row) {
                            ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nama']; ?></td>
                                        <td><?= $row['nim']; ?></td>
                                        <td><?= $row['email']; ?></td>
                                        <td><?= $row['alamat']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $key; ?>" class="btn btn-warning btn-sm"> Edit</a>

                                            <form action="proses.php" method="POST">
                                                    <input type="hidden" name="id_key" value="<?= $key; ?>">
                                                    <button type="submit" name="hapus_data" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td rowspan="6">Data Tidak Ditemukan</td>
                                </tr>
                            <?php
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "include/footer.php" ?>