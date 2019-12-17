<?php $this->load->view('mahasiswa/header'); ?>
<?php $this->load->view('mahasiswa/kiri'); ?>
<div class="col-md-9"  style="border: 1px solid; background-color: #fff;">  

<h3>Dosen Pembimbing AKNS</h3>
<table class="table table-striped table-bordered table-condensed table-hover">
<thead>
        <tr>
        <th>No</th>               
        <th>Nama Dosen</th>       
        <th>NIP</th>
        <th>Prodi</th>        
        <th>Alamat</th>
        <th>Kontak</th>
        </tr>
      </thead>
      
      <tbody>
       <?php
                if($this->uri->segment(3)){
                     $no=$this->uri->segment(3);
                }
                else{
                     $no=0;
                }
 
                 foreach ($data['dosen'] as $d)
                 {
                      $no++;
                      ?>
        <tr>
        <td><?php echo $no; ?></td>       
        <td><?php echo $d['namadosen']; ?></td>
        <td><?php echo $d['nip']; ?></td>       
        <td><?php echo $d['prodi']; ?></td>             
        <td><?php echo $d['alamat']; ?></td>
        <td><?php echo $d['nomerhp']; ?></td>
        </tr>
      <?php } ?>      
      </tbody>
    </table>

    <div id="pagination">
                 <ul class="pagination">
                      <?php foreach ($data['links'] as $link) {
                           echo "<li>". $link."</li>";
                      } ?>
                 </ul>
            </div>


</div>
<?php $this->load->view('mahasiswa/footer'); ?>