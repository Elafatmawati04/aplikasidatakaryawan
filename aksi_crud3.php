<?php
//Panggil Koneksi Database
include "koneksi1.php";

//Uji jika tombol Simpan di klik
if(isset($_POST['bsimpan'])) {

    //Simpan Data Baru
    $simpan = mysqli_query($conn, "INSERT INTO data_master (id, nama, izin, masuk, keterangan) 
    VALUES('$_POST[tfid]', '$_POST[tfnama]', '$_POST[tfizin]' '$_POST[tfmasuk]', '$_POST[tfketerangan]')");

    //Jika simpan sukses
    if($simpan) {
        echo "<script>
                 alert('Simpan data Sukses!');
                 documen.location='master.php';
              </script>";
    }else {
        echo "<script>
                 alert('Simpan data Gagal!');
                 documen.location='master.php';
              </script>";
    }
}

//Uji jika tombol Edit di klik
if(isset($_POST['bedit'])) {

    //Simpan Data
    $bedit = mysqli_query($conn, "UPDATE data_master SET id = '$_POST[tfid]', nama = '$_POST[tfnama]', 
    izin = '$_POST[tfizin]', masuk = '$_POST[tfmasuk]', keterangan = '$_POST[keterangan]'' WHERE id = '$_POST[id]'");

    //Jika simpan sukses
    if($bedit) {
        echo "<script>
                 alert('Edit data Sukses!');
                 documen.location='master.php';
              </script>";
    }else {
        echo "<script>
                 alert('Edit data Gagal!');
                 documen.location='master.php';
              </script>";
    }
}

//Uji jika tombol Delete di klik
if(isset($_POST['bdelete'])) {

    //Delete Data
    $delete = mysqli_query($conn, "DELETE FROM data_master WHERE id = '$_POST[id]' ");

    //Jika simpan sukses
    if($delete) {
        echo "<script>
                 alert('Delete data Sukses!');
                 documen.location='master.php';
              </script>";
    }else {
        echo "<script>
                 alert('Delete data Gagal!');
                 documen.location='master.php';
              </script>";
    }
}



?>
