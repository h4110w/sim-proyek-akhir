<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmonitoring extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
        	redirect('login');
        }      
        $this->load->model('Madmin'); 
        $this->load->model('Mmahasiswa'); 
        $this->load->helper(array('url'));                
    }

	public function index(){
		$idjd = $_GET['idjudul'];	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['judul'] = $this->Madmin->GetJudul(" where m.nrp=j.username and j.status='Diambil' and j.idjudul='$idjd'");
		$data['deadline'] = $this->Madmin->DeadLine();
		$data['rek'] = $this->Mjudul->GetSet();
      	$data['bimbingan'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd order by b.tgl_bimbingan");
		$this->load->view('admin/detailmonitoring',array('data'=>$data));
	}

	public function bimbingkan(){
		$this->load->library('upload');
		$idj = $_POST['idjudul'];
        $nmfile = "file_".time();
        $config['upload_path'] = './assets/gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5048'; 
        $config['max_width']  = '2400';
        $config['max_height']  = '3400';
        $config['file_name'] = $nmfile; 
        $this->upload->initialize($config);        
        if($_FILES['dokumen']['name']){
        	if ($this->upload->do_upload('dokumen')){
  				$idj = $_POST['idjudul'];
  				$nrp = $this->session->userdata('username');		
				$gbr = $this->upload->data();
				$tgl = date('Y-m-d');
				$ket = $_POST['keterangan'];
				$nip = $_POST['nip'];
				$st = "Proposal";
				$acc = "Belum";
				$simpandata = array(								
					'idjudul' => $idj,
					'nrp' => $nrp,
					'bimbingan' => $gbr['file_name'],
					'tgl_bimbingan' => $tgl,
					'nip' => $nip,
					'status' => $st,
					'acc' => $acc,
					'keterangan' => $ket
				);			
 				$res = $this->Mmahasiswa->Bimbingan('bimbingan',$simpandata);
 				redirect('halamansiswa/bimbinganku?idjudul='.$idj.'');
 			}else{
 				//redirect('Tempat/index');
 			}
 		}else{
 				$idj = $_POST['idjudul'];
  				$nrp = $this->session->userdata('username');		
				$tgl = date('Y-m-d');
				$ket = $_POST['keterangan'];
				$nip = $_POST['nip'];
				$acc = "Belum";
				$st = "Proposal";
				$simpandata = array(								
					'idjudul' => $idj,
					'nrp' => $nrp,
					'nip' => $nip,
					'acc' => $acc,
					'status' => $st,
					'tgl_bimbingan' => $tgl,
					'keterangan' => $ket
				);			
 				$res = $this->Mmahasiswa->Bimbingan('bimbingan',$simpandata);
 				redirect('halamansiswa/bimbinganku?idjudul='.$idj.'');
 		}
 	}

 	public function bimbingkanta(){
		$this->load->library('upload');
		$idj = $_POST['idjudul'];
        $nmfile = "file_".time();
        $config['upload_path'] = './assets/gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['max_size'] = '5048'; 
        $config['max_width']  = '2400';
        $config['max_height']  = '2400';
        $config['file_name'] = $nmfile; 
        $this->upload->initialize($config);        
        if($_FILES['dokumen']['name']){
        	if ($this->upload->do_upload('dokumen')){
  				$idj = $_POST['idjudul'];
  				$nrp = $this->session->userdata('username');		
				$gbr = $this->upload->data();
				$tgl = date('Y-m-d');
				$ket = $_POST['keterangan'];
				$nip = $_POST['nip'];
				$acc = "Belum";
				$st = "TA";
				$simpandata = array(								
					'idjudul' => $idj,
					'nrp' => $nrp,
					'bimbingan' => $gbr['file_name'],
					'tgl_bimbingan' => $tgl,
					'nip' => $nip,
					'status' => $st,
					'acc' => $acc,
					'keterangan' => $ket
				);			
 				$res = $this->Mmahasiswa->Bimbingan('bimbingan',$simpandata);
 				redirect('halamansiswa/bimbinganku?idjudul='.$idj.'');
 			}else{
 				//redirect('Tempat/index');
 			}
 		}else{
 				$idj = $_POST['idjudul'];
  				$nrp = $this->session->userdata('username');		
				$tgl = date('Y-m-d');
				$ket = $_POST['keterangan'];
				$nip = $_POST['nip'];
				$acc = "Belum";
				$st = "TA";
				$simpandata = array(								
					'idjudul' => $idj,
					'nrp' => $nrp,
					'nip' => $nip,
					'acc' => $acc,
					'status' => $st,
					'tgl_bimbingan' => $tgl,
					'keterangan' => $ket
				);			
 				$res = $this->Mmahasiswa->Bimbingan('bimbingan',$simpandata);
 				redirect('halamansiswa/bimbinganta?idjudul='.$idj.'');
 		}
 	}


 	public function updatebimbingan($idb){
		$this->load->library('upload');
		$idj = $_POST['idjudul'];
        $nmfile = "file_".time();
        $config['upload_path'] = './assets/gambar/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '5048'; 
        $config['max_width']  = '2500';
        $config['max_height']  = '3400';
        $config['file_name'] = $nmfile; 
        $this->upload->initialize($config);        
        if($_FILES['dokumen']['name']){
        	if ($this->upload->do_upload('dokumen')){
  				$idb = $_POST['idb'];		
				$gbr = $this->upload->data();
				$ket = $_POST['keterangan'];
				$simpandata = array(								
					'bimbingan' => $gbr['file_name'],
					'keterangan' => $ket
				);
				$where = array('idb' => $idb);				
 				$res = $this->Mmahasiswa->UpdateBimbingan('bimbingan',$simpandata,$where);
 				redirect('halamansiswa/bimbinganku?idjudul='.$idj.'');
 			}else{
 				//redirect('Tempat/index');
 			}
 		}else{
 				$idb = $_POST['idb'];
				$ket = $_POST['keterangan'];
				$simpandata = array(								
					'keterangan' => $ket
				);			
 				$where = array('idb' => $idb);				
 				$res = $this->Mmahasiswa->UpdateBimbingan('bimbingan',$simpandata,$where);
 				redirect('halamansiswa/bimbinganku?idjudul='.$idj.'');
 		}
 	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */