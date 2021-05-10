<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Po Box</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Po Box</a></li>
				            </ol>
			          	</div>
			        </div>
		      	</div>
		    </div>

		    <section class="content">
		      	<div class="container-fluid">
			        <div class="row">
			          	<div class="col-lg-12 col-12">
			          		<div class="card card-info">
			          			<form class="form-horizontal" id="insert_pobox" method="POST" enctype="multipart/form-data">
				                    <div class="card-body">
				                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Po Box Number *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="pobox_id" class="form-control form-control-sm" placeholder="Po Box Number" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Office *</label>
				                            <div class="col-sm-10">
												<select class="form-control form-control-sm select-office" name="pobox_office" style="width: 100%;" required>
													<option value="" selected="selected">Office *</option>
                                                    <?php foreach ($GetAllOffice as $key => $value) { ?>
													<option value="<?= $value->office_id ?>"><?= $value->office_name ?></option>
                                                    <?php } ?>
												</select>
				                            </div>
				                        </div>
										<div class="form-group row clearfix">
				                            <label class="col-sm-2 col-form-label">Status *</label>
				                            <div class="col-sm-10">
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status1" name="pobox_status" value="1" required>
													<label for="Status1">
														Active
													</label>
												</div>
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status2" name="pobox_status" value="2" required>
													<label for="Status2">
														Not Active
													</label>
												</div>
				                            </div>
				                        </div>
				                    </div>
				                    <div class="card-footer">
				                        <button type="submit" class="btn btn-primary float-right">Save</button>
				                    </div>
								</form>
			          		</div>
			          	</div>
			        </div>

			        <div class="row">
			        	<div class="col-lg-12 col-12">
			        		<div class="card">
				        		<div class="card-header">
				                	<h3 class="card-title">Po Box List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="pobox-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Po Box Number</th>
												<th>Office</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllPoBox as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->pobox_id ?></td>
												<td><?= $this->PoBoxModel->get_byid_office($value->pobox_office)->office_name ?></td>
												<td><?= ($value->pobox_status == '1' ? 'Active' : 'Not Active') ?></td>
												<td>
													<a href="javascript:;" class="btn btn-sm btn-warning getbyidpobox" data-id="<?= $value->pobox_id ?>"><i class="far fa-edit"></i></a>
													<a href="javascript:;" class="btn btn-sm btn-danger confirm" data-id="<?= $value->pobox_id ?>"><i class="far fa-trash-alt"></i></a>
												</td>
											</tr>
											<?php } ?>
										</tbody>
				              		</table>
				              	</div>
				        	</div>
			        	</div>
			        </div>
	     	 	</div>
	    	</section>
	  	</div>
	  	<div class="modal fade" id="poboxupdate">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="update_pobox" method="POST" enctype="multipart/form-data">
						<div class="modal-body msgpobox-body">
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-primary">Save</button>
							<button type="button" class="btn btn-dark" data-dismiss="modal">Close</button> 
						</div>
					</form>
				</div>
			</div>
		</div>
	  	<?php $this->load->view('layouts/content_footer.php'); ?>
  	</div>
</body>