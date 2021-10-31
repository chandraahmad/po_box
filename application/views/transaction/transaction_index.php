<body class="hold-transition layout-top-nav">
    <div class="wrapper">
        <?php $this->load->view('layouts/top_menu_fe.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    <?php $valDate = @$this->TransactionModel->get_byid_transaction('transaction_user', $this->session->userdata('user_id')); ?>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark"> Po Box Number <?= @$valDate->transaction_pobox ?></h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?php if (@$valDate->transaction_status == '1') { ?>
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
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#KANTORPOS">
                                                            KANTOR POS
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="KANTORPOS" class="panel-collapse collapse in">
                                                    <div class="card-body">
                                                        Di setor ke ke loket pospay dengan no rekening 0400002663
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#BANKBCA">
                                                            BANK BCA
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="BANKBCA" class="panel-collapse collapse">
                                                    <div class="card-body">
                                                        BCA VIRTUAL ACCOUNT 81610 0400002663
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#BANKMandiri">
                                                            BANK Mandiri
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="BANKMandiri" class="panel-collapse collapse">
                                                    <div class="card-body">
                                                        Mandiri virtula account 88588 0400002663
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#BANKBNI">
                                                            BANK BNI
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="BANKBNI" class="panel-collapse collapse">
                                                    <div class="card-body">
                                                        BNI Virtual account 816109 0400002663
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h4 class="card-title">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#BANKBNISyariah">
                                                            BANK BNI Syariah
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="BANKBNISyariah" class="panel-collapse collapse">
                                                    <div class="card-body">
                                                        BNI SYARIAH virtual account 866400 0400002663
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
                    <?php }elseif (@$valDate->transaction_status == '3' && @$this->TransactionModel->get_expired_po_box($valDate->transaction_pobox, $this->session->userdata('user_id'))->transaction_until_date >= date('Y-m-d')) { ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-info">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            You now have a PO BOX with a number <?= $valDate->transaction_pobox ?> <br>
                                            You are only allowed to rent 1 PO BOX<br>
                                            <?php if (@$this->TransactionModel->get_expired_po_box($valDate->transaction_pobox, $this->session->userdata('user_id'))->selisihDate <= 10) { ?>
                                                <strong>Warning !!! Your Po Box rental time will end on <?= (new DateTime($valDate->transaction_until_date))->format('d F Y'); ?></strong><br>
                                                <strong>Immediately extend your lease</strong>
                                                <a href="<?= base_url('Transaction/detail_pobox?id='.$valDate->transaction_pobox) ?>" class="btn btn-primary btn-sm">Perpanjang Sewa</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <?php if (@$valDate->transaction_status == '3' && @$this->TransactionModel->get_expired_po_box($valDate->transaction_pobox, $this->session->userdata('user_id'))->transaction_until_date >= date('Y-m-d')) { ?>
                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Parcel List</h3>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?php echo base_url('Transaction/takeParcel/'.@$valDate->transaction_pobox) ?>" class="btn btn-primary" style="margin-bottom: 20px;">Take Parcel</a>
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>No Barcode / No Resi</th>
                                                    <th>Entry Officer</th>
                                                    <th>Entry Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $GetByPoBoxShipment = $this->TransactionModel->get_bypobox_shipment(@$valDate->transaction_pobox);
                                                $no = 1; 
                                                foreach ($GetByPoBoxShipment as $key => $value) { 
                                                ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $value->shipment_barcode ?></td>
                                                    <td><?= $this->TransactionModel->get_byid_user($value->shipment_officer)->user_name ?></td>
                                                    <td><?= $value->shipment_date_entry ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }elseif (@$valDate == NULL || @$this->TransactionModel->get_expired_po_box($valDate->transaction_pobox, $this->session->userdata('user_id'))->transaction_until_date < date('Y-m-d')) { ?>
                <!-- Main content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <?php foreach ($GetAllPoBox as $key => $value) { 
                                $getPoBoxTrx = @$this->TransactionModel->get_byid_transaction('transaction_pobox', $value->pobox_id);
                                if ($getPoBoxTrx == NULL || str_replace('-', '', @$getPoBoxTrx->transaction_until_date) < date('Ymd')) {
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
            <?php } ?>
        </div>
        <?php $this->load->view('layouts/content_footer_fe.php'); ?>
    </div>
</body>