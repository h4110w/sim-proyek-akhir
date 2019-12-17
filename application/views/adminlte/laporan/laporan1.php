<?php
include "konek.php";
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Laporan Pembimbing</title>
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
        <div class="col-md-3" align="center">
           <img src="<?php echo base_url()?>/gambar/bgr.png" class="img-circle elevation-2" width='120px' alt="User Image">
        </div>
        <div class="col-md-9">
        <h2 align="center">
        LAPORAN DOSEN PEMBIMBING TUGAS AKHIR<hr>AKADEMI KOMUNITAS NEGERI SUMENEP</h2>
        </div>
      </div>        
        <?php foreach ($data['dosen'] as $d){ ?>        
        <div class="row">
          <div class="col-md-3">            
          <div class="card card-primary card-outline">
              <div class="card-body box-profile">
              
                <h3 class="profile-username text-center"><?php echo $d['namadosen']; ?></h3>

                <p class="text-muted text-center"><?php echo $d['prodi']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NIP</b><a class="float-right"><?php echo $d['nip']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Password</b><a class="float-right"><?php echo $d['password']; ?></a>
                  </li>                  
                  <li class="list-group-item">
                    <b>Kontak</b><a class="float-right"><?php echo $d['nomerhp']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Alamat</b><a class="float-right"><?php echo $d['alamat']; ?></a>
                  </li>                                                      
                  
                </ul>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- / PROFIL DOSEN E WOIIIIII -->          
          </div>
          <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Mahasiswa Yg dibimbing</h3>              
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
                    <td>Nama Mahasiswa</td>         
                    <td>judul</td>
                    <td>kontak</td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $nip = $d['nip'];
                  $q = mysqli_query($connection,"SELECT * FROM vjudul where p1='$nip' and status='Diambil'");
                  while($dt = mysqli_fetch_array($q)){
                  ?>
                  <tr>
                  <td><?php echo $dt["nama_mahasiswa"];?></td>
                  <td><?php echo $dt["judul"];?></td>
                  <td><?php echo $dt["no_hp"];?></td>
                  </tr>
                  <?php } ?>
                  <?php
                  $nip = $d['nip'];
                  $q = mysqli_query($connection,"SELECT * FROM vjudul where p2='$nip' and status='Diambil'");
                  while($dt = mysqli_fetch_array($q)){
                  ?>
                  <tr>
                  <td><?php echo $dt["nama_mahasiswa"];?></td>
                  <td><?php echo $dt["judul"];?></td>
                  <td><?php echo $dt["no_hp"];?></td>
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
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php } ?>
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
