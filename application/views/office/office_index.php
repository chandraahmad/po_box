<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Office</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Office</a></li>
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
			          			<form class="form-horizontal" id="insert_office" method="POST" enctype="multipart/form-data">
				                    <div class="card-body">
                                        <div class="form-group row clearfix">
				                            <label class="col-sm-2 col-form-label">Have Regional ? *</label>
				                            <div class="col-sm-10">
												<div class="icheck-primary d-inline">
													<input type="radio" class="regval" id="Regional1" name="office_regional_val" value="2" onchange="getRegional(this)" required>
													<label for="Regional1">
														Yes
													</label>
												</div>
												<div class="icheck-primary d-inline">
													<input type="radio" class="regval" id="Regional2" name="office_regional_val" value="1" onchange="getRegional(this)" required>
													<label for="Regional2">
														No
													</label>
												</div>
				                            </div>
				                        </div>
                                        <div class="form-group row showregional">
				                        </div>
				                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Office Name *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="office_name" class="form-control form-control-sm" placeholder="Office Name *" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Address *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="office_address" class="form-control form-control-sm" placeholder="Address *" required>
				                            </div>
				                        </div>
                                        <div class="form-group row clearfix">
				                            <label class="col-sm-2 col-form-label">Status *</label>
				                            <div class="col-sm-10">
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status1" name="office_status" value="1">
													<label for="Status1">
														Active
													</label>
												</div>
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status2" name="office_status" value="2">
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
				                	<h3 class="card-title">Office List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="office-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Office Name</th>
												<th>Address</th>
                                                <th>Regional</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllOffice as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->office_name ?></td>
												<td><?= $value->office_address ?></td>
                                                <td><?= ($value->office_regional == '1' ? $value->office_name : $this->OfficeModel->get_byid_office($value->office_regional)->office_name) ?></td>
												<td><?= ($value->office_status == '1' ? 'Active' : 'Not Active') ?></td>
												<td>
													<a href="javascript:;" class="btn btn-sm btn-warning getbyidoffice" data-id="<?= $value->office_id ?>"><i class="far fa-edit"></i></a>
													<a href="javascript:;" class="btn btn-sm btn-danger confirm" data-id="<?= $value->office_id ?>"><i class="far fa-trash-alt"></i></a>
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
	  	<div class="modal fade" id="officeupdate">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="update_office" method="POST" enctype="multipart/form-data">
						<div class="modal-body msgoffice-body">
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