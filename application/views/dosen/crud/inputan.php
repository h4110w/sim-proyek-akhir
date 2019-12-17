	<!-- iki inputan mahasiswa -->
	<div class="modal fade" id="inputmahasiswa" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">
										Tambah Data Mahasiswa
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">							
									<form method="POST" action="<?php echo base_url()."index.php/mahasiswa/simpanmhs"?>">
								<div class="row">
                  				  <div class="col-md-6">

										  <div class="form-group">
										    <label>NRP</label>										    
										      <input type="text" name="nrp" required="" class="form-control" placeholder="Nrp Mahasiswa" required="">
										  </div>

										  <div class="form-group">
										    <label>Nama</label>										    
										      <input type="text" name="nama" required="" class="form-control" placeholder="Nama Mahasiswa">			
										  </div>

										  <div class="form-group">
										    <label>Jurusan</label>										    
										      <select class="form-control" name="jurusan">
										      		<option value="Teknik Informatika">Teknik Informatika</option>		     	
										      		<option value="Multimedia">Multimedia</option>										
										      </select>										    
										  </div>

										  <div class="form-group">
										    <label>Gender</label>										    
										      <select class="form-control" name="jk">
										      		<option value="Laki-Laki">Laki-laki</option>
										      		<option value="Perempuan">Perempuan</option>
										      </select>										    
										  </div>

									 </div>
									 <div class="col-md-6">

										  <div class="form-group">
										    <label>TTL</label>
										    <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir">
										  </div>

										   <div class="form-group">
										    <label>Tanggal Lahir</label>
										    <input type="text" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask name="tgllahir" class="form-control">
										   </div>										  

										    <div class="form-group">
										    <label>Kontak</label>								
										      <input type="text" name="kontak" class="form-control" placeholder="No Hp / Telp">
										  </div>

										    <div class="form-group">
										    <label>Alamat</label>										    
										      <textarea name="alamat" class="form-control" placeholder="alamat"></textarea>
										  </div>
									</div>
								</div>
										   							
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-primary">
										Save changes
									</button>
								
								</form>

								</div>
							</div>
							
						</div>
						
	</div>



<!-- iki inputan dosen -->
	<div class="modal fade" id="inputdosen" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">
										Tambah Data Dosen
									</h4> 
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">
									
									<form role="form" method="post" action="<?php echo base_url()."index.php/dosen/simpandosen"?>">

										  <div class="form-group">
										    <label>NIP</label>										    
										      <input type="text" name="nip" class="form-control" placeholder="Nip Dosen" required="">
										  </div>

										  <div class="form-group">
										    <label>Password</label>										    
										      <input type="text" name="pass" class="form-control" placeholder="Password" required="">							
										  </div>

										  <div class="form-group">
										    <label>Nama Dosen</label>										
										      <input type="text" name="nama" class="form-control" placeholder="Nama Dosen">									    
										  </div>

										  <div class="form-group">
										    <label>Prodi</label>										  
										      <select class="form-control" name="prodi">
										      		<option value="Teknik Informatika">Teknik Informatika</option>		     	
										      		<option value="Multimedia">Multimedia</option>										      	
										      </select>										  
										  </div>
										    
										  <div class="form-group">
										    <label>Kontak</label>										    
										      <input type="text" name="kontak" class="form-control" placeholder="No Hp / Telp">
										  </div>

										  <div class="form-group">
										    <label>Alamat</label>
										      <textarea name="alamat" class="form-control" placeholder="alamat"></textarea>										  
										  </div>
										   							
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-primary">
										Save changes
									</button>
								
								</form>

								</div>
							</div>
							
						</div>
						
	</div>


<!-- INPUT AGENDA -->	
	<div class="modal fade" id="inputagenda" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									 <h4 class="modal-title" id="myModalLabel">
										Tambah Data Mahasiswa
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">									
									<form method="POST" action="<?php echo base_url()."index.php/Cagenda/simpanagenda"?>">

										  <div class="form-group">
										    <label>Judul Agenda</label>										    
										      <input type="text" name="namaagenda" class="form-control" placeholder="Nama Mahasiswa">
										  </div>
										  
										  <div class="form-group">
										    <label>Judul Agenda</label>										    
										      <input type="text" name="namaagenda" class="form-control" placeholder="Nama Mahasiswa">
										  </div>

										  <div class="form-group">
										    <label>Keterangan</label>					
										      <div class="mb-3">
									            <textarea class="textarea" name="keterangan" placeholder="Place some text here"
									                      style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
									          </div>
										  </div>
										   							
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-primary">
										Save changes
									</button>
								
								</form>

								</div>
							</div>
							
						</div>
						
	</div>


