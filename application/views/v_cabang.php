<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
            <h2>Tabel <b>Cabang</b></h2>
          </div>
          <?php if($this->session->userdata('level') == 1) { ?>
          <div class="col-sm-6">
            <a href="#addEmployeeModal" class="btn btn-white" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Cabang</span></a>
            <!-- <a href="http://localhost/web_gis_pro/index.php/home/"class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>KEMBALI KE MENU</span></a>  -->           
          </div>
          <?php } ?>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Kode Cabang</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>   
                    <?php 
                    $no=1;
                    foreach($datas as $b){ ?>
                        <tr>
                    <td><?php echo $b->kode_cabang; ?></td>
                    <td><?php echo $b->cabang_nama; ?></td>  
                    <td><?php echo $b->cabang_alamat; ?></td> 
                    <?php if($this->session->userdata('level') == 1) { ?>
                    <td>
                        <a href="<?php echo base_url(). 'index.php/cabang/edit/' . $b->kode_cabang ?>"   class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="delete">&#xE872;</i></a>
                        </a>
                    </td>
                    <?php } ?>
                    <?php } ?>
                        </tr>
            </tbody>
            </table>
      
    <!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="<?php echo base_url(). 'cabang/hapus/'. $b->kode_cabang?>" method="post">
                    <div class="modal-header">                      
                        <h4 class="modal-title">HAPUS CABANG</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">                    
                        <p>Anda Yakin ingin Menghapus cabang ini?</p>
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
				<form action="<?php echo base_url(). 'index.php/cabang/tambah_aksi'; ?> "method="post">
					<div class="modal-header">						
						<h4 class="modal-title">TAMBAH CABANG</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
					<div class="form-group">
                            <label>KODE</label>
							<input type="number" class="form-control" name="kode_cabang" placeholder="Kode Cabang" required="required">
						</div>					
						<div class="form-group">
							<label>NAMA</label>
							<input type="text" class="form-control" name="cabang_nama" placeholder="cabang Nama" required="required">
						</div>
						<div class="form-group">
							<label>ALAMAT</label>
							<input type="text" class="form-control" name="cabang_alamat" placeholder="Alamat Cabang" required="required">
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