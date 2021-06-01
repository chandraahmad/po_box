<body class="hold-transition sidebar-mini text-sm">
	<div class="wrapper">
		<?php $this->load->view('layouts/top_menu.php'); ?>
		<?php $this->load->view('layouts/sidebar_menu.php'); ?>
	  	<div class="content-wrapper">
		    <div class="content-header">
		      	<div class="container-fluid">
			        <div class="row mb-2">
			          	<div class="col-sm-6">
			            	<h1 class="m-0 text-dark">Sort</h1>
			          	</div>
			          	<div class="col-sm-6">
				            <ol class="breadcrumb float-sm-right">
				              	<li class="breadcrumb-item"><a href="#">Sort</a></li>
				            </ol>
			          	</div>
			        </div>
		      	</div>
		    </div>

		    <section class="content">
		      	<div class="container-fluid">
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
								<a href="<?= base_url('Sort/detail?pobox_id='.$value->pobox_id) ?>">
									<div class="info-box">
										<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-box"></i></span>
										<div class="info-box-content">
											<span class="info-box-text"><?= $value->pobox_id ?></span>
											<span class="info-box-number"><?= count(@$this->SortModel->get_all_byid_shipment($value->pobox_id)) ?></span>
										</div>
									</div>
								</a>
							</div>
						<?php }} ?>
					</div>
	     	 	</div>
	    	</section>
	  	</div>
	  	<?php $this->load->view('layouts/content_footer.php'); ?>
  	</div>
</body>