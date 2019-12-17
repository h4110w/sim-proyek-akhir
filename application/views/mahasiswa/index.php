<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>


<div class="col-md-6"  style="border: 1px solid; background-color: #fff;">

<div class="jumbotron" style="margin-top: 15px; background-color: #fff;  border: 1px solid;
    border-radius: 5px;">  
<?php
   if($this->uri->segment(3)){
      $no=$this->uri->segment(3);
    }else{
      $no=0;
    }foreach ($data['agenda'] as $d){
      $no++;
    ?>
	<p><?php echo $d['nama_agenda']; ?> : <?php echo $d['tgl_agenda']; ?></p>
	<?php echo $d['keterangan']; ?><hr>
	<?php } ?>

</div>

<div id="pagination">
  <ul class="pagination">
  <?php foreach ($data['links'] as $link) {
  echo "<li>". $link."</li>";
  } ?>
</ul>
</div>

</div>
<?php $this->load->view('mahasiswa/kanan'); ?>
<?php $this->load->view('mahasiswa/footer'); ?>