	<!-- iki editan mahasiswa -->
<?php foreach ($data['judul'] as $j){ ?>
<div class="modal fade" id="editjudul<?php echo $j['idjudul']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									 <h4 class="modal-title" id="myModalLabel">
										Edit Data
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">
									<form action="<?php echo base_url()."index.php/saran/update"; ?>" style="margin-bottom: 15px;" method="post">
										   <div class="form-group">
									  
									    <label for="exampleInputEmail1">Judul</label>
									    <input type="text" name="idjudul" style="display: none;" class="form-control" placeholder="judul Ta mu" value="<?php echo $j['idjudul']; ?>">
									    <textarea name="judul" class="form-control" placeholder="judul Ta mu" rows="5"><?php echo $j['judul']; ?></textarea>
									  </div>
									 																			   							
								</div>
								<div class="modal-footer">								 
									<button type="button" class="btn btn-default" data-dismiss="modal">
										Close
									</button> 
									<button type="submit" class="btn btn-warning">
										Update
									</button>								
								</form>
								</div>
							</div>							
						</div>						
</div>
		<?php } ?>
<!-- iki editan dosen -->