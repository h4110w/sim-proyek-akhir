	<!-- iki editan mahasiswa -->
	<?php foreach ($data['mahasiswa'] as $d){ ?>
	<div class="modal fade" id="editmahasiswa<?php echo $d['nrp']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">
										Edit Data : <?php echo $d['nama_mahasiswa'];?>
									</h4> 
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">
									
								<form method="POST" action="<?php echo base_url()."index.php/mahasiswa/editmhs?nrp=".$d['nrp']; ?>">
									<div class="row">
                  				  		<div class="col-md-6">

										  <div class="form-group">
										    <label>NRP</label>									
										    <input type="text" name="nrp" class="form-control" placeholder="Nrp Mahasiswa" value="<?php echo $d['nrp'];?>" required="">						
										  </div>

										  <div class="form-group">
										    <label>Nama</label>
										      <input type="text" name="nama" class="form-control" value="<?php echo $d['nama_mahasiswa'];?>" placeholder="Nama Mahasiswa">
										  </div>

										  <div class="form-group">
										    <label>Jurusan</label>
										      <select class="form-control" name="jurusan">
										      		<?php echo 
										      		$jk = $d['jk'];
										      		if($jk == "Teknik Informatika"){ ?>
										      		<option value="Teknik Informatika">Laki-laki</option>		     	
										      		<option value="Multimedia">Perempuan</option>
										      		<?php }else{ ?>										      		
										      		<option value="Multimedia">Perempuan</option>
										      		<option value="Teknik Informatika">Laki-laki</option>		     	
										      		<?php }	?>									
										      </select>										    
										  </div>

										  <div class="form-group">
										    <label>Gender</label>								
										      <select class="form-control" name="jk">
										      		<?php echo 
										      		$jk = $d['jk'];
										      		if($jk == "Laki-Laki"){ ?>
										      		<option value="Laki-Laki">Laki-laki</option>		     	
										      		<option value="Perempuan">Perempuan</option>
										      		<?php }else{ ?>										      		
										      		<option value="Perempuan">Perempuan</option>
										      		<option value="Laki-Laki">Laki-laki</option>		     	
										      		<?php }	?>									      	
										      </select>										    
										  </div>

									 </div>
									 <div class="col-md-6">

										  <div class="form-group">
										    <label>Tempat Lahir</label>
										      <input type="text" name="tempat" value="<?php echo $d['tempat_lahir'];?>" class="form-control" placeholder="Tempat Lahir">
										  </div>

										  <div class="form-group">
										    <label>Tanggal Lahir</label>
										      <input type="text" name="tgllahir" value="<?php echo $d['tgl_lahir'];?>" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask placeholder="Tempat Lahir">
										  </div>

										  <div class="form-group">
										    <label>Kontak</label>										    
										      <input type="text" value="<?php echo $d['no_hp'];?>" name="kontak" class="form-control" placeholder="No Hp / Telp">										  
										  </div>

										    <div class="form-group">
										    <label>Alamat</label>										    
										      <textarea name="alamat" class="form-control" placeholder="alamat"><?php echo $d['alamat'];?>							
										      </textarea>										    
										  </div>
										
									</div>
								</div>
										   							
								</div>
								<div class="modal-footer">
									 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-success">
										Perbarui Data
									</button>
								
								</form>

								</div>
							</div>							
						</div>						
					</div>
					<?php } ?>