<?php
//Panggil Koneksi Database
include "koneksi1.php";

//Uji jika tombol Simpan di klik
if(isset($_POST['bsimpan'])) {

    //Simpan Data Baru
    $simpan = mysqli_query($conn, "INSERT INTO karyawan (id, nama, jabatan, email, no_tlp, alamat) 
    VALUES('$_POST[tfid]', '$_POST[tfnama]', '$_POST[tfjabatan]', '$_POST[tfemail]', '$_POST[tfno_tlp]', '$_POST[tfalamat]')");

    //Jika simpan sukses
    if($simpan) {
        echo "<script>
                 alert('Simpan data Sukses!');
                 documen.location='data.php';
              </script>";
    }else {
        echo "<script>
                 alert('Simpan data Gagal!');
                 documen.location='data.php';
              </script>";
    }
}

//Uji jika tombol Edit di klik
if(isset($_POST['bedit'])) {

    //Simpan Data
    $bedit = mysqli_query($conn, "UPDATE karyawan SET id = '$_POST[tfid]', nama = '$_POST[tfnama]', 
    jabatan = '$_POST[tfjabatan]', email = '$_POST[tfemail]', no_tlp = '$_POST[tfno_tlp]', alamat = '$_POST[tfalamat]' WHERE id = '$_POST[id]'");

    //Jika simpan sukses
    if($bedit) {
        echo "<script>
                 alert('Edit data Sukses!');
                 documen.location='data.php';
              </script>";
    }else {
        echo "<script>
                 alert('Edit data Gagal!');
                 documen.location='data.php';
              </script>";
    }
}

//Uji jika tombol Delete di klik
if(isset($_POST['bdelete'])) {

    //Delete Data
    $delete = mysqli_query($conn, "DELETE FROM karyawan WHERE id = '$_POST[id]' ");

    //Jika simpan sukses
    if($delete) {
        echo "<script>
                 alert('Delete data Sukses!');
                 documen.location='data.php';
              </script>";
    }else {
        echo "<script>
                 alert('Delete data Gagal!');
                 documen.location='data.php';
              </script>";
    }
}



?>
