	<!-- iki editan mahasiswa -->
<?php foreach ($data['judul'] as $j){ ?>
<div class="modal fade" id="tolak<?php echo $j['idjudul']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									 <h4 class="modal-title" id="myModalLabel">
										Tolak Judul Ini 
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">
									<form action="<?php echo base_url()."index.php/tjudul/ktolak"; ?>" style="margin-bottom: 15px;" method="post">
									  <div class="form-group">									  
									    <label for="exampleInputEmail1">Judul Tugas Akhir</label>
									  	<input type="text" name="idjudul" style="display: none;" value="<?php echo $j['idjudul']; ?>">
									    <input type="text" name="judul" class="form-control" placeholder="judul Ta mu" required="" value="<?php echo $j['judul']; ?>">
									  </div>

									  <div class="form-group">									  
									    <label for="exampleInputEmail1">Deskripsi</label>
									    <?php echo $j['deskripsi']; ?>
									  </div>

									  <div class="form-group">									  
									    <label for="exampleInputEmail1">Komentar</label>
									    <textarea name="komentar" class="form-control" placeholder="komentari..."></textarea>
									  </div>									  
									 																			   							
								</div>
								<div class="modal-footer">								 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-danger">
										Tolak
									</button>								
								</form>
								</div>
							</div>							
						</div>						
</div>
		<?php } ?>
<!-- iki editan dosen -->