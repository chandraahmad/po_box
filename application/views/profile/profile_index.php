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
                            <h1 class="m-0 text-dark"> Profile</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-primary card-outline">
                                <div class="card-body box-profile">
                                    <div class="text-center">
                                        <img class="profile-user-img img-fluid img-circle" src="<?= base_url('assets/') ?>dist/img/user4-128x128.jpg" alt="User profile picture">
                                    </div>
                                    <h3 class="profile-username text-center"><?= $GetByIdUser->user_name ?></h3>

                                    <p class="text-muted text-center"><?= $GetByIdUser->user_email ?></p>

                                    <a href="<?= base_url() ?>Login/logout" class="btn btn-danger btn-block"><b><i class="fas fa-sign-out-alt"></i> Log Out</b></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#changepassword" data-toggle="tab">Change Password</a></li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="settings">
                                            <form class="form-horizontal" id="update_profile" method="POST" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for="user_name" class="col-sm-2 col-form-label">Name *</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="user_name" value="<?= @$GetByIdUser->user_name ?>" class="form-control form-control-sm" id="user_name" placeholder="Name *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="user_email" class="col-sm-2 col-form-label">Email *</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" name="user_email" value="<?= @$GetByIdUser->user_email ?>" class="form-control form-control-sm" id="user_email" placeholder="Email *">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="customer_name" class="col-sm-2 col-form-label">Company Name *</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="customer_name" value="<?= @$GetByIdCustomer->customer_name ?>" class="form-control form-control-sm" id="customer_name" placeholder="Company Name *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="customer_contact" class="col-sm-2 col-form-label">Contact *</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="customer_contact" value="<?= @$GetByIdCustomer->customer_contact ?>" class="form-control form-control-sm" id="customer_contact" placeholder="Contact *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="customer_email" class="col-sm-2 col-form-label">Company Email *</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="customer_email" value="<?= @$GetByIdCustomer->customer_email ?>" class="form-control form-control-sm" id="customer_email" placeholder="Company Email *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="customer_address" class="col-sm-2 col-form-label">Address *</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control form-control-sm" name="customer_address" id="customer_address" placeholder="Experience"><?= @$GetByIdCustomer->customer_address ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="changepassword">
                                            <form class="form-horizontal" id="update_password" method="POST" enctype="multipart/form-data">
                                                <div class="form-group row">
                                                    <label for="user_password_old" class="col-sm-2 col-form-label">Old Password *</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="user_password_old" class="form-control form-control-sm" id="user_password_old" placeholder="Old Password *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="user_password" class="col-sm-2 col-form-label">New Password *</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="user_password" class="form-control form-control-sm" id="user_password" placeholder="New Password *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="user_password_retry" class="col-sm-2 col-form-label">Retry New Password *</label>
                                                    <div class="col-sm-10">
                                                        <input type="password" name="user_password_retry" class="form-control form-control-sm" id="user_password_retry" placeholder="Retry New Password *">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-sm-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Submit</button>
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
            </div>
        </div>
        <?php $this->load->view('layouts/content_footer_fe.php'); ?>
    </div>
</body>