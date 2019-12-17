<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>
<div class="col-md-9"  style="border: 1px solid; background-color: #fff;">  


<h3>List Saran Judul</h3>
<table class="table table-condensed">
<tr>
<th>No</th>
<th>Judul</th>
<th>Deskripsi</th>
<th>Pembinbing</th>
<tH>Ket</tH>
</tr>
<?php
	$no=0;
	foreach ($data['judul'] as $d){
	$no++;
?>
<tr>
<td><?php echo $no; ?></td>
<td><?php echo $d['judul']; ?></td>
<td><a id="modal-124577" href="#deskripsi<?php echo $d['idjudul']; ?>" role="button" class="btn" data-toggle="modal">Lihat</a></td>
<td>
1 : <?php echo $d['pembimbing1']; ?><br>
2 : <?php echo $d['pembimbing2']; ?>
</td>
<td>
<?php 
$ada = $d['status'];					
if($ada == 'Ditolak'){ ?>
	<span class="label label-danger">Ditolak</span>
<?php }else if($ada == 'Disetujui'){ ?>
	<a href="<?php echo base_url()."index.php/halamansiswa/diambil?idjudul=".$d['idjudul']; ?>"><span class="label label-success">Klik untuk ambil</span></a>
<?php }else{ ?>
sudah diambil
<?php }	?>
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