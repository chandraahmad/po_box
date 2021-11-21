<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
        <a href="<?= base_url(); ?>" class="navbar-brand">
            <img src="<?= base_url('assets/') ?>company_logo/Pos_Indonesia.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">E-Po Box</span>
        </a>
      
        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item">
          <?php if ($this->session->userdata('user_email') != NULL) { ?>
            <a class="nav-link" href="<?= base_url('Profile') ?>">
              <i class="fas fa-user-circle"></i>
            </a>
          <?php }else{ ?>
            <a class="nav-link" href="<?= base_url('Login') ?>">
              <i class="fas fa-sign-in-alt"></i>
            </a>
            <?php } ?>
        </li>
      </ul>
    </div>
</nav>
  <!-- /.navbar -->