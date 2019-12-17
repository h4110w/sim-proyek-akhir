<?php foreach ($data['judul'] as $d){ ?>
	<div class="modal fade" id="modal-container-124577<?php echo $d['idjudul']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">							
										Deskripsi singkat							
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										×
									</button>
									
								</div>
								<div class="modal-body">
									<p style="word-break: break-all;">
									<?php echo $d['deskripsi']; ?>
								</div>
								<div class="modal-footer">
									 									
								</div>
							</div>
							
						</div>
						
					</div>
<?php } ?>					