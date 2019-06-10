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


            </div>
            <!--body wrapper end-->
