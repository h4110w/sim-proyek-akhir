 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url() ?>assets/lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">DASHBOARD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>/gambar/bgr.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url()."index.php/home"?>" class="d-block">Admin AKNS</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-binoculars text-success"></i>
              <p>Monitoring<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/cdosen/monitoringti"?>" class="nav-link">
                  <i class="fa fa-circle-o text-info nav-icon"></i><p>Teknik Informatika</p></a>
              </li>              
               <li class="nav-item">
                <a href="<?php echo base_url()."index.php/cdosen/monitoringmm"?>" class="nav-link">
                  <i class="fa fa-circle-o text-danger nav-icon"></i><p>Multimedia</p></a>
              </li>
            </ul>
          </li>
               
          <li class="nav-item">
            <a href="<?php echo base_url()."index.php/login/logout"?>" class="nav-link">
              <i class="nav-icon fa fa-weibo text-warning"></i><p>Logout</p></a>
          </li>                              
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>