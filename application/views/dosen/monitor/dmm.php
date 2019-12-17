<?php 
$this->load->view('dosen/navbar');
$this->load->view('dosen/sidebarmenu');
$this->load->view('dosen/kontainer'); 
 ?>
         <div class="row">
          <div class="col-md-3">

            <!-- PROFIL DOSEN E WOI -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
	            <?php foreach ($data['judul'] as $d){ ?>				
                <h3 class="profile-username text-center"><?php echo $d['nama_mahasiswa']; ?></h3>

                <p class="text-muted text-center"><?php echo $d['jurusan']; ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>NRP</b><a class="float-right"><?php echo $d['nrp']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Judul</b><a class="float-right"><?php echo $d['judul']; ?></a>
                  </li>                  
                  <li class="list-group-item">
                    <b>Kontak</b><a class="float-right"><?php echo $d['no_hp']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pembimbing 1</b><a class="float-right"><?php echo $d['pembimbing1']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pembimbing 2</b><a class="float-right"><?php echo $d['pembimbing2']; ?></a>
                  </li>                                                                                                            
                  <?php } ?>	
                </ul>

                <a href="<?php echo base_url()."index.php/home/monitoringmm"?>" class="btn btn-warning btn-block btn-sm"><b>Back</b></a>
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
                  <li class="nav-item"><a class="nav-link active" href="#ti" data-toggle="tab">Proposal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#mm" data-toggle="tab">Tugas Akhir</a></li>                  
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
                    <th>Bimbingan</th>
                    <th>Tanggal</th>
                    <th>Nama Dosen</th>
                    <th>File</th>
                    <th>ACC</th>
                    <tH>Keterangan</tH>
                    </thead>
                    <tbody>
                    </tr>
                    <?php
                      $no=0;                      
                      foreach ($data['btppa'] as $d){
                      $no++;                      
                    ?>
                    <tr>                    
                    <td>Bimbingan ke <?php echo $no; ?></td>
                    <td><?php echo $d['tgl_bimbingan']; ?></td>
                    <td><?php echo $d['namadosen']; ?></td>
                    <td><a id="modal-124577" href="#deskripsi<?php echo $d['idb']; ?>" role="button" data-toggle="modal">Lihat</a></td>
                    <td align="center">
                      <?php 
                              $ada = $d['acc'];          
                              if($ada == 'Belum'){
                              ?>
                              <a href="<?php echo base_url()."index.php/Cdosen/accmm?idb=".$d['idb']."&idjudul=".$d['idjudul']; ?>"><span class="label label-primary">Konfirmasi</span></a>
                              <?php   
                              }else{  ?>
                              <span class="label label-success">Sudah</span>
                            <?php
                              }
                            ?>  
                    </td>
                    <td><?php echo $d['keterangan']; ?></td>
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
                    <th>Bimbingan</th>
                    <th>Tanggal</th>
                    <th>Nama Dosen</th>
                    <th>File</th>
                    <th>ACC</th>
                    <tH>Keterangan</tH>
                    </thead>
                    <tbody>
                    </tr>
                    <?php                      
                      $no=0;                      
                      foreach ($data['bta'] as $d){
                      $no++;                      
                    ?>
                    <tr>                    
                    <td>Bimbingan ke <?php echo $no; ?></td>
                    <td><?php echo $d['tgl_bimbingan']; ?></td>
                    <td><?php echo $d['namadosen']; ?></td>
                    <td><a id="modal-124577" href="#deskripsi<?php echo $d['idb']; ?>" role="button" data-toggle="modal">Lihat</a></td>
                    <td align="center">
                      <?php 
                              $ada = $d['acc'];          
                              if($ada == 'Belum'){
                              ?>
                              <a href="<?php echo base_url()."index.php/cdosen/accmm?idb=".$d['idb']."&idjudul=".$d['idjudul']; ?>"><span class="label label-primary">Konfirmasi</span></a>
                              <?php   
                              }else{  ?>
                              <span class="label label-success">Sudah</span>
                            <?php
                              }
                            ?>  
                    </td>
                    <td><?php echo $d['keterangan']; ?></td>
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

    <?php foreach ($data['bim'] as $d){ ?>
    <div class="modal fade" id="deskripsi<?php echo $d['idb']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Scan Dokumen</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
            <div class="modal-body">
          
          <img src="<?php echo base_url()."assets/gambar/".$d['bimbingan'] ?>" class="img-fluid pad" alt="Responsive image">

            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
          </div>
        </div>
      </div>
    </div>
    <?php } ?>


<?php
$this->load->view('dosen/footer');
?>