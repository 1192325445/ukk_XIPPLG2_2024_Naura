<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    // Perbaiki penanganan variabel $_POST
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');

    // Perbaiki penanganan variabel $_SESSION
    $userid = $_SESSION['userid'];

    // Ubah string '$namaalbum', '$deskripsi', dan '$userid' menjadi variabel tanpa tanda kutip
    $sql = mysqli_query($koneksi, "INSERT INTO album VALUES('', '$namaalbum', '$deskripsi', '$tanggal', '$userid')");

    echo "<script>
    alert('Data berhasil disimpan!');
    location.href='../admin/album.php';
    </script>";
}

if (isset($_POST['edit'])) {
    $albumid = $_POST['albumid'];
    $namaalbum = $_POST['namaalbum'];
    $deskripsi = $_POST['deskripsi'];
    $tanggal = date('Y-m-d');
    $userid = $_SESSION['userid'];

    $sql = mysqli_query($koneksi, "UPDATE album SET namaalbum='$namaalbum', deskripsi='$deskripsi', tanggalbuat='$tanggal' WHERE albumid='$albumid'");

    echo "<script>
        alert('Data berhasil diperbarui!');
        location.href='../admin/album.php';
        </script>";
}

if (isset($_POST['hapus'])) {
    $albumid = $_POST['albumid'];

    $sql = mysqli_query($koneksi, "DELETE FROM album WHERE albumid='$albumid'");

    echo "<script>
    alert('Data berhasil dihapus!');
    window.location.href = '../admin/album.php';
    </script>";


    // echo "<script>
    // alert('Data berhasil dihapus!');
    // location.href'../admin/album.php';
    // </script>";
}
