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
                            <h1 class="m-0 text-dark"> Po Box Number <?= $GetByIdPoBox->pobox_id ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Form Sewa Po Box
                                </div>
                                <div class="card-body">
                                    <form class="form-horizontal" id="insert_user" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
				                            <label class="col-sm-2 col-form-label">Name *</label>
				                            <div class="col-sm-10">
				                                <input type="text" name="user_name" class="form-control form-control-sm" placeholder="Name" required>
				                            </div>
				                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layouts/content_footer_fe.php'); ?>
    </div>
</body>