<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">User</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">User</a></li>
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
			          			<form class="form-horizontal" id="insert_user" method="POST" enctype="multipart/form-data">
				                    <div class="card-body">
				                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Name *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="user_name" class="form-control form-control-sm" placeholder="Name" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Email *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="user_email" class="form-control form-control-sm" placeholder="Email" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Password *</label>
				                            <div class="col-sm-10">
				                                <input type="password" name="user_password" class="form-control form-control-sm" placeholder="Password" required>
				                            </div>
				                        </div>
										<div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Type *</label>
				                            <div class="col-sm-10">
												<select class="form-control form-control-sm select-typeuser" name="user_type" style="width: 100%;">
													<option value="" selected="selected">Type *</option>
													<option value="1">Super Administrator</option>
													<option value="2">Administrator</option>
													<option value="3">User</option>
												</select>
				                            </div>
				                        </div>
										<div class="form-group row clearfix">
				                            <label class="col-sm-2 col-form-label">Status *</label>
				                            <div class="col-sm-10">
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status1" name="user_status" value="1">
													<label for="Status1">
														Active
													</label>
												</div>
												<div class="icheck-primary d-inline">
													<input type="radio" id="Status2" name="user_status" value="2">
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
				                	<h3 class="card-title">User List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="user-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Name</th>
												<th>Email</th>
												<th>Status</th>
												<th>Type</th>
												<th>Action</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllUser as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->user_name ?></td>
												<td><?= $value->user_email ?></td>
												<td><?= ($value->user_status == '1' ? 'Active' : 'Not Active') ?></td>
												<td><?= ($value->user_type == '1' ? 'Super Administrator' : '') ?><?= ($value->user_type == '2' ? 'Administrator' : '') ?><?= ($value->user_type == '3' ? 'User' : '') ?><?= ($value->user_type == '4' ? 'Customer' : '') ?></td>
												<td>
													<a href="javascript:;" class="btn btn-sm btn-warning getbyiduser" data-id="<?= $value->user_id ?>"><i class="far fa-edit"></i></a>
													<a href="javascript:;" class="btn btn-sm btn-danger confirm" data-id="<?= $value->user_id ?>"><i class="far fa-trash-alt"></i></a>
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
	  	<div class="modal fade" id="userupdate">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<form id="update_user" method="POST" enctype="multipart/form-data">
						<div class="modal-body msguser-body">
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