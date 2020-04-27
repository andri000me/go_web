<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Tabel <b>Tagihan</b></h2>
          </div>
          <?php if($this->session->userdata('level') == 2) { ?>
          <div class="col-sm-6">
            <a href="#addEmployeeModal" class="btn btn-white" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Tagihan</span></a>
            <!-- <a href="http://localhost/web_gis_pro/index.php/home/"class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>KEMBALI KE MENU</span></a>  -->           
          </div>
          <?php } ?>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nama Tagihan</th>
                        <th>Tanggal Tagihan</th>
                        <th>Kode Cabang</th>
                        <th>Nota Tagihan</th>
                        <th>Nota Pembayaran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>   
                
                    <?php 
                    $no=1;
                    foreach($datas as $b){ ?>
                        <tr>
                    <td><?php echo $b->tagihan_id; ?></td>
                    <td><?php echo $b->tagihan_nama; ?></td>
                    <td><?php echo $b->tagihan_tanggal; ?></td>
                    <td><?php echo $b->kode_cabang; ?></td>   
                    <td><?php echo $b->tagihan_pra; ?>
                      <a href="<?php echo base_url().'tagihan/download_tagihanpra/'.$b->tagihan_id; ?>" class="fas fa-cloud-download-alt"><span class="glyphicon glyphicon-download-alt"></a>
                    </td>   
                    <td><?php echo $b->tagihan_pasca; ?>
                      <a href="<?php echo base_url().'tagihan/download_tagihanpasca/'.$b->tagihan_id; ?>" class="fas fa-cloud-download-alt"><span class="glyphicon glyphicon-download-alt"></a>
                    </td>   
                    <td>
                        <a href="<?php echo base_url(). 'tagihan/edit/' . $b->tagihan_id ?>"   class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <?php if($this->session->userdata('level') == 2) { ?>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="delete">&#xE872;</i></a>
                        <?php } ?>
                    </td>
                    <?php } ?>
                        </tr>
            </tbody>
            </table>
    </div>
  <!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url(). 'tagihan/hapus/'. $b->tagihan_id?>" method="post">
                    <div class="modal-header">                      
                        <h4 class="modal-title">HAPUS TAGIHAN</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Anda Yakin ingin Menghapus tagihan ini?</p>
                        <p class="text-warning"><small>aksi ini tidak bisa di ulangi</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <?php echo form_open_multipart('tagihan/tambah_aksi'); ?>
     <div class="modal-header">      
      <h4 class="modal-title">TAMBAH TAGIHAN</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">
     <div class="form-group">
       <input type="hidden" class="form-control" name="tagihan_id" placeholder="tagihan_id">
      </div>     
      <div class="form-group">
       <label>NAMA</label>
       <input type="text" class="form-control" name="tagihan_nama" placeholder="Nama Tagihan" required="required">
      </div>
      <div class="form-group">
        <label>NOTA TAGIHAN</label>
        <input type="file" class="form-control" name="tagihan_pra" placeholder="Nota Tagihan" required="required">
      </div>
      <div class="form-group">
        <label>KODE</label>
        <input type="number" class="form-control" name="kode_cabang" placeholder="Kode Cabang" required="required">
      </div>    
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-danger" value="Add">
     </div>
            <?php echo form_close(); ?>
   </div>
  </div>
 </div>
</body>
</html>                                                               