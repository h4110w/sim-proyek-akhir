<div class="col-md-3" style="height: 400px; border: 1px solid;background-color: #fff;">

<div class="panel panel-default" style="margin-top: 15px;">
<div class="panel-body">

<table class="table table-bordered">
<tr>
<th>No</th><th>Daftar Judul</th>
</tr>
 <?php 
 	$no = 0;
   foreach ($data['judul'] as $d) {
   $no++;
   ?>
   <tr>
  <td><?php echo $no; ?></td><td><?php echo $d['judul']; ?></td>
   </tr>
   <?php } ?>
<tr>
<th>No</th><th>Status Judul</th>
</tr>
<?php
	$no = 0;
   foreach ($data['judul'] as $d) {
   $no++;
?>
   <tr>
   <td><?php echo $no; ?></td>
   <td>
   <?php 
	$ada = $d['status'];					
	if($ada == 'Ditolak'){ ?>
		<span class="label label-danger">Ditolak</span>
	<?php }else if($ada == 'Disetujui'){ ?>
		<span class="label label-success">Disetujui</span>
	<?php }else if($ada == 'Diambil'){ ?>
		<span class="label label-primary">Diambil</span>
	<?php }else{ ?>
		<span class="label label-warning">Belum Disetujui</span>
	<?php }	?>
   </td>
   </tr>
   <?php } ?>
</table>

</div>
</div>


</div>