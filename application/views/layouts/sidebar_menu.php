<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:;" class="brand-link">
        <img src="<?= base_url('assets/') ?>company_logo/Pos_Indonesia.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-PO BOX</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="javascript:;" class="d-block"><?= $this->session->userdata('user_name') ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <?php if($this->session->userdata('user_type') == '1') { ?>
                <li class="nav-item">
                    <a href="<?= base_url() ?>Home" <?= ($js_p == 'home.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="nav-icon fas fa-th"></i><p>Home</p></a>
                </li>
                <li <?= ($js_p == 'user.js' || $js_p == 'customer.js' || $js_p == 'office.js' ? 'class="nav-item has-treeview menu-open"' : 'class="nav-item has-treeview"' ) ?>>
                    <a href="#" class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Master<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>User" <?= ($js_p == 'user.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>User</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Customer" <?= ($js_p == 'customer.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>Customer</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Office" <?= ($js_p == 'office.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>Office</p></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>PoBox" <?= ($js_p == 'pobox.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="nav-icon fas fa-box"></i> <p>Po Box</p></a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url() ?>Order" <?= ($js_p == 'order.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="nav-icon fas fa-shopping-cart"></i> <p>Order Transaction</p></a>
                </li>
                <li <?= ($js_p == 'sort.js' || $js_p == 'report.js' ? 'class="nav-item has-treeview menu-open"' : 'class="nav-item has-treeview"' ) ?>>
                    <a href="#" class="nav-link"><i class="nav-icon fas fa-dolly-flatbed"></i><p>Shipment<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Sort" <?= ($js_p == 'sort.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>Sort</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Report" <?= ($js_p == 'report.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>Report</p></a>
                        </li>
                    </ul>
                </li>
                <?php } ?>


                <?php if($this->session->userdata('user_type') == '2') { ?>
                <li class="nav-item">
                    <a href="<?= base_url() ?>Order" <?= ($js_p == 'order.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="nav-icon fas fa-shopping-cart"></i> <p>Order Transaction</p></a>
                </li>
                <li <?= ($js_p == 'sort.js' || $js_p == 'report.js' ? 'class="nav-item has-treeview menu-open"' : 'class="nav-item has-treeview"' ) ?>>
                    <a href="#" class="nav-link"><i class="nav-icon fas fa-dolly-flatbed"></i><p>Shipment<i class="right fas fa-angle-left"></i></p></a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Sort" <?= ($js_p == 'sort.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>Sort</p></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url() ?>Report" <?= ($js_p == 'report.js' ? 'class="nav-link active"' : 'class="nav-link"' ) ?>><i class="far fa-circle nav-icon"></i><p>Report</p></a>
                        </li>
                    </ul>
                </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>