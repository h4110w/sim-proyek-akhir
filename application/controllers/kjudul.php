<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kjudul extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
        	redirect('login');
        }else if($this->session->userdata('level')=="admin"){
        	redirect('home');
        }     
        $this->load->model('Madmin'); 
        $this->load->model('Mjudul');
        $this->load->model('Mmahasiswa');
        $this->load->helper(array('url'));                
    }

	public function index(){	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['judul'] = $this->Mjudul->GetJudul(" Where status is NULL or status='Belum Disetujui' or status='Disetujui'");
		$data['dosen'] = $this->Madmin->Getdosen(" where u.username=d.nip and u.level='Dosen'");
		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('adminlte/judul/konfirmasi',array('data'=>$data));
	}
	public function kkonfirmasi($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = date('Y-m-d');		
 		$komen = NULL;
		$updatedata = array(									
				'komentar' => $komen,
				'tanggal_acc' => $tanggal,
				'status' => 'Disetujui'			
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('kjudul');
 		
 	}

 	public function ktolak($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = date('Y-m-d');		
 		$komen = NULL;
		$updatedata = array(		
				'komentar' => $komen,							
				'tanggal_acc' => $tanggal,
				'status' => 'Ditolak'			
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('kjudul');	
 	}

 	public function kbatal($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = NULL;		
 		$komen = NULL;		
		$updatedata = array(									
				'komentar' => $komen,
				'tanggal_acc' => $tanggal,
				'status' => 'Belum Disetujui'				
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('kjudul');
 	}
 	public function updatejudul(){
 		$idjd = $_POST['idjudul'];
 		$jdl = $_POST['judul'];  		
		$dospem1 = $_POST['dospem1'];
		$dospem2 = $_POST['dospem2'];
		$stts = 'Disetujui';
		$tanggal = date('Y-m-d');
		$simpandata = array(								
			'judul' => $jdl,
			'tanggal_acc' => $tanggal,			
			'pembimbing1' => $dospem1,
			'pembimbing2' => $dospem2,
			'status' => $stts
		);		
		$where = array('idjudul' => $idjd);			
		$res = $this->Mmahasiswa->UpdateJudul('judul',$simpandata,$where);
		redirect('kjudul');
 	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */