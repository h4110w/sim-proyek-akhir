<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswaq extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')==""){
        	redirect('login');
        }else if($this->session->userdata('level')=="Mahasiswa"){
        	redirect('halamansiswa');
        }else if($this->session->userdata('level')=="Admin"){
        	redirect('home');
        }
        $this->load->model('Madmin'); 
        $this->load->helper(array('url'));                
    }

	public function index()
	{
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['mahasiswa'] = $this->Madmin->GetMahasiswa();		
		$this->load->view('adminlte/mahasiwa/mahasiswa',array('data'=>$data));
	}
	
	public function simpanmhs(){				
		$nrp = $_POST['nrp'];
		$nm = $_POST['nama'];
		$jk = $_POST['jk'];
		$tmpt = $_POST['tempat'];
		$tgl = $_POST['tgllahir'];
		$kontak = $_POST['kontak'];
		$alamat = $_POST['alamat'];		
		$simpandata = array(							
				'nrp' => $nrp,
				'nama_mahasiswa' => $nm,
				'jk' => $jk,
				'tempat_lahir' => $tmpt,
				'tgl_lahir' => $tgl,
				'alamat' => $alamat,
				'no_hp' => $kontak
				);
		$simpandataa = array(							
				'username' => $nrp,
				'password' => $nrp,
				'level' => 'Mahasiswa'
				);
		$res = $this->Madmin->SimpanMahasiswa('mahasiswa',$simpandata);
		$res = $this->Madmin->SimpanUser('user',$simpandataa);
		redirect('mahasiswa');	 				 
	 }

	 public function editmhs($nrp){				
		$gnrp = $_GET['nrp'];
		$nrp = $_POST['nrp'];
		$nm = $_POST['nama'];
		$jk = $_POST['jk'];
		$tmpt = $_POST['tempat'];
		$tgl = $_POST['tgllahir'];
		$kontak = $_POST['kontak'];
		$alamat = $_POST['alamat'];		
		$updatedata = array(							
				'nrp' => $nrp,
				'nama_mahasiswa' => $nm,
				'jk' => $jk,
				'tempat_lahir' => $tmpt,
				'tgl_lahir' => $tgl,
				'alamat' => $alamat,
				'no_hp' => $kontak
				);
		$where = array('nrp' => $gnrp);
		$res = $this->Madmin->UpdateMahasiswa('mahasiswa',$updatedata,$where);
		redirect('mahasiswa');	 				 
	 }	
	 public function hapusmahasiswa($nip){				
		$nrp = $_GET['nrp'];
		$where = array('nrp' => $nrp);				
 		$res = $this->Madmin->HapusMahasiswa('mahasiswa',$where); 		
 		$where = array('username' => $nrp);
 		$res = $this->Madmin->HapusJudul('judul',$where); 		
		redirect('mahasiswa');	 				 
	 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */