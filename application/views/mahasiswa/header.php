<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Halaman Mahasiswa</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

  </head>
  <body style="background-image: url('<?php echo base_url() ?>gambar/bgr.png');">

    <div class="container-fluid">
	<div class="row" style="margin: 40px">
		<div class="col-md-12" style="background-color: #fff; border: 1px solid;
    border-radius: 5px; opacity: 1;">
			<nav class="navbar navbar-inverse" style="margin-top: 25px;" role="navigation">
				<div class="navbar-header">
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="<?php echo base_url() ?>index.php/halamansiswa">Home</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					<?php foreach ($data['deadline'] as $dl) {
						$sakiki=date('Y-m-d');
						$now=strtotime($sakiki);
						$tgl1=$dl['dari'];
						$awal=strtotime($tgl1);
						$tgl2=$dl['sampai'];
						$akhir=strtotime($tgl2);
						if($now>$awal && $now<$akhir){
					?>
						<li>
							<a href="<?php echo base_url() ?>index.php/halamansiswa/ajukan">Ajukan Judul</a>
						</li>
					<?php } else { ?>
					<li>						
						</li>
					<?php }} ?>

					<?php                                
			            foreach ($data['rek'] as $d){
			            $st = $d['status'];
			            if($st == 'tampil'){
            		?>
						<li>
							<a href="<?php echo base_url() ?>index.php/halamansiswa/rekomendasi">Rekomendasi</a>
						</li>
						<li>
							<a href="<?php echo base_url() ?>index.php/halamansiswa/saran">Saran Dosen</a>
						</li>
					<?php } else { ?>					
					
					<?php }} ?>
						<li>
							<a href="<?php echo base_url() ?>index.php/halamansiswa/dosen">Daftar Dosen Pembimbing</a>
						</li>
						<?php
					    	foreach ($data['jdp'] as $d) {
					    ?>
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bimbingan<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="<?php echo base_url() ?>index.php/halamansiswa/taku">Proposal</a>
								</li>
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url() ?>index.php/halamansiswa/ta">Tugas Akhir</a>
								</li>

							</ul>
						</li>
						<?php } ?> 
					</ul>
					

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="<?php echo base_url() ?>index.php/login/logout"><?php echo $data['username']; ?> Logout</a>
						</li>					
					</ul>
				</div>
				
			</nav>