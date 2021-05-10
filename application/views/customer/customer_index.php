<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Customer</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Customer</a></li>
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
			          			<form class="form-horizontal" id="insert_customer" method="POST" enctype="multipart/form-data">
				                    <div class="card-body">
				                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Customer Name *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="customer_name" class="form-control form-control-sm" placeholder="Customer Name *" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Address *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="customer_address" class="form-control form-control-sm" placeholder="Address *" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">PIC *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="customer_pic" class="form-control form-control-sm" placeholder="PIC *" required>
				                            </div>
				                        </div>
                                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Contact *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="customer_contact" class="form-control form-control-sm" placeholder="Contact *" required>
				                            </div>
				                        </div>
                                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Email *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="customer_email" class="form-control form-control-sm" placeholder="Email *" required>
				                            </div>
				                        </div>
										<div class="form-group row clearfix">
				                            <label class="col-sm-2 col-form-label">Status *</label>
				                            <div class="col-sm-10">
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status1" name="customer_status" value="1">
													<label for="Status1">
														Active
													</label>
												</div>
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status2" name="customer_status" value="2">
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
				                	<h3 class="card-title">Customer List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="customer-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Customer Name</th>
												<th>Address</th>
                                                <th>Pic</th>
                                                <th>Contact</th>
                                                <th>Email</th>
												<th>Status</th>
                                                <th>User</th>
												<th>Action</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllCustomer as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->customer_name ?></td>
												<td><?= $value->customer_address ?></td>
                                                <td><?= $value->customer_pic ?></td>
                                                <td><?= $value->customer_contact ?></td>
                                                <td><?= $value->customer_email ?></td>
												<td><?= ($value->customer_status == '1' ? 'Active' : 'Not Active') ?></td>
                                                <td><?= $value->user_name ?></td>
												<td>
													<a href="javascript:;" class="btn btn-sm btn-warning getbyidcustomer" data-id="<?= $value->customer_id ?>"><i class="far fa-edit"></i></a>
													<a href="javascript:;" class="btn btn-sm btn-danger confirm" data-id="<?= $value->customer_id ?>"><i class="far fa-trash-alt"></i></a>
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
	  	<div class="modal fade" id="customerupdate">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="update_customer" method="POST" enctype="multipart/form-data">
						<div class="modal-body msgcustomer-body">
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