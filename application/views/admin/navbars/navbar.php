<body class="" onload="startTime()">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="<?php echo base_url('Admin/dashboard') ?>" class="">
          <img src="<php echo base_url('assets/logo.jpg') ?>" alt="logo">
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="<?php if ($this->uri->uri_string() == '') {
                        echo 'active';
                      } ?>">
            <a href="<?= base_url('Admin/dashboard') ?>">
              <i class="fa fa-home"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="<?php if ($this->uri->uri_string() == 'admin/employees') {
                        echo 'active';
                      } ?>">
            <a href="<?= base_url('admin/employees') ?>">
              <i class="fa fa-user"></i>
              <p>Data Pegawai</p>
            </a>
          </li>
          <li class="<?php if ($this->uri->uri_string() == 'admin/positions') {
                        echo 'active';
                      } ?>">
            <a href="<?php echo base_url('admin/positions') ?>">
              <i class="fa fa-briefcase"></i>
              <p>Data Jabatan</p>
            </a>
          </li>
          <li class="<?php if ($this->uri->uri_string() == 'admin/attendances') {
                        echo 'active';
                      } ?>">
            <a href="<?php echo base_url('admin/attendances') ?>">
              <i class="fa fa-id-card"></i>
              <p>Absensi</p>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url('Login/logout') ?>">
              <i class="fa fa-sign-out-alt"></i>
              <p>Keluar</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->

      <!-- End Navbar -->