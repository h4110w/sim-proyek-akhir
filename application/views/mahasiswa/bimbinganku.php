<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>
<div class="col-md-9"  style="border: 1px solid; background-color: #fff;">  
<?php foreach ($data['bimbing'] as $d){ 
if($d['bim']>=1){
?>
<?php }else{ ?>
<a href="#"><h3 id="bimbingan">Form Bimbingan Proposal</h3></a>
<?php }}?>
<form enctype="multipart/form-data" id="formbimbingan" style="display: none;"  action="<?php echo base_url()."index.php/Cmonitoring/bimbingkan"; ?>" method="post">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Judul TA</label>
    <?php foreach($data['jdp'] as $j){?>
    <input type="text" class="form-control" readonly="" value="<?php echo $j['judul'] ?>">
  </div>
  <input type="text" style="display: none;" name="idjudul" value="<?php echo $j['idjudul'] ?>">
  <?php } ?>

  <div class="form-group">
    <label for="exampleInputEmail1">Dosen Pembimbing</label>
    <select class="form-control" name="nip">
      <option value="<?php echo $j['nip1']; ?>"><?php echo $j['pembimbing1']; ?></option>
      <option value="<?php echo $j['nip2']; ?>"><?php echo $j['pembimbing2']; ?></option>
  </select>
  </div>

  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="dokumen">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan</label>
  <textarea class="form-control" name="keterangan"></textarea>
  </div>

  <button type="submit" class="btn btn-danger btn-block">Submit</button>
</form>

<h3>Detail Bimbingan</h3>
<table class="table table-condensed">
<tr>
<th>No</th>
<th>Bimbingan</th>
<th>Tanggal</th>
<th>Pembimbing</th>
<th>Cek</th>
<th>File</th>
<tH>Keterangan</tH>
<th>Edit</th>
</tr>
<?php
  $no=0;
  foreach ($data['bimbingan'] as $d){
  $no++;
?>
<tr>
<td><?php echo $no; ?></td>
<td>Bimbingan ke <?php echo $no; ?></td>
<td><?php echo $d['tgl_bimbingan']; ?></td>
<td><?php echo $d['namadosen']; ?></td>
<td>
  <?php 
          $ada = $d['acc'];          
          if($ada == 'Belum'){
          ?>
          <span class="label label-danger">Belum</span>
          <?php   
          }else{  ?>
          <span class="label label-success">Sudah</span>
        <?php
          }
        ?>  
</td>
<td><a id="modal-124577" href="#deskripsi<?php echo $d['idb']; ?>" role="button" data-toggle="modal">Lihat</a></td>
<td><?php echo $d['keterangan']; ?></td>
<td>
<a id="modal-124577" href="#edit<?php echo $d['idb']; ?>" role="button" data-toggle="modal">Edit</a>
</td>
</tr>
<?php } ?>
</table>


</div>
<?php $this->load->view('mahasiswa/footer'); ?>

<!-- Detail tempat -->
<?php foreach ($data['bimbingan'] as $d){ ?>
<div class="modal fade" id="deskripsi<?php echo $d['idb']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Scan Dokumen</h4>
      </div>
        <div class="modal-body">
      
      <img src="<?php echo base_url()."assets/gambar/".$d['bimbingan'] ?>" class="img-responsive" alt="Responsive image">

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
      </div>
    </div>
  </div>
</div>
<?php } ?>

<!-- Update Bimbingan -->
<?php foreach ($data['bimbingan'] as $d){ ?>
<div class="modal fade" id="edit<?php echo $d['idb']; ?>" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Update Bimbingan</h4>
      </div>
        <div class="modal-body">
     

<form enctype="multipart/form-data" action="<?php echo base_url()."index.php/Cmonitoring/updatebimbingan"; ?>" method="post">
 
  <div class="form-group">
    <label for="exampleInputEmail1">Judul TA</label>

  <?php foreach($data['jdp'] as $j){?>
    <input type="text" class="form-control" readonly="" value="<?php echo $j['judul'] ?>">
    <input type="text" class="form-control" style="display: none;" name="idjudul" readonly="" value="<?php echo $j['idjudul'] ?>">
  </div>
  <?php } ?>

  <input type="text" style="display: none;" name="idb" value="<?php echo $d['idb'] ?>">
  
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" name="dokumen">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Keterangan</label>
  <textarea class="form-control" name="keterangan"><?php echo $d['keterangan'] ?></textarea>
  </div>


        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
        <button type="submit" class="btn btn-primary">Save changes</button>
</form>
      </div>
    </div>
  </div>
</div>
<?php } ?>