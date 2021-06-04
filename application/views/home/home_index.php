<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Dashboard</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Home</a></li>
				              	<li class="breadcrumb-item active">Dashboard v1</li>
				            </ol>
			          	</div>
			        </div>
		      	</div>
		    </div>

		    <section class="content">
		      	<div class="container-fluid">
			        <div class="row">
			          	<div class="col-lg-3 col-6">
				            <div class="small-box bg-info">
				              	<div class="inner">
				                	<h4><?= count($GetAllUser) ?></h4>
				                	<p>User/Customer Active</p>
				              	</div>
				              	<div class="icon">
				                	<i class="fas fa-user-tie"></i>
				              	</div>
				            </div>
			          	</div>

			          	<div class="col-lg-3 col-6">
				            <div class="small-box bg-success">
				              	<div class="inner">
				                	<h4><?= count($GetAllTransaction) ?></h4>
				                	<p>Total Transaction</p>
				              	</div>
				              	<div class="icon">
				                	<i class="fas fa-shopping-cart"></i>
				              	</div>
				            </div>
			          	</div>

			          	<div class="col-lg-3 col-6">
				            <div class="small-box bg-warning">
				              	<div class="inner">
				                	<h4><?= number_format($GetIncome->income); ?></h4>
				                	<p>Total Income</p>
				              	</div>
				              	<div class="icon">
				                	<i class="fas fa-dollar-sign"></i>
				              	</div>
				            </div>
			          	</div>

			          	<div class="col-lg-3 col-6">
				            <div class="small-box bg-danger">
				              	<div class="inner">
					                <h4><?= number_format($GetExpenses->expenses) ?></h4>
					                <p>Total Expenses</p>
				              	</div>
				              	<div class="icon">
				                	<i class="ion ion-pie-graph"></i>
				              	</div>
				            </div>
			          	</div>
			        </div>

					<div class="row">
						<?php foreach ($GetAllPoBox as $key => $value) { 
							if($value->pobox_status_sale == '0') {
						?>
							<div class="col-12 col-sm-6 col-md-2">
								<div class="info-box">
									<span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
									<div class="info-box-content">
										<span class="info-box-text"><?= $value->pobox_id ?></span>
									</div>
								</div>
							</div>
						<?php }elseif ($value->pobox_status_sale == '1') { ?>
							<div class="col-12 col-sm-6 col-md-2">
								<div class="info-box">
									<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-box"></i></span>
									<div class="info-box-content">
										<span class="info-box-text"><?= $value->pobox_id ?></span>
										<span class="info-box-number">Booked</span>
									</div>
								</div>
							</div>
						<?php }elseif ($value->pobox_status_sale == '2') { ?>
							<div class="col-12 col-sm-6 col-md-2">
								<div class="info-box">
									<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box"></i></span>
									<div class="info-box-content">
										<span class="info-box-text"><?= $value->pobox_id ?></span>
										<?php if (@$this->HomeModel->get_expired_po_box($value->pobox_id)->selisihDate <= 10) { ?>
											<span class="info-box-number">Will be expired</span>
										<?php }else{ ?>
											<span class="info-box-number">Exist</span>
										<?php } ?>
									</div>
								</div>
							</div>
						<?php }} ?>
					</div>

			        <!-- <div class="row">
			        	<div class="col-lg-12 col-12">
			        		<div class="card">
				        		<div class="card-header">
				                	<h3 class="card-title">Content List</h3>
				              	</div>
				              	<div class="card-body">
				              		<table id="example1" class="table table-bordered table-hover">
				              			<thead>
		                  					<tr>
		                  						<th>Rendering engine</th>
							                    <th>Browser</th>
							                    <th>Platform(s)</th>
							                    <th>Engine version</th>
							                    <th>CSS grade</th>
		                  					</tr>
		                  				</thead>
		                  				<tbody>
		                  					
		                  				</tbody>
				              		</table>
				              	</div>
				        	</div>
			        	</div>
			        </div> -->
	     	 	</div>
	    	</section>
	  	</div>
	  	<?php $this->load->view('layouts/content_footer.php'); ?>
  	</div>
</body>