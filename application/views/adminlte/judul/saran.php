<?php 
$this->load->view('adminlte/navbar');
$this->load->view('adminlte/sidebarmenu');
$this->load->view('adminlte/kontainer');
?>
 <div class="row">
 <div class="col-md-12">
 	 <div class="card card-default collapsed-card">
              <div class="card-header bg-info-gradient" data-widget="collapse">
                <h3 class="card-title">Tambah Judul</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool"><i class="fa fa-plus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <p>* <code>Masukan Saran Judul</code></p>
               <form method="post" action="<?php echo base_url()."index.php/saran/ajukanjudul"?>">
                <div class="input-group input-group">                
                  <input type="text" class="form-control" name="judul">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-warning btn-flat">Tambahkan</button>
                  </span>              	
                </div>
                </form>
                <!-- /input-group -->
              </div>
              <!-- /.card-body -->
            </div>
		<div class="card">
		<div class="card-header"><h5 class="card-title">Saran Judul</h5></div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                  <!-- DATA KONTEN ANJIR -->
                   <table id="example1" class="table table-bordered table-hover">
	                <thead>
				<tr>
				<th width="10%">No</th>								
				<th>Judul</th>												
				<th width="10%">Tahun</th>				
				<th width="10%">Aksi</th>
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
				<td><?php echo $d['judul']; ?></td>								
				<td><?php echo $d['tahun']; ?></td>				
				<td>
				<a id="modal-124577" href="#editjudul<?php echo $d['idjudul']; ?>" class="fa fa-edit" data-toggle="modal"></a>
				<a class="fa fa-trash" href="<?php echo base_url()."index.php/saran/hapus?idjudul=".$d['idjudul']; ?>"></a>
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
$this->load->view('adminlte/crud/editsaran');
$this->load->view('adminlte/footer');
?>
