<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Po Box <?= $GetByIdPoBox->pobox_id ?></h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Po Box <?= $GetByIdPoBox->pobox_id ?></a></li>
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
			          			<form class="form-horizontal" id="insert_sort" method="POST" enctype="multipart/form-data">
				                    <div class="card-body">
				                    	<input type="hidden" name="shipment_pobox" value="<?= $GetByIdPoBox->pobox_id ?>">
				                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Barcode / Resi Number *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="shipment_barcode" class="form-control form-control-sm" placeholder="Barcode / Resi Number" required autofocus>
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
				                	<h3 class="card-title">Shipment List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="sort-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Barcode / Resi Number</th>
												<th>Po Box</th>
												<th>Action</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllByIdShipment as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->shipment_barcode ?></td>
												<td><?= $value->shipment_pobox ?></td>
												<th>
													<a href="javascript:;" class="btn btn-sm btn-danger confirm" data-id="<?= $value->shipment_id ?>"><i class="far fa-trash-alt"></i></a>
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
	  	<?php $this->load->view('layouts/content_footer.php'); ?>
  	</div>
</body>