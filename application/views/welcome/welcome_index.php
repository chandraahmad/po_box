<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php $this->load->view('layouts/top_menu_fe.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Po Box Number</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
						<?php foreach ($GetAllPoBox as $key => $value) { ?>
                            <div class="col-12 col-sm-6 col-md-2">
                                <a href="javascript:;">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"><?= $value->pobox_id ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
						<?php } ?>
					</div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layouts/content_footer_fe.php'); ?>
    </div>
</body>