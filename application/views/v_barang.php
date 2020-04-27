<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Tabel <b>Barang</b></h2>
          </div>
          <?php if($this->session->userdata('level') == 2) { ?>
          <div class="col-sm-6">
            <a href="#addEmployeeModal" class="btn btn-default" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Barang</span></a>
          <?php } ?>
            <!-- <a href="http://localhost/web_gis_pro/index.php/home/"class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>KEMBALI KE MENU</span></a>  -->           
          </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
            
                        <th></th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Gudang</th>
                        <th>Harga</th>
                        <th>Kode Cabang</th>
                        <th>Lampiran</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>   
                    <?php 
                    $no=1;
                    foreach($datas as $b){ ?>
                        <tr>
                    <td><?php echo $b->barang_id; ?></td>
                    <td><?php echo $b->barang_nama; ?></td>
                    <td><?php echo $b->barang_jumlah; ?></td>
                    <td><?php echo $b->barang_diterima; ?></td>  
                    <td><?php echo $b->barang_harga; ?></td>  
                    <td><?php echo $b->kode_cabang; ?></td>   
                    <td><?php echo $b->barang_lampiran; ?>
                    <?php if($this->session->userdata('level') <= 2) { ?>
                    <a href="<?php echo base_url().'barang/download/'.$b->barang_id; ?>" class="fas fa-cloud-download-alt"><span class="glyphicon glyphicon-download-alt"></a>
                    <?php } ?>
                    </td>
                       
                      
                    <td>
                        <?php if($this->session->userdata('level') == 2) { ?>
                        <a href="<?php echo base_url(). 'barang/detail/' . $b->barang_id ?>"   class="view" title="Detail" data-toggle="tooltip"><i class="fas fa-info-circle"></i></a>
                        <?php } ?>
                        <?php if($this->session->userdata('level') <= 2) { ?>
                        <a href="<?php echo base_url(). 'barang/edit/' . $b->barang_id ?>"   class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <?php } ?>
                        <?php if($this->session->userdata('level') == 2) { ?>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="delete">&#xE872;</i></a>
                        <?php } ?>
                        <?php if($this->session->userdata('level') == 3) { ?>
                        <a href="<?php echo base_url(). 'barang/konfirmasi/' . $b->barang_id ?>" class="view" title="Confirm" data-toggle="tooltip"><i class="material-icons">&#xe877;</i></a>
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
                <form action="<?php echo base_url(). 'barang/hapus/'. $b->barang_id?>" method="post">
                    <div class="modal-header">                      
                        <h4 class="modal-title">HAPUS BARANG</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Anda Yakin ingin Menghapus akun ini?</p>
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
				<form action="<?php echo base_url(). 'index.php/barang/tambah_aksi'; ?> "method="post">
					<div class="modal-header">						
						<h4 class="modal-title">TAMBAH BARANG</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
							<input type="hidden" class="form-control" name="barang_id" placeholder="tagihan_id">
						</div>					
						<div class="form-group">
							<label>NAMA</label>
							<input type="text" class="form-control" name="barang_nama" placeholder="Barang Nama" required="required">
						</div>
                        <div class="form-group">
							<label>JUMLAH</label>
							<input type="number" class="form-control" name="barang_jumlah" placeholder="Jumlah Barang" required="required">
						</div>
                        <div class="form-group">
							<label>HARGA</label>
							<input type="text" class="form-control" name="barang_harga" placeholder="Harga Barang" required="required">
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
				</form>
			</div>
		</div>
	</div>
</body>
</html>                                                               