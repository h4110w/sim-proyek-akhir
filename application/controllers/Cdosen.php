<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cdosen extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
        	redirect('login');
        }        
        $this->load->model('Madmin'); 
        $this->load->model('Mjudul');
        $this->load->model('Magenda'); 
        $this->load->model('Mmahasiswa');
        $this->load->helper(array('url'));                
    }

	public function index(){	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
	    $data['rek'] = $this->Madmin->GetSet();			
	    $data['agenda'] = $this->Magenda->Agenda();           
		$data['masuk'] = $this->Mjudul->GetJ(" where status='Belum Disetujui'");
		$data['setuju'] = $this->Mjudul->GetJ(" where status='Disetujui'");
		$data['ambil'] = $this->Mjudul->GetJ(" where status='Diambil'");
		$data['tolak'] = $this->Mjudul->GetJ(" where status='Ditolak'");
		$this->load->view('dosen/index',array('data'=>$data));
	}
	
 	public function accti($idjudul){
 		$idb = $_GET['idb'];
 		$idj = $_GET['idjudul'];
		$updatedata = array(									
				'acc' => 'Disetujui'			
		);
		$where = array('idb' => $idb);
 		$res = $this->Madmin->Acc('bimbingan',$updatedata,$where);
 		redirect('cdosen/dti?idjudul='.$idj.'');
 		
 	}
 	public function accmm($idjudul){
 		$idb = $_GET['idb'];
 		$idj = $_GET['idjudul'];
		$updatedata = array(									
				'acc' => 'Disetujui'			
		);
		$where = array('idb' => $idb);
 		$res = $this->Madmin->Acc('bimbingan',$updatedata,$where);
 		redirect('cdosen/dmm?idjudul='.$idj.'');
 		
 	}
 	
 	public function monitoringti(){	
		$usr = $data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['judul'] = $this->Mjudul->GetJudul(" where jurusan='Teknik Informatika' and status='Diambil'");		
		$data['judul1'] = $this->Mjudul->GetJudul(" where p1='$usr' and jurusan='Teknik Informatika' and status='Diambil'");		
		$data['judul2'] = $this->Mjudul->GetJudul(" where p2='$usr' and jurusan='Teknik Informatika' and status='Diambil'");		
		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('dosen/monitor/ti',array('data'=>$data));
	}
	
	public function monitoringmm(){	
		$usr = $data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['judul'] = $this->Mjudul->GetJudul(" where jurusan='Multimedia' and status='Diambil'");		
		$data['judul1'] = $this->Mjudul->GetJudul(" where p1='$usr' and jurusan='Multimedia' and status='Diambil'");		
		$data['judul2'] = $this->Mjudul->GetJudul(" where p2='$usr' and jurusan='Multimedia' and status='Diambil'");		
		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('dosen/monitor/mm',array('data'=>$data));
	}	
	public function dti(){
        $idjd = $_GET['idjudul'];   
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['rek'] = $this->Madmin->GetSet();
        $data['judul'] = $this->Madmin->GetJudul(" where m.nrp=j.username and j.status='Diambil' and j.idjudul='$idjd'");
        $data['deadline'] = $this->Madmin->DeadLine();
        $data['btppa'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd and b.status='Proposal'");
        $data['bta'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd and b.status='TA'");
        $data['bim'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd order by b.tgl_bimbingan");
        $this->load->view('dosen/monitor/dti',array('data'=>$data));
    }
  	
  	public function dmm(){
        $idjd = $_GET['idjudul'];   
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['judul'] = $this->Madmin->GetJudul(" where m.nrp=j.username and j.status='Diambil' and j.idjudul='$idjd'");
        $data['deadline'] = $this->Madmin->DeadLine();
        $data['rek'] = $this->Madmin->GetSet();
        $data['btppa'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd and b.status='Proposal'");
        $data['bta'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd and b.status='TA'");
        $data['bim'] = $this->Mmahasiswa->GetBimbingan(" where d.nip=b.nip and b.idjudul=$idjd order by b.tgl_bimbingan");
        $this->load->view('dosen/monitor/dmm',array('data'=>$data));
    }
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */