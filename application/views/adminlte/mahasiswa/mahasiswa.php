<?php 
$this->load->view('adminlte/navbar');
$this->load->view('adminlte/sidebarmenu');
$this->load->view('adminlte/kontainer');
?>
 <div class="row">
 <div class="col-md-12">                                    
		<div class="card">
		<div class="card-header">
                <h5 class="card-title">Data Mahasiswa Teknik Informatika</h5>
                <div class="card-tools">
                <button type="button" id="modal-124577" href="#inputmahasiswa" class="btn btn-tool" data-toggle="modal">Tambah
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
					<th>Nama Mahasiswa</th>
					<th>NRP</th>
					<th>JK</th>
					<th>TTL</th>
					<th>Alamat</th>
					<th>Kontak</th>
					<th>Aksi</th>
				</tr>
				</thead>
                <tbody>                
				<?php foreach ($data['mahasiswa'] as $d){ ?>
				<tr>
				<td><?php echo $d['nrp']; ?></td>
				<td><?php echo $d['nama_mahasiswa']; ?></td>
				<td><?php echo $d['jk']; ?></td>
				<td><?php echo $d['tempat_lahir']; ?><?php echo ", ".date('d-m-Y', strtotime($d['tgl_lahir']));?></td>
				<td><?php echo $d['alamat']; ?></td>
				<td><?php echo $d['no_hp']; ?></td>
				<td align="center">				
				<a href="#editmahasiswa<?php echo $d['nrp']; ?>" data-toggle="modal"><span class="fa fa-edit" aria-hidden="true"></span></a> | 
				<a href="<?php echo base_url()."index.php/mahasiswa/hapusmahasiswa?jurusan=ti&nrp=".$d['nrp']; ?>">
				<span class="fa fa-trash" aria-hidden="true"></span></a>
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
$this->load->view('adminlte/crud/editmahasiswa'); 
$this->load->view('adminlte/footer');
?>