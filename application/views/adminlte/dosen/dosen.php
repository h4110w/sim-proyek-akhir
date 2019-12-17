<?php 
$this->load->view('adminlte/navbar');
$this->load->view('adminlte/sidebarmenu');
$this->load->view('adminlte/kontainer');
?>
 <div class="row">
 <div class="col-md-12">                                    
		<div class="card">
		<div class="card-header">
                <h5 class="card-title">Dosen AK Sumenep</h5>
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
                <table id="example1" class="table table-bordered table-striped">
                <thead>
					<tr>
					<th>No</th>								
					<th>Nama Dosen</th>				
					<th>NIP</th>
					<th>Prodi</th>				
					<th>Alamat</th>
					<th>Kontak</th>
					<th>Aksi</th>
					</tr>
				</thead>
                <tbody>
                <?php                
		            $no=0;              
		            foreach ($data['dosen'] as $d){
		            $no++;
                ?>
				<tr>
				<td><?php echo $no; ?></td>				
				<td><?php echo $d['namadosen']; ?></td>
				<td><?php echo $d['nip']; ?></td>				
				<td><?php echo $d['prodi']; ?></td>							
				<td><?php echo $d['alamat']; ?></td>
				<td><?php echo $d['nomerhp']; ?></td>
				<td align="center">
				<a href="<?php echo base_url()."index.php/dosen/detail/".$d['nip'];?>">
				<span class="fa fa-book" aria-hidden="true">					
				</span></a> | 
				<a href="#editdosen<?php echo $d['nip']; ?>" data-toggle="modal">
				<span class="fa fa-edit" aria-hidden="true">					
				</span></a> | 
				<a href="<?php echo base_url()."index.php/dosen/hapusdosen?nip=".$d['nip']; ?>">
				<span class="fa fa-trash" aria-hidden="true">
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
<?php 
$this->load->view('adminlte/crud/inputan');
$this->load->view('adminlte/crud/editdosen'); 
$this->load->view('adminlte/footer'); ?>
?>