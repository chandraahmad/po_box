<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Order Transaction</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Order Transaction</a></li>
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
				                	<h3 class="card-title">Order Transaction List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="order-table" class="table table-bordered table-hover">
				              			<thead>
											<tr>
												<th>#</th>
												<th>Transaction Number</th>
												<th>Po Box Number</th>
												<th>Customer</th>
												<th>Total Price</th>
												<th>Rental Date From</th>
												<th>Rental Date Until</th>
												<th>Rental Month</th>
												<th>Status</th>
												<th>Date Transaction</th>
												<th>Proof of payment</th>
												<th>Action</th>
											</tr>
										</thead>
		                  				<tbody>
											<?php $no = 1; foreach ($GetAllTransaction as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->transaction_id ?></td>
												<td><?= $value->transaction_pobox ?></td>
												<td><?= $value->transaction_user ?></td>
												<td><?= number_format($value->transaction_total_price); ?></td>
												<td><?= $value->transaction_from_date ?></td>
												<td><?= $value->transaction_until_date ?></td>
												<td><?= $value->transaction_month ?></td>
												<td>
													<?= ($value->transaction_status == '1' ? 'Order' : '') ?>
													<?= ($value->transaction_status == '2' ? 'Payment confirmation' : '') ?>
													<?= ($value->transaction_status == '3' ? 'Paid' : '') ?>
												</td>
												<td><?= $value->transaction_date ?></td>
												<td><img src="<?= base_url('assets/') ?>bukti_pembayaran/<?= $value->transaction_id ?>.png" style="width: 300px; height: 200px;"></td>
												<td>
													<?php if ($value->transaction_status == '2' && file_exists(base_url('assets/bukti_pembayaran/'.$value->transaction_id.'.png')) == false) { ?>
														<a href="javascript:;" class="btn btn-sm btn-primary confirmPayment" data-id="<?= $value->transaction_id ?>">Confirm Payment</a>
													<?php } ?>
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