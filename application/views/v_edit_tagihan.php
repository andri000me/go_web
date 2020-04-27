<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style type="text/css">
	body {
		color: #fff;
		background: #4c535d;
		font-family: 'Roboto', sans-serif;
	}
    .form-control {
        min-height: 41px;
		box-shadow: none;
		border-color: #e1e4e5;
	}
    .form-control:focus {
		border-color: #5fcaba;
	}
    .form-control, .btn {        
        border-radius: 3px;
    }    
	.signup-form {
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}	
    .signup-form form {
		color: #9ba5a8;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group {
		margin-bottom: 20px;
	}
    .signup-form label {
		font-weight: normal;
		font-size: 13px;
	}
    .signup-form .btn {        
        font-size: 16px;
        font-weight: bold;
		background: #428bca;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus {
		background: #3fc0ad;
        outline: none !important;
	}
	.signup-form a {
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover {
		text-decoration: none;
	}
	.signup-form form a {
		color: #5fcaba;
		text-decoration: none;
	}	
	.signup-form form a:hover {
		text-decoration: underline;
	}
</style>
</head>
<body>
<?php foreach($tagihan_tbl as $b){ ?>	
    <div class="signup-form">
	<!-- <form action="<?php echo form_open_multipart('tagihan/update'); ?>" method="post"> -->
    <?php echo form_open_multipart('tagihan/update'); ?>
        <h2>EDIT DATA TAGIHAN</h2>
		<p>PASTIKAN DATA BENAR</p>
        <p>Penyuntingan data tagihan Ganesha Operation</p>
		<hr>
        <div class="form-group">
        	<input type="hidden" class="form-control" name="tagihan_id" value="<?php echo $b->tagihan_id ?>" placeholder="id" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="tagihan_nama" value="<?php echo $b->tagihan_nama ?>" placeholder="Nama tagihan" required="required">
        </div> 
        <div class="form-group">
            <input type="number" class="form-control" name="kode_cabang" value="<?php echo $b->kode_cabang ?>" placeholder="Kode Cabang" required="required">
        </div> 
		<div class="form-group">
            <input type="text" class="form-control" name="tagihan_pra" value="<?php echo $b->tagihan_pra ?>" placeholder="Nota Tagihan">
        </div>
        <?php if($this->session->userdata('level') == 1) { ?>  
		<div class="form-group">
            <input type="file" class="form-control" name="tagihan_pasca" value="<?php echo $b->tagihan_pasca ?>" placeholder="Nota Pembayaran">
        </div>
        <?php } ?>
        <div class="form-group">
		<button style= "background-color: #c23616" type="submit" class="btn btn-danger btn-block btn-lg">MASUKAN DATA</button>
        </div>
        <div class="form-group" >
		<a style="color: #ffffff; background-color: #c23616"  class="btn btn-primary btn-block btn-lg" onclick="location.href='<?php echo base_url();?>tagihan/index'">BATAL</a>
        </div>
		<?php echo form_close(); 
		if($this->session->flashdata('success')){
			?>
			<div class="alert alert-success text-center" style="margin-top:20px;">
			 <?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php
		   }
	   
		   if($this->session->flashdata('error')){
			?>
			<div class="alert alert-danger text-center" style="margin-top:20px;">
			 <?php echo $this->session->flashdata('error'); ?>
			</div>
			<?php
		   }
		?>
	</div>
   <?php } ?>
</body>
</html>