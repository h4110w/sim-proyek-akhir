<?php 
$this->load->view('adminlte/navbar');
$this->load->view('adminlte/sidebarmenu');
$this->load->view('adminlte/kontainer');
?>
 <div class="row">
 <div class="col-md-12">                          		
		<div class="card">
		<div class="card-header">
                <h5 class="card-title">Judul Tugas Akhir</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i>
                  </button>                                    
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                  <!-- DATA KONTEN ANJIR -->
                   <table id="example1" class="table table-bordered table-hover">
	                <thead>
				<tr>
				<th>No</th>				
				<th>Mahasiswa</th>
				<th>Judul</th>
				<th>pembimbing</th>
				<th>Dokumen</th>				
				<th>Deskripsi</th>
				<th>Tahun</th>
				<th>Status</th>
				<th>Aksi</th>
				</tr>
			</thead>
			
			<tbody>
			<?php
			$no=0;
			foreach ($data['judul'] as $d){
			$no++;
			?>
				<tr>
				<td><?php echo $no;?></td>				
				<td><?php echo $d['nama_mahasiswa']; ?></td>
				<td><?php echo $d['judul']; ?></td>
				<td>
				1 : <?php echo $d['pembimbing1']; ?><br>
				2 : <?php echo $d['pembimbing2']; ?></td>
				<td>
				<?php 
					$ada = $d['dokumen'];
					
					if($ada == null){
					?>
					<span class="badge badge-danger">belum ada</span>
					<?php 	
					}else{	?>
					<a href="<?php echo base_url()."assets/dokumen/".$d['dokumen'] ?>" target='blank'><span class="badge badge-success">Sudah Ada</span></a>
				<?php
					}
				?>
				</td>
				<td><a id="modal-124577" href="#modal-container-124577<?php echo $d['idjudul']; ?>" role="button" class="btn" data-toggle="modal">Lihat</a></td>
				<td><?php echo $d['tahun']; ?></td>
				<td>					
				<?php 
					$ada = $d['status'];					
					if($ada == 'Ditolak'){
					?>
					<span class='badge badge-danger'>Ditolak</span>
					<?php 	
					}else if($ada == 'Disetujui'){	?>
					Disetujui
					<?php
					}else if($ada == 'Diambil'){?>
					Diambil
					<?php
					}else{ ?>
					Belum Disetujui
				<?php
					}
				?>
				</td>
				<td>

				<?php 
					$ada = $d['tanggal_acc'];					
					if($ada == null){
					?>
					<a id="modal-124577" href="#tolak<?php echo $d['idjudul']; ?>" type="button" data-toggle="modal" class="btn btn-block btn-danger btn-sm">Tolak</a>
					<?php 	
					}else{	?>
					<a href="<?php echo base_url()."index.php/tjudul/kbatal?idjudul=".$d['idjudul']; ?>" type="button" class="btn btn-block btn-warning btn-sm">Batalkan</a>
				<?php
					}
				?>				
				  </td>								
			
				</tr>				
				<?php } ?>

			</tbody>
		</table>
                  


                  <!-- DATA KONTEN ANJIR -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->			
            </div>
            <!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->      
<?php 
$this->load->view('adminlte/deskripsi');
$this->load->view('adminlte/crud/tolak'); 
$this->load->view('adminlte/footer');
?>
