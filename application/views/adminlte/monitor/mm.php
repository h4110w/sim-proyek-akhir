<?php 
$this->load->view('adminlte/navbar');
$this->load->view('adminlte/sidebarmenu');
$this->load->view('adminlte/kontainer'); 
?>

 <div class="row">
 <div class="col-md-12">                                    
		<div class="card">
		<div class="card-header">
                <h5 class="card-title">Data Monitoring Multimedia</h5>
                <div class="card-tools">
                <button type="button" id="modal-124577" href="#inputdosen" class="btn btn-tool" data-toggle="modal">Tambah
                    <i class="fa fa-plus"></i>
                 </button>

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
                <table id="example1" class="table table-condensed table-bordered table-striped">
                <thead>
				<tr>
				<th>No</th>				
				<th>Mahasiswa</th>
				<th>Judul</th>				
				<th>Dokumen</th>
				<th>Bimbingan</th>
				<th>Status</th>
				<th>Deskripsi</th>				
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
				<td><?php echo $d['bimbingan']; ?></td>				
				<td>
				<?php
					$bm=$d['bimbingan'];
					if($bm>=18){
						echo "Maju Sidang TA";
					}else if($bm>=6){
						echo "Maju proposal";
					}else{
						echo "Belum Boleh Maju";
					}
				?>
				</td>		
				<td><a id="modal-124577<?php echo $d['idjudul']; ?>" href="#modal-container-124577<?php echo $d['idjudul']; ?>" role="button" data-toggle="modal">Lihat</a></td>	
				<td>
				<a href="<?php echo base_url()."index.php/judul/dmm?idjudul=".$d['idjudul'] ?>">Lihat Monitoring</a>
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
$this->load->view('adminlte/monitor/deskripsi');
$this->load->view('adminlte/footer');
?>