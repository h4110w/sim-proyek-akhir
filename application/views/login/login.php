<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

  </head>
  <body style="background-image: url('<?php echo base_url() ?>gambar/bgr.png');">

    <div class="container-fluid">
	<div class="row" style="margin: 50px">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-7" style="margin-right: 5px; background-color: #fff;  border: 1px solid;
    border-radius: 5px; opacity: 0.9; filter: alpha(opacity=30);">
					<h3 class="text-danger">
						Agenda 
					</h3>
				
				<div class="jumbotron well">
				
				<?php
                if($this->uri->segment(3)){
                     $no=$this->uri->segment(3);
                }
                else{
                     $no=0;
                }
 
                foreach ($data['agenda'] as $d)
                {
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
				<div class="col-md-4" style="height: 300px; background-color: #fff;  border: 1px solid;
    border-radius: 5px;">
					<h3 class="text-success">
						Login sini!
					</h3>
					<?php echo form_open("login/cek_login"); ?>
                    <fieldset>
						<div class="form-group">							 
							<label for="exampleInputEmail1">
								Username
							</label>
							<input class="form-control" id="exampleInputEmail1" required="" name="username">
						</div>

						<div class="form-group">							 
							<label for="exampleInputPassword1">
								Password
							</label>
							<input class="form-control" id="exampleInputPassword1" type="password" name="password" required="">
						</div>					
					
						<button type="submit" class="btn btn-default">
							Login
						</button>

					</fieldset>
			      	<?php echo form_close(); ?>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/scripts.js"></script>
  </body>
</html>