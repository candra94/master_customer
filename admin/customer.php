<?php include 'header.php'; ?>

<div class="content-wrapper">

  <section class="content-header">
    <h1>
      Data Customer
    </h1>
    <ol class="breadcrumb">
      <!-- <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> -->
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <section class="col-lg-12">
        <div class="box box-info">

          <div class="box-header">
            <div class="btn-group pull-right">            

              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"></i> &nbsp Tambah Customer
              </button>
            </div>
          </div>
          <div class="box-body">

            


            <div class="table-responsive">
              <table class="table table-bordered table-striped" id="table-datatable">
                <thead>
                  <tr>
                    <th width="1%">NO</th>
                    <th>Nama Customer</th>
                    <th>Email</th>
                    <th>Nama PIC 1</th>
                    <th>Contact PIC 1</th>
                    <th>Nama PIC 2</th>
                    <th>Contact PIC 2</th>
                    <th>Alamat</th>
                    <th width="10%">OPSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  include '../koneksi.php';
                  $no=1;
                  $data = mysqli_query($koneksi,"SELECT * FROM customer ORDER BY customer_id DESC");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_customer']; ?></td>
                      <td><?php echo $d['email']; ?></td>
                      <td><?php echo $d['nama_pic1']; ?></td>
                      <td><?php echo $d['contact_pic1']; ?></td>
                      <td><?php echo $d['nama_pic2']; ?></td>
                      <td><?php echo $d['contact_pic2']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>

                      <td>    
                        <?php 
                        if($d['customer_id'] != 1){
                          ?> 
                          <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit_customer_<?php echo $d['customer_id'] ?>">
                            <i class="fa fa-cog"></i>
                          </button>

                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus_customer_<?php echo $d['customer_id'] ?>">
                            <i class="fa fa-trash"></i>
                          </button>
                          <?php 
                        }
                        ?>
                        <!-- Modal Edit Customer-->
                        <form action="customer_update.php" method="post">
                          <div class="modal fade" id="edit_customer_<?php echo $d['customer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                  <div class="form-group" style="width:100%">
                                    <label>Nama Castomer</label>
                                    <input type="hidden" name="id" required="required" class="form-control" placeholder="Nama Customer .." value="<?php echo $d['customer_id']; ?>">
                                    <input type="text" name="nama_customer" required="required" class="form-control" value="<?php echo $d['nama_customer']; ?>" style="width:100%">
                                    <label>Email</label>
                                    <input type="text" name="email" required="required" class="form-control" value="<?php echo $d['email']; ?>" style="width:100%">
                                    <label>Contact PIC 1</label>
                                    <input type="text" name="contact_pic1" required="required" class="form-control" value="<?php echo $d['contact_pic1']; ?>" style="width:100%">
                                    <label>Contact PIC 2</label>
                                    <input type="text" name="contact_pic2" required="required" class="form-control" value="<?php echo $d['contact_pic2']; ?>" style="width:100%">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" required="required" class="form-control" value="<?php echo $d['alamat']; ?>" style="width:100%">
                                    <label>Keterangan</label>
                                    <input type="text" name="keterangan" required="required" class="form-control" value="<?php echo $d['keterangan']; ?>" style="width:100%">
                                  </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>

                        <!-- modal hapus -->
                        <div class="modal fade" id="hapus_customer_<?php echo $d['customer_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">

                                <p>Yakin ingin menghapus data ini ?</p>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                <a href="customer_hapus.php?id=<?php echo $d['customer_id'] ?>" class="btn btn-primary">Hapus</a>
                              </div>
                            </div>
                          </div>
                        </div>

                      </td>
                    </tr>

            <!-- Modal Tambah Customer-->
            <form action="customer_act.php" method="post">
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Customer</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" name="nama_customer" required="required" class="form-control" placeholder="Nama Customer ...">
                      </div>
                      <div class="form-group ">
                        <label>Sales</label>
                        <input type="text" name="keterangan" value="<?php echo $d['marketing']; ?>" class="form-control" disabled>
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email ...">
                      </div>
                      <div class="form-group">
                      <label>Nama PIC 1</label>
                        <div class="row">
                          <div class="col-xs-5">
                            <input type="text" size="50%" name="nama_pic1" required="required" class="form-control" placeholder="Nama PIC ...">
                          </div>
                          <div class="col-xs-5">
                            <input type="number" size="14" name="contact_pic1" class="form-control" required="required" placeholder="Contact PIC ...">
                          </div>
                       </div>
                      </div>
                      <div class="form-group">
                      <label>Nama PIC 2</label>
                        <div class="row">
                          <div class="col-xs-5">
                            <input type="text" size="50%" name="nama_pic2" required="required" class="form-control" placeholder="Nama PIC ...">
                          </div>
                          <div class="col-xs-5">
                            <input type="number" size="14" name="contact_pic2" class="form-control" required="required" placeholder="Contact PIC ...">
                          </div>
                       </div>
                      </div>
                      <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat ..">
                      </div>
                      <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control" placeholder="Keterangan ..">
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>


                    <?php 
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </section>
    </div>
  </section>

</div>
<?php include 'footer.php'; ?>