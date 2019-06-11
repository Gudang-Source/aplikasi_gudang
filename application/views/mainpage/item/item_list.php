<!-- page head start-->
<div class="page-head">
	<h3>
		Dashboard
	</h3>
	<span class="sub-title">Welcome to inventory app</span>
</div>
<!-- page head end-->

<!--body wrapper start-->
<div class="wrapper">
	<div class="row">
		<div class="col-md-12">
			<section class="panel">
				<div class="panel-body">
					<a href="<?php echo site_url('inventory/create')?>" class="btn btn-primary btn-cons" >New Item</a>
					<table class="table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Item</th>
								<th>Jenis Item</th>
								<th>Stok</th>
								<th>Created At</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(!empty($data)){
								foreach ($data as $key => $row) :
									?>
									<tr>
										<td>
											<?php echo $start++?>
										</td>
										<td>
											<?php echo $row->nama_barang?>
										</td>
										<td>
											<?php echo $row->jenis_barang?>
										</td>
										<td>
											<?php echo $row->stok?>
										</td>
										<td>
											<?php echo $row->created_at?>
										</td>
										<td>
											<button type="button" class="btn btn-primary add-stok-form" data-id="<?php echo $row->id?>" data-nama="<?php echo $row->nama_barang?>" data-stok="<?php echo $row->stok?>" data-toggle="modal" data-target="#addStok">
												Tambah Stok
											</button>
											<button type="button" class="btn btn-danger min-stok-form" data-id="<?php echo $row->id?>" data-nama="<?php echo $row->nama_barang?>" data-stok="<?php echo $row->stok?>" data-toggle="modal" data-target="#minusStok">
												Kurangi Stok
											</button>
										</td>
										<td class="text-center">
											<a href="<?php echo site_url('users/read/'.$row->id); ?>" title="View" class="btn-xs btn-default"><i class="fa fa-eye"></i></a> |
											<a href="<?php echo site_url('users/edit/'.$row->id); ?>" title="Edit" class="btn-xs btn-default"><i class="fa fa-pencil"></i></a> | <a href="<?php echo site_url('users/delete/'.$row->id); ?>" onClick="return confirm('Are you sure?')" title="Delete" class=" btn-xs btn-danger"><i class="fa fa-trash"></i></a>
										</td>
									</tr>
									<?php
								endforeach;
							}
							?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2">
									Total Record : <?php echo $total_record ?>
								</td>
								<td colspan="5" align="right"><?php echo $pagination ?></td>
							</tr>
						</tfoot>
					</table>	
				</div>
			</section>
		</div>
	</div>

<!--  Modal Tambah Barang-->
  <div class="modal" id="addStok">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Stok</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body tambah">
          <form action="<?php echo site_url('inventory/deposit')?>" method="post">
		    <div class="form-group">
		      <label for="email">Stok Saat ini :</label>
		      <input type="hidden" id="tambah-id" name="id">
		      <input type="text" class="form-control" id="add-stok-before" readonly>
		    </div>

		    <div class="form-group">
		      <label for="email">Stok Terbaru :</label>
		      <input type="text" class="form-control" id="add-stok-after" readonly>
		    </div>

		    <div class="form-group">
		      <label for="pwd">Input Stok:</label>
		      <input type="number" min="0" class="form-control" id="addstok" placeholder="Masukan Jumlah" name="stok">
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!--  Modal Minus Barang-->
  <div class="modal" id="minusStok">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Minus Stok</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body minus">
          <form action="<?php echo site_url('inventory/withdrawal')?>" method="post">
		    <div class="form-group">
		      <label for="stok-before">Stok Saat ini :</label>
		      <input type="hidden" id="minus-id" name="id">
		      <input type="text" class="form-control" id="min-stok-before" readonly>
		    </div>

		    <div class="form-group">
		      <label for="stok-after">Stok Terbaru :</label>
		      <input type="text" class="form-control" id="min-stok-after" readonly>
		    </div>

		    <div class="form-group">
		      <label for="pwd">Input Stok:</label>
		      <input type="number" min="0" class="form-control" id="minstok" placeholder="Masukan Jumlah" name="stok">
		    </div>
		    <button type="submit" class="btn btn-primary">Submit</button>
		  </form>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

</div>
<!--body wrapper end-->


