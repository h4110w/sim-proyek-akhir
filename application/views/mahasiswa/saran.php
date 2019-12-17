<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>
<div class="col-md-9"  style="border: 1px solid; background-color: #fff;">  


<h3>List Saran Judul</h3>
<table class="table table-condensed table-bordered">
<tr>
<th>No</th>
<th>Judul</th>
<td align="center"><b>Ambil</b></td>
</tr>
<?php
	$no=0;
	foreach ($data['judul'] as $d){
	$no++;
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $d['judul']; ?></td>
<td align="center">
<a href="<?php echo base_url()."index.php/halamansiswa/ambilsaran?idjudul=".$d['idjudul']; ?>">Ambil</a>
</td>
</tr>
<?php } ?>
</table>

</div>
<?php $this->load->view('mahasiswa/footer'); ?>

<!-- Detail tempat -->
<?php foreach ($data['judul'] as $d){ ?>
<div class="modal fade" id="deskripsi<?php echo $d['idjudul']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" id="myModalLabel">Deskripsi <?php echo $d['judul']; ?></h4>
			</div>
				<div class="modal-body">
			<?php echo $d['deskripsi']; ?>

				</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
			</div>
		</div>
	</div>
</div>
<?php } ?>