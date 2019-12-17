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
                <h5 class="card-title">Agenda</h5>

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
	              <table id="example2" class="table table-bordered table-striped">
	                <thead>
					<tr>
						<th>No</th>								
						<th>Nama Agenda</th>				
						<th>Tanggal</th>
						<th>Keterangan</th>									
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
<?php include "footer.php"; ?>