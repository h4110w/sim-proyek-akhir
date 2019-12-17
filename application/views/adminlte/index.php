<?php 
 include "navbar.php";
 include "sidebarmenu.php";
 include "kontainer.php";
 include "catas.php";
 ?>
 <div class="row">
 <div class="col-md-12">
        <div class="card">
              
              <div class="card-header">
                <h5 class="card-title">Deadline</h5>

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
                  <?php foreach ($data['deadline'] as $dl){ ?>

					<?php
					echo "Deadline dari Tanggal <font color='red'><b>".date('d-m-Y', strtotime($dl['dari']))."</b></font>
						  sampai tanggal <font color='red'><b>".date('d-m-Y', strtotime($dl['sampai']))."</b></font> | ";
					 ?>
					 <a href="#" id="batalganti" style="display: none;">Batal update</a>
					 <a href="#" id="gantitanggal">Update deadline</a>

					<form class="form" method="post" id="editdeadline" style="display: none;" action="<?php echo base_url()."index.php/home/gantideadline?iddeadline=".$dl['iddeadline']; ?>">

		 			<div class="row">
		 			  <div class="col-md-1">
		                <div class="form-group" style="text-align: center;">                  
		                  <label>Dari</label>
		                </div>
		              </div>
		              <div class="col-md-2">
		                <div class="form-group">                  
		                   <div class="form-group">                  
		                   <div class="input-group input-group-sm">
		                    <div class="input-group-prepend">
		                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
		                    </div>
		                    <input type="text" class="form-control" value="<?php echo $dl['dari']; ?>" type="text" name="awal" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
		                  </div>
		                </div>
		                </div>
		                <!-- /.form-group -->                
		              </div>
		              <div class="col-md-1">
		                <div class="form-group" style="text-align: center;">                  
		                  <label>Sampai</label>
		                </div>
		              </div>
		                <!-- /.form-group -->                
		                <div class="col-md-2">
		                <div class="form-group">                  
		                   <div class="input-group input-group-sm">
		                    <div class="input-group-prepend">
		                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
		                    </div>
		                    <input type="text" class="form-control" value="<?php echo $dl['sampai']; ?>" type="text" name="akhir" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
		                  </div>
		                </div>
		            	</div>
		                <!-- /.form-group -->                
		                <div class="col-md-1">
		                <div class="form-group">                  
		                <button type="submit" class="btn btn-info btn-flat btn-sm">Perbarui</button>
		                </div>
		                <!-- /.form-group -->                
		              </div>
		          </div>

					</div>					  
					</form>

					<?php } ?>				

						</div>
					</div>
                  <!-- DATA KONTEN ANJIR -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->        
		
		<div class="card">
		<div class="card-header">
                <h5 class="card-title">Headline</h5>

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
                   <table id="example2" class="table table-bordered table-hover">
	                <thead>
				<tr>
				<th>No</th>				
				<th>Mahasiswa</th>
				<th>Judul</th>
				<th>pembimbing</th>
				<th>Dokumen</th>
				<th>Deskripsi</th>
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
				<td><a id="modal-124577<?php echo $d['idjudul']; ?>" href="#modal-container-124577<?php echo $d['idjudul']; ?>" role="button" class="btn" data-toggle="modal">Lihat</a></td>
				<td>
				<?php 
					$ada = $d['status'];					
					if($ada == 'Ditolak'){
					?>
					<span class='badge badge-danger'>Ditolak</span>
					<?php 	
					}else if($ada == 'Disetujui'){	?>
					<span class='badge badge-success'>Disetujui</span>
					<?php
					}else if($ada == 'Diambil'){?>
					<span class='badge badge-info'>Diambil</span>
					<?php
					}else{ ?>
					<span class='label-primary'>Belum Disetujui</span>
				<?php
					}
				?>
				</td>
				<td>

				<?php 
				$ada = $d['tanggal_acc'];
				$stat = $d['status'];					
				if($ada == null){
					?>
					<a href="<?php echo base_url()."index.php/home/konfirmasi?idjudul=".$d['idjudul']; ?>" type="button" class="btn btn-block btn-primary btn-sm">Setujui</a>
					<a href="<?php echo base_url()."index.php/home/tolak?idjudul=".$d['idjudul']; ?>" type="button" class="btn btn-block btn-danger btn-sm">Tolak</a>
				<?php 	
				}else{
				?>
					<a href="<?php echo base_url()."index.php/home/batal?idjudul=".$d['idjudul']; ?>" type="button" class="btn btn-block btn-warning btn-sm">Batalkan</a>				
				<?php }	?>				
				 
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
<?php $this->load->view('adminlte/deskripsi'); ?>
<?php include "footer.php"; ?>