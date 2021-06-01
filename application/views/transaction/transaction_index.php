<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php $this->load->view('layouts/top_menu_fe.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <?php 
                    $valDate = @$this->TransactionModel->get_byid_transaction('transaction_user', $this->session->userdata('user_id'));
                    if (@$valDate->transaction_status == '1') { ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-info">
                                <form class="form-horizontal" id="upload_transaction" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                Transaksi dengan nomor <?= $valDate->transaction_id ?> belum dibayarkan<br>
                                                Selesaikan pembayaran anda segera<br>
                                            </div>
                                        </div>
                                        <br>
                                        <div id="accordion">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                            KANTOR POS
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="card-body">
                                                        Transfer ke Rek
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                            BANK BNI
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="card-body">
                                                        Transfer ke Rek
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                            BANK BTN
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="card-body">
                                                        Transfer ke Rek
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                            <input type="hidden" name="transaction_id" value="<?= $valDate->transaction_id ?>">
                                            <input type="hidden" name="transaction_pobox" value="<?= $valDate->transaction_pobox ?>">
                                            <label for="exampleInputFile">Upload Bukti Pembayaran</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="transaction_upload" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php }elseif (@$valDate->transaction_status == '2') { ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Transaksi anda dengan nomor transaksi <?= $valDate->transaction_id ?> sedang diproses<br>
                                            Mohon tunggu beberapa saat<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }elseif (@$valDate->transaction_status == '3') { ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            Anda sekarang sudah memiliki PO BOX dengan nomor <?= $valDate->transaction_pobox ?> <br>
                                            Anda hanya diperkenankan menyewa 1 PO BOX saja<br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
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
						<?php foreach ($GetAllPoBox as $key => $value) { 
                            if (@$this->TransactionModel->get_byid_transaction('transaction_pobox', $value->pobox_id) == NULL) {
                        ?>
                            <div class="col-12 col-sm-6 col-md-2">
                                <a href="<?= base_url('Transaction/detail_pobox?id='.$value->pobox_id) ?>">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-box"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text"><?= $value->pobox_id ?></span>
                                        </div>
                                    </div>
                                </a>
                            </div>
						<?php }} ?>
					</div>
                </div>
            </div>
        </div>
        <?php $this->load->view('layouts/content_footer_fe.php'); ?>
    </div>
</body>