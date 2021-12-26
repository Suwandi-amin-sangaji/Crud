<?php
session_start();
include "dbcon.php";

// Proses Hapus data Firebase
if (isset($_POST['hapus_data'])) 
{
    $id = $_POST['id_key'];
    // echo $id;
    $ref_table = "mahasiswa/".$id;
    $hapusdata = $database->getReference($ref_table)->remove();
    if ($hapusdata) {
        $_SESSION['status'] = "data berhasil di hapus";
        header("location:index.php");
    }else{
        $_SESSION['status'] = "data gagal di dihapus";
        header("location:index.php");
    }
}

// Proses Update/Edit Data firebase
if(isset($_POST['update_data']))
{
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];   

    $updatedata = [
        'nama' => $nama,
        'nim' => $nim,
        'email' => $email,
        'alamat' => $alamat
    ];
    $ref_table = "mahasiswa/".$id;
    $queryupdatae = $database->getReference($ref_table)->update($updatedata);

    if ($queryupdatae) {
        $_SESSION['status'] = "data berhasil di Update";
        header("location:index.php");
    }else{
        $_SESSION['status'] = "data gagal di update";
        header("location:index.php");
    }
   
}

// Proses Input data Firebase
if (isset($_POST['submit'])) 
{
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $alamat = $_POST['alamat'];   

    $postData = [
        'nama' => $nama,
        'nim' => $nim,
        'email' => $email,
        'alamat' => $alamat
    ];

    $ref_table = "mahasiswa";
    $postRef = $database->getReference($ref_table)->push($postData);

    if ($postRef) {
        $_SESSION['status'] = "data berhasil di simpan";
        header("location:add.php");
    }else{
        $_SESSION['status'] = "data gagal di simpan";
        header("location:index.php");
    }

}
?>