<?php 
$this->load->view('adminlte/navbar');
$this->load->view('adminlte/sidebarmenu');
$this->load->view('adminlte/kontainer');
?>
         <div class="row">
          <div class="col-md-3">

            <!-- PROFIL DOSEN E WOI -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
	            <?php foreach ($data['dosen'] as $d){ ?>				
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
                  <?php } ?>	
                </ul>

                <a href="<?php echo base_url()."index.php/dosen"?>" class="btn btn-warning btn-block btn-sm"><b>Back</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- / PROFIL DOSEN E WOIIIIII -->
           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#ti" data-toggle="tab">Teknik Informatika</a></li>
                  <li class="nav-item"><a class="nav-link" href="#mm" data-toggle="tab">Multimedia Broadcasting</a></li>                  
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  
                <div class="active tab-pane" id="ti">
                    <!-- Post -->
                    <div class="post">
                     <table id="example2" class="table table-bordered table-striped">
		                <thead>
		                <tr>							
							<td>Nama Mahasiswa</td>					
							<td>judul</td>
							<td>kontak</td>
						</tr>
						</thead>
		                <tbody>
		                <?php foreach ($data['mbti1'] as $d){ ?>
						<tr>											
							<td><?php echo $d['nama_mahasiswa']; ?></td>	
							<td><?php echo $d['judul']; ?></td>
							<td><?php echo $d['no_hp']; ?></td>	
						</tr>												
						<?php } ?>
						<?php foreach ($data['mbti2'] as $d){ ?>
						<tr>											
							<td><?php echo $d['nama_mahasiswa']; ?></td>	
							<td><?php echo $d['judul']; ?></td>
							<td><?php echo $d['no_hp']; ?></td>	
						</tr>												
						<?php } ?>
		                </tbody>
		              </table>
                    </div>
                    <!-- /.post -->
                </div>
                  <!-- /.tab-pane -->
                  


                <div class="tab-pane" id="mm">
                    <!-- Post -->
                    <div class="post">
                     <table id="example4" class="table table-bordered table-striped">
		                <thead>
		                <tr>							
							<td>Nama Mahasiswa</td>					
							<td>judul</td>
							<td>kontak</td>
						</tr>
						</thead>
		                <tbody>
		                <?php foreach ($data['mbmm1'] as $d){ ?>
						<tr>										
							<td><?php echo $d['nama_mahasiswa']; ?></td>	
							<td><?php echo $d['judul']; ?></td>
							<td><?php echo $d['no_hp']; ?></td>				
						</tr>												
						<?php } ?>
						<?php foreach ($data['mbmm2'] as $d){ ?>
						<tr>										
							<td><?php echo $d['nama_mahasiswa']; ?></td>	
							<td><?php echo $d['judul']; ?></td>
							<td><?php echo $d['no_hp']; ?></td>				
						</tr>												
						<?php } ?>
		                </tbody>
		              </table>
                    </div>
                    <!-- /.post -->
                </div>
                <!-- /.tab-pane -->


                 
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
<?php $this->load->view('adminlte/footer'); ?>
