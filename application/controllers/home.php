<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
        	redirect('login');
        }else if($this->session->userdata('level')=="Dosen"){
        	redirect('Cdosen');
        }        
        $this->load->model('Madmin'); 
        $this->load->model('Mjudul');
        $this->load->helper(array('url'));                
    }

	public function index(){	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['judul'] = $this->Mjudul->GetJudul(" limit 5");
		$data['rek'] = $this->Madmin->GetSet();
		$data['masuk'] = $this->Mjudul->GetJ(" where status='Belum Disetujui'");
		$data['setuju'] = $this->Mjudul->GetJ(" where status='Disetujui'");
		$data['ambil'] = $this->Mjudul->GetJ(" where status='Diambil'");
		$data['tolak'] = $this->Mjudul->GetJ(" where status='Ditolak'");

		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('adminlte/index',array('data'=>$data));
	}
	public function konfirmasi($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = date('Y-m-d');		
		$updatedata = array(									
				'tanggal_acc' => $tanggal,
				'status' => 'Disetujui'			
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('home');
 		
 	}
 	public function accti($idjudul){
 		$idb = $_GET['idb'];
 		$idj = $_GET['idjudul'];
		$updatedata = array(									
				'acc' => 'Disetujui'			
		);
		$where = array('idb' => $idb);
 		$res = $this->Madmin->Acc('bimbingan',$updatedata,$where);
 		redirect('judul/dti?idjudul='.$idj.'');
 		
 	}
 	public function accmm($idjudul){
 		$idb = $_GET['idb'];
 		$idj = $_GET['idjudul'];
		$updatedata = array(									
				'acc' => 'Disetujui'			
		);
		$where = array('idb' => $idb);
 		$res = $this->Madmin->Acc('bimbingan',$updatedata,$where);
 		redirect('judul/dmm?idjudul='.$idj.'');
 		
 	}
 	public function tolak($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = date('Y-m-d');		
		$updatedata = array(									
				'tanggal_acc' => $tanggal,
				'status' => 'Ditolak'			
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('home');	
 	}

 	public function diambil($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = date('Y-m-d');		
		$updatedata = array(									
				'tanggal_acc' => $tanggal,
				'status' => 'Diambil'			
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('halamansiswa/ajukan');	
 	}

	public function gantideadline($iddeadline){
 		$iddeadline = $_GET['iddeadline'];
 		$awal = $_POST['awal'];		
 		$akhir = $_POST['akhir'];		
		$updatedata = array(									
				'dari' => $awal,
				'sampai' => $akhir				
		);
		$where = array('iddeadline' => $iddeadline);
 		$res = $this->Madmin->UpdateDeadline('deadline',$updatedata,$where);
 		redirect('home');
 		
 	}

 	public function batal($idjudul){
 		$idjudul = $_GET['idjudul'];
 		$tanggal = NULL;		
		$updatedata = array(									
				'tanggal_acc' => $tanggal,
				'status' => 'Belum Disetujui'				
		);
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->KonfirmasiJudul('judul',$updatedata,$where);
 		redirect('home');
 	} 	
 	public function monitoringti(){	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['judul'] = $this->Madmin->GetJudul(" where m.jurusan='Teknik Informatika' and m.nrp=j.username and status='Diambil'");
		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('adminlte/monitor/ti',array('data'=>$data));
	}
	public function monitoringmm(){	
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['judul'] = $this->Madmin->GetJudul(" where m.jurusan='Multimedia' and m.nrp=j.username and status='Diambil'");
		$data['deadline'] = $this->Madmin->DeadLine();
		$this->load->view('adminlte/monitor/mm',array('data'=>$data));
	}
	public function sembunyikan(){ 		
		$ids = 1;
		$updatedata = array(													
				'status' => 'sembunyikan'				
		);
		$where = array('idset' => $ids);
 		$res = $this->Madmin->UpdateSet('setting',$updatedata,$where);
 		redirect('home');
 	}
 	public function tampil(){ 		
		$ids = 1;
		$updatedata = array(													
				'status' => 'tampil'				
		);
		$where = array('idset' => $ids);
 		$res = $this->Madmin->UpdateSet('setting',$updatedata,$where);
 		redirect('home');
 	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */