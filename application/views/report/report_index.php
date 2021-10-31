<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Report</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Report</a></li>
				            </ol>
			          	</div>
			        </div>
		      	</div>
		    </div>

		    <section class="content">
		      	<div class="container-fluid">
			        <div class="row">
			        	<div class="col-lg-12 col-12">
			        		<div class="card">
				        		<div class="card-header">
				                	<h3 class="card-title">Report List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="report-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Officer Name</th>
												<th>Barcode/Resi Number</th>
												<th>Po Box</th>
												<th>Date Entry</th>
												<th>Status</th>
                                                <th>Status Date</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllShipment as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $this->ReportModel->get_byid_user($value->shipment_officer)->user_name ?></td>
												<td><?= $value->shipment_barcode ?></td>
												<td><?= $value->shipment_pobox ?></td>
												<td><?= $value->shipment_date_entry ?></td>
												<td><?= ($value->shipment_status == 0 ? 'Not taken yet' : 'Already taked') ?></td>
                                                <td><?= $value->shipment_status_date ?></td>
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