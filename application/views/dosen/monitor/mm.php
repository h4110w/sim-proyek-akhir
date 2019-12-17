<?php 
$this->load->view('dosen/navbar');
$this->load->view('dosen/sidebarmenu');
$this->load->view('dosen/kontainer'); 
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
				<th>Tahun</th>				
				<th>Dokumen</th>
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
				<td><?php echo $d['tahun']; ?></td>				
				<td>
				<?php 
					$ada = $d['dokumen'];
					
					if($ada == null){
					?>
					<span class="label label-danger">belum ada</span>
					<?php 	
					}else{	?>
					<a href="<?php echo base_url()."assets/dokumen/".$d['dokumen'] ?>" target='blank'><span class="label label-success">Sudah Ada</span></a>
				<?php
					}
				?>
				</td>
				<td><a id="modal-124577<?php echo $d['idjudul']; ?>" href="#modal-container-124577<?php echo $d['idjudul']; ?>" role="button" data-toggle="modal">Lihat</a></td>	
				<td>
				<a href="<?php echo base_url()."index.php/Cdosen/dmm?idjudul=".$d['idjudul'] ?>">Lihat Monitoring</a>
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
$this->load->view('dosen/monitor/deskripsi');
$this->load->view('dosen/footer');
?>