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
              <i class="nav-icon fa fa-dashboard text-primary"></i>
              <p>Data Mahasiswa<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/mahasiswa/ti"?>" class="nav-link">
                  <i class="fa fa-circle-o text-info nav-icon"></i><p>Teknik Informatika</p></a>
              </li>              
               <li class="nav-item">
                <a href="<?php echo base_url()."index.php/mahasiswa/mm"?>" class="nav-link">
                  <i class="fa fa-circle-o text-danger nav-icon"></i><p>Multimedia</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-inbox text-danger"></i>
              <p>Tugas Akhir<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/judul"?>" class="nav-link">
                  <i class="fa fa-circle-o text-info nav-icon"></i><p>Semua Judul</p></a>
              </li>              
               <li class="nav-item">
                <a href="<?php echo base_url()."index.php/kjudul"?>" class="nav-link">
                  <i class="fa fa-check text-success nav-icon"></i><p>Konfirmasi Judul</p></a>
              </li
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/saran"?>" class="nav-link">
                  <i class="fa fa-gift text-warning nav-icon"></i><p>Saran Judul</p></a>
              </li>              
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/tjudul"?>" class="nav-link">
                  <i class="fa fa-times text-danger nav-icon"></i><p>Tolak Judul</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-binoculars text-success"></i>
              <p>Monitoring<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/home/monitoringti"?>" class="nav-link">
                  <i class="fa fa-circle-o text-info nav-icon"></i><p>Teknik Informatika</p></a>
              </li>              
               <li class="nav-item">
                <a href="<?php echo base_url()."index.php/home/monitoringmm"?>" class="nav-link">
                  <i class="fa fa-circle-o text-danger nav-icon"></i><p>Multimedia</p></a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file text-warning"></i>
              <p>Laporan<i class="right fa fa-angle-left"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a target="_blank" href="<?php echo base_url()."index.php/laporan/laporan1"?>" class="nav-link">
                  <i class="fa fa-circle-o text-info nav-icon"></i><p>Pembimbing</p></a>
              </li>              
               <li class="nav-item">
                <a target="_blank" href="<?php echo base_url()."index.php/laporan/laporan2"?>" class="nav-link">
                  <i class="fa fa-circle-o text-danger nav-icon"></i><p>Judul</p></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()."index.php/laporan/grafik"?>" class="nav-link">
                  <i class="fa fa-bar-chart text-warning nav-icon"></i><p>Grafik</p></a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="<?php echo base_url()."index.php/dosen"?>" class="nav-link">
              <i class="nav-icon fa fa-th"></i><p>Daftar Dosen</p></a>
          </li>

           <li class="nav-item">
            <a href="<?php echo base_url()."index.php/Cagenda"?>" class="nav-link">
              <i class="nav-icon fa fa-book"></i><p>Agenda</p></a>
          </li>          

          <li class="nav-header">Control</li>
          <li class="nav-item">
            <?php                                
                foreach ($data['rek'] as $d){
                $st = $d['status'];
                if($st == 'tampil'){
            ?>
            <a href="<?php echo base_url()."index.php/home/sembunyikan"?>" class="nav-link">
              <i class="nav-icon fa fa-eye text-warning"></i><p>Rekomendasi</p>
            </a>
            <?php }else{ ?>
            <a href="<?php echo base_url()."index.php/home/tampil"?>" class="nav-link">
              <i class="nav-icon fa fa-eye-slash"></i><p>Rekomendasi</p>
            </a>

            <?php }} ?> 
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