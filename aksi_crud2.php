<?php
//Panggil Koneksi Database
include "koneksi1.php";

//Uji jika tombol Simpan di klik
if(isset($_POST['bsimpan'])) {

    //Simpan Data Baru
    $simpan = mysqli_query($conn, "INSERT INTO absensi (id, hari, sift, bagian) 
    VALUES('$_POST[tfid]', '$_POST[tfhari]', '$_POST[tfsift]', '$_POST[tfbagian]')");

    //Jika simpan sukses
    if($simpan) {
        echo "<script>
                 alert('Simpan data Sukses!');
                 documen.location='absensi.php';
              </script>";
    }else {
        echo "<script>
                 alert('Simpan data Gagal!');
                 documen.location='absensi.php';
              </script>";
    }
}

//Uji jika tombol Edit di klik
if(isset($_POST['bedit'])) {

    //Simpan Data
    $bedit = mysqli_query($conn, "UPDATE absensi SET id = '$_POST[tfid]', hari = '$_POST[tfhari]', 
    sift = '$_POST[tfsift]', bagian = '$_POST[tfbagian]' WHERE id = '$_POST[id]'");

    //Jika simpan sukses
    if($bedit) {
        echo "<script>
                 alert('Edit data Sukses!');
                 documen.location='absensi.php';
              </script>";
    }else {
        echo "<script>
                 alert('Edit data Gagal!');
                 documen.location='absensi.php';
              </script>";
    }
}

//Uji jika tombol Delete di klik
if(isset($_POST['bdelete'])) {

    //Delete Data
    $delete = mysqli_query($conn, "DELETE FROM absensi WHERE id = '$_POST[id]' ");

    //Jika simpan sukses
    if($delete) {
        echo "<script>
                 alert('Delete data Sukses!');
                 documen.location='absensi.php';
              </script>";
    }else {
        echo "<script>
                 alert('Delete data Gagal!');
                 documen.location='absensi.php';
              </script>";
    }
}



?>
