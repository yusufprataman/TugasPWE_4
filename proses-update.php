<?php

session_start();

include '_includes/db.php';
$db = PWE_DB::connect();

$nama = $_POST['nama'];
$npm = $_POST['npm'];
$email = $_POST['email'];

$query = $db->prepare("UPDATE anggota SET nama = '$nama', npm = '$npm' WHERE email = '$email'");
    $update = $query->execute();

if ($update){

    $_SESSION['nama'] = $nama;
    $_SESSION['npm'] = $npm;

    header('Location: '.'dasbor.php');
} else {
    echo '<script>alert("Perubahan gagal!");</script>';
    echo '<script>window.location.href = "daftar.php";</script>';
}
