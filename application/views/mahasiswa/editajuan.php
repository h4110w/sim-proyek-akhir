<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>
<div class="col-md-9"  style="border: 1px solid; background-color: #fff;">  

<h3>Ganti Judul</h3>

<form enctype="multipart/form-data"  action="<?php echo base_url()."index.php/halamansiswa/updatejudul"; ?>" style="margin-bottom: 15px;" method="post">
  <div class="form-group">
  <?php foreach ($data['judul'] as $dd){ ?>
    <label for="exampleInputEmail1">Judul Tugas Akhir</label>
    <input type="text" name="judul" class="form-control" placeholder="judul Ta mu" value="<?php echo $dd['judul']; ?>">
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

  <input type="text" name="idjudul" style="display: none;" value="<?php echo $dd['idjudul']; ?>">

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
	<?php echo $this->ckeditor->editor('deskripsi',''.$dd["deskripsi"].'');?>
  </div>

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="dokumen">
  </div>
<?php } ?>
  <button type="submit" class="btn btn-success btn-block">Submit</button>
</form>
</div>
<?php $this->load->view('mahasiswa/footer'); ?>