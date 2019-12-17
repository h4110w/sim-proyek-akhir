<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>
<div class="col-md-9"  style="border: 1px solid; background-color: #fff;">  

<?php
	foreach ($data['jum'] as $d){
	$j = $d['jumlah'];
	if($j > 1){
		echo "<h3>Pengajuan Max 2</h3>";
	}else{
?>
<a href="#"><h3 id="ajukanjudul">Form Pengajuan Judul</h3></a>
<?php }} ?>

<form enctype="multipart/form-data" id="formjudul" style="display: none;"  action="<?php echo base_url()."index.php/halamansiswa/ajukanjudul"; ?>" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Judul Tugas Akhir</label>
    <input type="text" name="judul" class="form-control" placeholder="judul Ta mu">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Dosen Pembimbing 1</label>
    <select class="form-control" name="dospem1">
		  <?php
		  foreach ($data['dosen'] as $d) {
		  ?>
		  <option value="<?php echo $d['nip']; ?>"><?php echo $d['namadosen']; ?></option>
		  <?php } ?>
	</select>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Dosen Pembimbing 2</label>
     <select class="form-control" name="dospem2">
		  <?php
		  foreach ($data['dosen'] as $d) {
		  ?>
		  <option value="<?php echo $d['nip']; ?>"><?php echo $d['namadosen']; ?></option>
		  <?php } ?>
	</select>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Deskripsi</label>
	<?php echo $this->ckeditor->editor('deskripsi','');?>
  </div>

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="dokumen">
  </div>

  <button type="submit" class="btn btn-danger btn-block">Submit</button>
</form>

<h3>List Pengajuan Judul</h3>
<table class="table table-condensed">
<tr>
<th>No</th>
<th>Judul</th>
<th>Deskripsi</th>
<th>Pembinbing</th>
<th>komentar</th>
<tH>Status</tH>
<th>Aksi</th>
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
<td><font color="red"><?php echo $d['komentar']; ?></font></td>
<td>
<?php 
$ada = $d['status'];					
if($ada == 'Ditolak'){ ?>
	<span class="label label-danger">Ditolak</span>
<?php }else if($ada == 'Disetujui'){ ?>
	<a href="<?php echo base_url()."index.php/home/diambil?idjudul=".$d['idjudul']; ?>"><span class="label label-success">Klik untuk ambil</span></a>
<?php }else if($ada == 'Diambil'){ ?>
	<span class="label label-primary">Diambil</span>
<?php }else{ ?>
	<span class="label label-warning">Belum Disetujui</span>
<?php }	?>
</td>
<td>
<?php 
$ada = $d['status'];					
if($ada == 'Diambil'){}else{?>
<a href="<?php echo base_url()."index.php/halamansiswa/editajuan?idjudul=".$d['idjudul']; ?>">Update</a> | 
<a href="<?php echo base_url()."index.php/halamansiswa/hapusajuan?idjudul=".$d['idjudul']; ?>">Hapus</a>
<?php } ?>
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