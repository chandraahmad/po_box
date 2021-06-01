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
                                <form class="form-horizontal" id="insert_transaction" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <input type="hidden" name="transaction_pobox" id="pobox_id" value="<?= $GetByIdPoBox->pobox_id ?>" readonly>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Sewa Untuk Bulan *</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="transaction_month" id="transaction_month" class="form-control form-control-sm" onkeyup="countTotalPrice()" placeholder="Sewa Untuk Bulan" required>
                                            </div>
                                        </div>
                                        <table class="table table-borderles table-hover" style="margin-bottom: 20px;">
                                            <thead>
                                                <tr>
                                                    <th>Harga Sewa / Bulan</th>
                                                    <th>:</th>
                                                    <th>Rp.<?= number_format($GetByIdPoBox->pobox_price); ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Kantor</th>
                                                    <th>:</th>
                                                    <th><?= $GetByIdPoBox->office_name ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Total Harga Sewa</th>
                                                    <th>:</th>
                                                    <th id="transaction_total_price">
                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                        <!-- <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">From Date *</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date" id="from_date" data-target-input="nearest">
                                                    <input type="text" class="form-control form-control-sm datetimepicker-input" data-target="#from_date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask/>
                                                    <div class="input-group-append" data-target="#from_date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Until Date *</label>
                                            <div class="col-sm-10">
                                                <div class="input-group date" id="until_date" data-target-input="nearest">
                                                    <input type="text" class="form-control form-control-sm datetimepicker-input" data-target="#until_date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask/>
                                                    <div class="input-group-append" data-target="#until_date" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layouts/content_footer_fe.php'); ?>
    </div>
</body>