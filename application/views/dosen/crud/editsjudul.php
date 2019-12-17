<!-- iki editan mahasiswa -->
<?php foreach ($data['judul'] as $j){ ?>
<div class="modal fade" id="editjudul<?php echo $j['idjudul']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
								<div class="modal-header">
									 <h4 class="modal-title" id="myModalLabel">
										Edit Data : Judul 
									</h4>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>									
								</div>
								<div class="modal-body">
									<form action="<?php echo base_url()."index.php/judul/updatejudul"; ?>" style="margin-bottom: 15px;" method="post">
										   <div class="form-group">
									  
									    <label for="exampleInputEmail1">Judul Tugas Akhir</label>
									    <input type="text" name="judul" class="form-control" placeholder="judul Ta mu" value="<?php echo $j['judul']; ?>">
									  </div>

									  <div class="form-group">
									    <label for="exampleInputEmail1">Dosen Pembimbing 1</label>
									    <select class="form-control" name="dospem1">
											  <option value="<?php echo $j['p1']; ?>"><?php echo $j['pembimbing1']; ?></option>
											  <?php
											  foreach ($data['dosen'] as $d) {
											  ?>
											  <option value="<?php echo $d['nip']; ?>"><?php echo $d['namadosen']; ?></option>
											  <?php } ?>
										</select>
									  </div>

									  <input type="text" name="idjudul" style="display: none;" value="<?php echo $j['idjudul']; ?>">

									  <div class="form-group">
									    <label for="exampleInputEmail1">Dosen Pembimbing 2</label>
									     <select class="form-control" name="dospem2">
											  <option value="<?php echo $j['p2']; ?>"><?php echo $j['pembimbing2']; ?></option>
											  <?php
											  foreach ($data['dosen'] as $d) {
											  ?>
											  <option value="<?php echo $d['nip']; ?>"><?php echo $d['namadosen']; ?></option>
											  <?php } ?>
										</select>
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