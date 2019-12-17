	<!-- iki editan mahasiswa -->
<?php foreach ($data['dosen'] as $d){ ?>
<div class="modal fade" id="editdosen<?php echo $d['nip']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									 <h4 class="modal-title" id="myModalLabel">
										Edit Data : <?php echo $d['namadosen']; ?> 
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">
									<form method="POST" action="<?php echo base_url()."index.php/dosen/edtdosen?nipp=".$d['nip']; ?>">
										  <div class="form-group">
										    <label>NIP</label>										    
										      <input type="text" value="<?php echo $d['nip']; ?>" name="nip" class="form-control" placeholder="Nip Dosen" required="">										    
										  </div>

										  <div class="form-group">
										    <label>Nama</label>										    
										      <input type="text" name="nama" class="form-control" value="<?php echo $d['namadosen']; ?>" placeholder="Nama Dosen">										    
										  </div>

										  <div class="form-group">
										    <label>Password</label>										    
										      <input type="text" name="pass" class="form-control" value="<?php echo $d['password']; ?>" placeholder="Password" required="">										    
										  </div>

										  <div class="form-group">
										    <label>Prodi</label>										  
										      <select class="form-control" name="prodi">
										      		<?php echo 
										      		$jk = $d['prodi'];
										      		if($jk == "Teknik Informatika"){ ?>
										      		<option value="Teknik Informatika">Teknik Informatika</option>		     	
										      		<option value="Multimedia">Multimedia</option>
										      		<?php }else{ ?>										      		
										      		<option value="Multimedia">Multimedia</option>
										      		<option value="Teknik Informatika">Teknik Informatika</option>		     	
										      		<?php }	?>
										      </select>										    
										  </div>
										    
										  <div class="form-group">
										    <label>Kontak</label>										    
										      <input type="text" name="kontak" class="form-control" value="<?php echo $d['nomerhp']; ?>" placeholder="No Hp / Telp">										    
										  </div>

										  <div class="form-group">
										    <label>Alamat</label>										    
										      <textarea name="alamat" class="form-control" placeholder="alamat"><?php echo $d['alamat']; ?></textarea>
										  </div>
										   							
								</div>
								<div class="modal-footer">								 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-primary">
										Update data
									</button>								
								</form>
								</div>
							</div>							
						</div>						
</div>
		<?php } ?>
<!-- iki editan dosen -->