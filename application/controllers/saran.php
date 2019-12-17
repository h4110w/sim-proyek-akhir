<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class saran extends CI_Controller {
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
		$data['judul'] = $this->Mjudul->Jud(" where status ='Saran'");
		$this->load->view('adminlte/judul/saran',array('data'=>$data));
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

	public function ajukanjudul(){
		$jdl = $_POST['judul'];
		$tgl = date('Y-m-d');
		$tahun = date('Y');
		$acc = null;		
		$st = "Saran";		
		$simpandata = array(								
			'judul' => $jdl,
			'tanggal_pengajuan' => $tgl,
			'tanggal_acc' => $acc,
			'tahun' => $tahun,
			'status' => $st
		);		
		$res = $this->Mmahasiswa->AjukanJudul('judul',$simpandata);
		redirect('saran');
 	}

 	public function hapus($idjudul){				
		$idjudul = $_GET['idjudul'];
		$where = array('idjudul' => $idjudul);
 		$res = $this->Mjudul->HapusJudul('judul',$where); 		
		redirect('saran');	 				 
	}
	public function update(){
        $idjd = $_POST['idjudul'];
        $jdl = $_POST['judul'];         
        $simpandata = array(                                
            'judul' => $jdl            
        );      
        $where = array('idjudul' => $idjd);         
        $res = $this->Mjudul->UpdateJudul('judul',$simpandata,$where);
        redirect('saran');
    }

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */