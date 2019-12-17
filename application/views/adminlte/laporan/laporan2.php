<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Judul TUgas Akhir</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/dist/css/adminlte.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/lte/plugins/iCheck/flat/blue.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper" style="padding: 20px">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row" style="margin-bottom: 10px;">
        <div class="col-md-2" align="center">
           <img src="<?php echo base_url()?>/gambar/bgr.png" class="img-circle elevation-2" width='120px' alt="User Image">
        </div>
        <div class="col-md-10">
        <h4 align="center">
        LAPORAN REKAP JUDUL TUGAS AKHIR<hr>AKADEMI KOMUNITAS NEGERI SUMENEP</h4>
        </div>
      </div>                
        <div class="row">         
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header" align="center">
              <h2 class="card-title">Teknik Informatika</h2>              
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">                
                <h6><span class="mailbox-read-time float-right">Tanggal : <?php echo date('d-M-Y'); ?></span></h6>
              </div>
              <!-- /.mailbox-read-info -->              
              <div class="mailbox-read-message">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>              
                    <td>No</td>         
                    <td>NRP</td>         
                    <td>Nama Mahasiswa</td>
                    <td>judul</td>
                    <td>Pembimbing</td>
                    <td>Status</td>                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=0;
                  foreach($data['ti'] as $j){
                  $no++;
                  ?>
                  <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $j["nrp"];?></td>
                  <td><?php echo $j["nama_mahasiswa"];?></td>
                  <td><?php echo $j["judul"];?></td>
                  <td>
                  Pembimbing 1 : <?php echo $j["pembimbing1"];?>
                  Pembimbing 2 : <?php echo $j["pembimbing2"];?>                   
                  </td>
                  <td><?php echo $j["status"];?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->

            <div class="card-header" align="center">
              <h2 class="card-title">Multimedia</h2>              
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">                
                <h6><span class="mailbox-read-time float-right">Tanggal : <?php echo date('d-M-Y'); ?></span></h6>
              </div>
              <!-- /.mailbox-read-info -->              
              <div class="mailbox-read-message">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>              
                    <td>No</td>         
                    <td>NRP</td>         
                    <td>Nama Mahasiswa</td>
                    <td>judul</td>
                    <td>Pembimbing</td>
                    <td>Status</td>                    
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=0;
                  foreach($data['mm'] as $j){
                  $no++;
                  ?>
                  <tr>
                  <td><?php echo $no;?></td>
                  <td><?php echo $j["nrp"];?></td>
                  <td><?php echo $j["nama_mahasiswa"];?></td>
                  <td><?php echo $j["judul"];?></td>
                  <td>
                  Pembimbing 1 : <?php echo $j["pembimbing1"];?>
                  Pembimbing 2 : <?php echo $j["pembimbing2"];?>                   
                  </td>
                  <td><?php echo $j["status"];?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
                                    
          </div>
          <!-- /. box -->
        </div>
        <div class="col-md-3">          
          <div class="card card-danger card-outline">
              <div class="card-header">
                <h3 class="card-title">Rincian</h3>
              </div>
              <!-- /.card-header -->              
              <div class="card-body card-primary">
              <ul class="nav flex-column">
                <?php foreach($data['masuk'] as $j){ ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="text-decoration: none;">
                      Judul Masuk <span class="float-right"><?php echo $j['jum']; ?></span>
                    </a>
                  </li>
                <?php } ?>
                <?php foreach($data['setuju'] as $j){ ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="text-decoration: none;">
                      Judul Disetujui <span class="float-right"><?php echo $j['jum']; ?></span>
                    </a>
                  </li>
                <?php } ?>
                <?php foreach($data['ambil'] as $j){ ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="text-decoration: none;">
                      Judul Diambil <span class="float-right"><?php echo $j['jum']; ?></span>
                    </a>
                  </li>
                <?php } ?>
                <?php foreach($data['tolak'] as $j){ ?>
                  <li class="nav-item">
                    <a href="#" class="nav-link" style="text-decoration: none;">
                      Judul Ditolak <span class="float-right"><?php echo $j['jum']; ?></span>
                    </a>
                  </li>
                <?php } ?>
              </ul>
              </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/lte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/lte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url() ?>assets/lte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/lte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/lte/dist/js/demo.js"></script>
</body>
</html>
