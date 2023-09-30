<?php
//Panggil Koneksi Database
include "koneksi1.php";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendataan Karyawan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    
     <div class="container">
        <div class="mt-3">
             <h3 class="text-center">Master Data Karyawan</h3>
        </div>

        <div class="card mt-3">
           <div class="card-header">
                <div class="card-header bg-primary text-white">
                    Data Karyawan
           </div>
           <div class="card-body">
                
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
                    Tambah Data
                </button>

                 <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>No.</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Shift</th>
                        <th>Izin</th>
                        <th>Masuk</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    //Persiapan untuk menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($conn, "SELECT * FROM master ORDER BY id DESC");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['izin'] ?></td>
                        <td><?= $data['masuk'] ?></td>
                        <td><?= $data['keterangan'] ?></td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $no ?>">Edit</a>
                            <a href="#" class="btn btn-danger"data-bs-toggle="modal" data-bs-target="#modalDelete<?= $no ?>">Delete</a>
                        </td>
                    </tr>

                    <!-- Awal Modal  Edit -->
                    <div class="modal fade" id="modalEdit<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" 
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                       <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Data Karyawan</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <form method="POST" action="aksi_crud3.php">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">

                               <div class="modal-body">
                              
                                        <div class="mb-3">
                                            <label class="form-label">ID Karyawan</label>
                                            <input type="text" class="form-control" name="tfid" value="<?= $data['id']?>" placeholder="Masukkan ID Karyawan">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Nama</label>
                                             <input type="text" class="form-control" name="tfnama"  value="<?= $data['nama']?>" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Izin</label>
                                             <select class="from-select" name="tfizin">
                                                  <option value="<?= $data['izin']?>"><?= $data['izin']?></option>
                                                  <option value="Izin 1">Izin 1</option>
                                                  <option value="Izin 2">Izin 2</option>
                                                  <option value="Izin 3">Izin 3</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">Masuk</label>
                                             <input type="text" class="form-control" name="tfmasuk" value="<?= $data['masuk']?>" placeholder="Masukkan Data">
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">Keterangan</label>
                                             <textarea class="form-control" name="tfketerangan" rows="2">"<?= $data['keterangan']?>"</textarea>
                                        </div>
                             
                                 </div>
                                 <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="bedit">Edit</button>
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                 </div>
                                 </form>     
                              </div>
                          </div>
                      </div>
                     <!-- Akhir Modal Edit -->

                     <!-- Awal Modal  Delete -->
                    <div class="modal fade" id="modalDelete<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" 
                     tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                       <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                   <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <form method="POST" action="aksi_crud.php3">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">

                               <div class="modal-body">
                                    
                                    <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
                                        <span class="text-danger"><?=$data['id']?> - <?=$data['hari']?></span>
                                    </h5>     
                               
                                 </div>
                                 <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary" name="bdelete">Delete</button>
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                 </div>
                                 </form>     
                              </div>
                          </div>
                      </div>
                     <!-- Akhir Modal Delete -->

                    <?php endwhile; ?>
                </table>


                <!-- Awal Modal Tambah Data -->
                <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" 
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                   <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                               <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Data Karyawan</h5>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <form method="POST" action="aksi_crud2.php">
                          <div class="modal-body">
                              
                                        <div class="mb-3">
                                            <label class="form-label">ID Karyawan</label>
                                            <input type="text" class="form-control" name="tfid" value="<?= $data['id']?>" placeholder="Masukkan ID Karyawan">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Nama</label>
                                             <input type="text" class="form-control" name="tfnama"  value="<?= $data['nama']?>" placeholder="Masukkan Nama">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Izin</label>
                                             <select class="from-select" name="tfizin">
                                                  <option value="<?= $data['izin']?>"><?= $data['izin']?></option>
                                                  <option value="Izin 1">Izin 1</option>
                                                  <option value="Izin 2">Izin 2</option>
                                                  <option value="Izin 3">Izin 3</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">Masuk</label>
                                             <input type="text" class="form-control" name="tfmasuk" value="<?= $data['masuk']?>" placeholder="Masukkan Data">
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">Keterangan</label>
                                             <textarea class="form-control" name="tfketerangan" rows="2">"<?= $data['keterangan']?>"</textarea>
                                        </div>
                             
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                          </div>
                         </form>     
                      </div>
                   </div>
               </div>
               <!-- Akhir Modal Tambah Data -->


           </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>

</html>