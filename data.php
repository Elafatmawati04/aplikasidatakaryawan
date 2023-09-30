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
             <h3 class="text-center">Pencatatan Data Karyawan</h3>
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
                        <th>Nama Karyawan</th>
                        <th>Jabatan</th>
                        <th>Email</th>
                        <th>No Telpon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                    <?php
                    //Persiapan untuk menampilkan data
                    $no = 1;
                    $tampil = mysqli_query($conn, "SELECT * FROM karyawan ORDER BY id DESC");
                    while($data = mysqli_fetch_array($tampil)) :
                    ?>

                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data['id'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['jabatan'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['no_tlp'] ?></td>
                        <td><?= $data['alamat'] ?></td>
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
                               <form method="POST" action="aksi_crud.php">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">

                               <div class="modal-body">
                              
                                        <div class="mb-3">
                                            <label class="form-label">ID Karyawan</label>
                                            <input type="text" class="form-control" name="tfid" value="<?= $data['id']?>" placeholder="Masukkan ID Karyawan">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Nama Karyawan</label>
                                             <input type="text" class="form-control" name="tfnama"  value="<?= $data['nama']?>" placeholder="Masukkan Nama Karyawan">
                                        </div>
                                        <div class="mb-3">
                                             <label class="form-label">Jabatan</label>
                                             <select class="from-select" name="tfjabatan">
                                                  <option value="<?= $data['jabatan']?>"><?= $data['jabatan']?></option>
                                                  <option value="IT Engginer">IT Engginer</option>
                                                  <option value="Network Administrator">Network Administrator</option>
                                                  <option value="Database Administrator">Database Administrator</option>
                                              </select>
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">Email</label>
                                             <input type="email" class="form-control" name="tfemail" value="<?= $data['email']?>" placeholder="Masukkan Email">
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">No Telpon</label>
                                             <input type="text" class="form-control" name="tfno_tlp" value="<?= $data['no_tlp']?>" placeholder="Masukkan No Telpon">
                                        </div>
                                        <div class="mb-3">
                                             <label  class="form-label">Alamat</label>
                                             <textarea class="form-control" name="tfalamat" rows="2">"<?= $data['alamat']?>"</textarea>
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
                               <form method="POST" action="aksi_crud.php">
                                    <input type="hidden" name="id" value="<?=$data['id'] ?>">

                               <div class="modal-body">
                                    
                                    <h5 class="text-center">Apakah anda yakin akan menghapus data ini?<br>
                                        <span class="text-danger"><?=$data['id']?> - <?=$data['nama']?></span>
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
                          <form method="POST" action="aksi_crud.php">
                          <div class="modal-body">
                              
                                   <div class="mb-3">
                                      <label class="form-label">ID Karyawan</label>
                                       <input type="text" class="form-control" name="tfid" placeholder="Masukkan ID Karyawan">
                                   </div>
                                   <div class="mb-3">
                                      <label class="form-label">Nama Karyawan</label>
                                       <input type="text" class="form-control" name="tfnama" placeholder="Masukkan Nama Karyawan">
                                   </div>
                                   <div class="mb-3">
                                      <label class="form-label">Jabatan</label>
                                      <select class="from-select" name="tfjabatan">
                                           <option></option>
                                           <option value="IT Engginer">IT Engginer</option>
                                           <option value="Network Administrator">Network Administrator</option>
                                           <option value="Database Administrator">Database Administrator</option>
                                      </select>
                                   </div>
                                   <div class="mb-3">
                                       <label  class="form-label">Email</label>
                                       <input type="email" class="form-control" name="tfemail" placeholder="Masukkan Email">
                                  </div>
                                  <div class="mb-3">
                                       <label  class="form-label">No Telpon</label>
                                       <input type="text" class="form-control" name="tfno_tlp" placeholder="Masukkan No Telpon">
                                  </div>
                                  <div class="mb-3">
                                       <label  class="form-label">Alamat</label>
                                       <textarea class="form-control" name="tfalamat" rows="2"></textarea>
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