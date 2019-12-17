	<!-- iki editan agenda -->
	<?php foreach ($data['agenda'] as $d){ ?>	
	<div class="modal fade" id="editagenda<?php echo $d['idagenda']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title" id="myModalLabel">
										Tambah Data Agenda
									</h4> 
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>
									
								</div>
								<div class="modal-body">									
									<form class="form-horizontal" method="POST" action="<?php echo base_url()."index.php/Cagenda/updateagenda?idag=".$d['idagenda']; ?>">

										  <div class="form-group">
										    <label>Judul Agenda</label>								
										      <input type="text" name="namaagenda" class="form-control" placeholder="Nama Mahasiswa" value="<?php echo $d['nama_agenda']; ?>">
										  </div>

										  <div class="form-group">
										    <label>Judul Agenda</label>								
										      <input type="text" name="tglagenda" class="form-control" placeholder="Nama Mahasiswa" value="<?php echo $d['tgl_agenda']; ?>">
										  </div>
										    										  
										  <div class="form-group">
										    <label>Keterangan</label>										    
										      <div class="mb-3">
									            <textarea class="textarea" name="keterangan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $d['keterangan']; ?></textarea>
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
						
					</div>		<?php } ?>
<!-- iki editan dosen -->