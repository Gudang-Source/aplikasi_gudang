<!-- page head start-->
<div class="page-head">
	<h3>
		Create Item
	</h3>
	<span class="sub-title">Create Some Item</span>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">
					<form action="<?php echo $form_action?>" enctype="multipart/form-data" method="post" accept-charset="utf-8">
						<div class="form-group">
							<label for="nama_barang">Nama Item</label>
							<input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang; ?>">
							<?php echo form_error('name'); ?>
						</div>
						<div class="form-group">
							<label for="jenis_barang">Jenis Item</label>
							<input type="text" class="form-control" name="jenis_barang" value="<?php echo $jenis_barang?>">
							<?php echo form_error('jenis_barang'); ?>
						</div>
						<div class="form-group">
							<label for="stok">Stok Item</label>
							<input type="text" class="form-control" name="stok" value="<?php echo $stok?>">
							<?php echo form_error('stok'); ?>
						</div>
						<div class="form-group">
							<label for="deskripsi">Deskripsi Item</label>
							<input type="text" class="form-control" name="deskripsi" value="<?php echo $deskripsi?>">
							<?php echo form_error('deskripsi'); ?>
						</div>
						<div class="form-group">
							<label for="exampleInputEmail1">Image</label>
							<input type="file" class="form-control" name="item_img" size="20" >
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info" name="submit">Submit</button>
						</div>
					</form>
				</div>
			</section>
		</div>
	</div>


</div>
<!--body wrapper end-->
