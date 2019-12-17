<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cagenda extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
        	redirect('login');
        }      
        $this->load->model('Magenda'); 
        $this->load->model('Madmin'); 
        $this->load->helper(array('url'));
        $this->load->library('pagination');                  
    }

	public function index(){
		   $data['rek'] = $this->Madmin->GetSet();			
		   $data['username'] = $this->session->userdata('username');
		   $data['level'] = $this->session->userdata('level');
           $data['agenda'] = $this->Magenda->Agenda();           
     	   $this->load->view('adminlte/agenda',array('data'=>$data));
	}

	public function simpanagenda(){							
			$nm = $_POST['namaagenda'];
			$tgl = $_POST['tglagenda'];		
			$ket = $_POST['keterangan'];			
			$simpandata = array(								
					'nama_agenda' => $nm,				
					'tgl_agenda' => $tgl,
					'keterangan' => $ket
					);
			$res = $this->Magenda->SimpanAgenda('agenda',$simpandata);
			redirect('Cagenda');	 				 
	}

	public function hapusagenda($idag){				
			$idag = $_GET['idag'];
			$where = array('idagenda' => $idag);
	 		$res = $this->Magenda->HapusAgenda('agenda',$where); 
			redirect('Cagenda');	 				 
	}

	public function updateagenda($idag){							
			$idag = $_GET['idag'];
			$nm = $_POST['namaagenda'];
			$tgl = $_POST['tglagenda'];		
			$ket = $_POST['keterangan'];			
			$updatedata = array(								
					'nama_agenda' => $nm,				
					'tgl_agenda' => $tgl,
					'keterangan' => $ket
					);
			$where = array('idagenda' => $idag);
			$res = $this->Magenda->UpdateAgenda('agenda',$updatedata,$where);
			redirect('Cagenda');	 				 
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */