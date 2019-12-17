<div class="row" style="padding: 15px">
<div class="col-md-3" style="height: 400px; border: 1px solid; background-color: #fff;">

<div class="panel panel-default" style="margin-top: 15px;">
<div class="panel-body">
	<?php
	foreach ($data['detail'] as $d) {
	?>
    <b>Nama Mahasiswa : </b> <br>
    <?php echo $d['nama_mahasiswa']; ?><br>
    <b> NRP : </b> <br>
    <?php echo $d['nrp']; ?><br>
    <?php } ?>

    <?php
    foreach ($data['jdp'] as $d) {
    ?>
    <b>Dosen Pembimbing 1 : </b><br>
    <?php echo $d['pembimbing1']; ?><br>
    <b>Dosen Pembimbinh 2 : </b><br>
    <?php echo $d['pembimbing2']; ?><br>
    <b>Judul Tugas akhir : </b><br>
    <?php echo $d['judul']; ?><br>
    <?php } ?>

</div>
</div>

</div>