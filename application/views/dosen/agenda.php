<?php 
 include "navbar.php";
 include "sidebarmenu.php";
 include "kontainer.php";
 ?>
 <div class="row">
 <div class="col-md-12">                                    
		<div class="card">
		<div class="card-header">
                <h5 class="card-title">Data Agenda</h5>
                <div class="card-tools">
                <button type="button" id="modal-124577" href="#inputagenda" class="btn btn-tool" data-toggle="modal">Tambah
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
                <table id="example2" class="table table-bordered table-striped">
                <thead>
				<tr>
					<th>No</th>								
					<th>Nama Agenda</th>				
					<th>Tanggal</th>
					<th>Keterangan</th>				
					<th>Aksi</th>				
				</tr>
			</thead>
                <tbody>
                <?php                
		            $no=0;              
		            foreach ($data['agenda'] as $d){
		            $no++;
                ?>
				<tr>
				<td><?php echo $no; ?></td>				
				<td><?php echo $d['nama_agenda']; ?></td>
				<td><?php echo $d['tgl_agenda']; ?></td>				
				<td><?php echo $d['keterangan']; ?></td>							
				<td align="center">
				<a href="#editagenda<?php echo $d['idagenda']; ?>" data-toggle="modal">
				<span class="fa fa-edit text-primary" aria-hidden="true">					
				</span></a>   |   
				<a href="<?php echo base_url()."index.php/Cagenda/hapusagenda?idag=".$d['idagenda']; ?>">
				<span class="fa fa-trash text-danger" aria-hidden="true">
					
				</span></a>
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
<?php $this->load->view('adminlte/crud/inputan'); ?>
<?php $this->load->view('adminlte/crud/editagenda'); ?>
<?php
 include "footer.php";
?>
