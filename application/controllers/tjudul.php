<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tjudul extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
        	redirect('login');
        }else if($this->session->userdata('level')=="mahasiswa"){
        	redirect('halamansiswa');
        }else if($this->session->userdata('level')=="admin"){
        	redirect('home');
        }     
        $this->load->model('Madmin'); 
        $this->load->model('Mjudul');
        $this->load->helper(array('url'));                
    }

	public function index(){	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['judul'] = $this->Mjudul->GetJudul(" Where status is NULL or status='Belum Disetujui' or status='Ditolak'");
		$data['masuk'] = $this->Mjudul->GetJ(" where status='Belum Disetujui'");
		$data['setuju'] = $this->Mjudul->GetJ(" where status='Disetujui'");
		$data['ambil'] = $this->Mjudul->GetJ(" where status='Diambil'");
		$data['tolak'] = $this->Mjudul->GetJ(" where status='Ditolak'");

		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('adminlte/judul/tolak',array('data'=>$data));
	}

 	public function ktolak($idjudul){
 		$idjudul = $_POST['idjudul'];
 		$tanggal = date('Y-m-d');
 		$komen = $_POST['komentar'];		
		$updatedata = array(									
				'tanggal_acc' => $tanggal,
				'komentar' => $komen,
				'status' => 'Ditolak'			
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('tjudul');	
 	}

 	public function kbatal($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = NULL;		
 		$komen = NULL;
		$updatedata = array(									
				'tanggal_acc' => $tanggal,
				'komentar' => $komen,
				'status' => 'Belum Disetujui'				
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('tjudul');
 	} 	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */