<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')==""){
        	redirect('login');
        }else if($this->session->userdata('level')=="Mahasiswa"){
        	redirect('halamansiswa');
        } 
        $this->load->model('Madmin'); 
        $this->load->model('Mmahasiswa'); 
        $this->load->helper(array('url'));                
    }

	public function ti()
	{
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');
		$data['rek'] = $this->Madmin->GetSet();
		$data['mahasiswa'] = $this->Madmin->GetMahasiswa(" Where jurusan = 'Teknik Informatika'");		
		$this->load->view('adminlte/mahasiswa/mahasiswa',array('data'=>$data));
	}

	public function mm()
	{
		$data['username'] = $this->session->userdata('username');
		$data['level'] = $this->session->userdata('level');		
		$data['rek'] = $this->Madmin->GetSet();
		$data['mahasiswa'] = $this->Madmin->GetMahasiswa(" Where jurusan = 'Multimedia'");		
		$this->load->view('adminlte/mahasiswa/mahasiswamm',array('data'=>$data));
	}
	
	public function simpanmhs(){				
		$nrp = $_POST['nrp'];
		$nm = $_POST['nama'];
		$jk = $_POST['jk'];
		$jur = $_POST['jurusan'];
		$tmpt = $_POST['tempat'];
		$tgl = $_POST['tgllahir'];
		$kontak = $_POST['kontak'];
		$alamat = $_POST['alamat'];		
		$simpandata = array(							
				'nrp' => $nrp,
				'nama_mahasiswa' => $nm,
				'jurusan' => $jur,
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
		if($jur == "Teknik Informatika"){
			redirect('mahasiswa/ti');
		}else if($jur == "Multimedia"){
			redirect('mahasiswa/mm');
		}	 				 
		
	 }

	 public function editmhs($nrp){				
		$gnrp = $_GET['nrp'];
		$nrp = $_POST['nrp'];
		$jur = $_POST['jurusan'];
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
		$updatedata2 = array(							
				'nrp' => $nrp,
		);
		$res = $this->Mmahasiswa->UpdateBimbingan('bimbingan',$updatedata2,$where);
		$updatedataa = array(              
        'username' => $nrp,
        'password' => $nrp
        );
        $wheree = array('username' => $gnrp);
        $res = $this->Madmin->UpdateUser('user',$updatedataa,$wheree);        
		if($jur == "Teknik Informatika"){
			redirect('mahasiswa/ti');
		}else if($jur == "Multimedia"){
			redirect('mahasiswa/mm');
		}	 				 	 				 
	 }

	 public function hapusmahasiswa($nip){				
		$nrp = $_GET['nrp'];
		$j = $_GET['jurusan'];
		$where = array('nrp' => $nrp);				
 		$res = $this->Madmin->HapusMahasiswa('mahasiswa',$where); 		
 		$wheree = array('username' => $nrp);
 		$res = $this->Madmin->HapusJudul('judul',$wheree);
 		$res = $this->Madmin->HapusUser('user',$wheree); 
 		$res = $this->Madmin->HapusBimbingan('bimbingan',$where); 			
		if($j == "ti"){
			redirect('mahasiswa/ti');
		}else if($j == "mm"){
			redirect('mahasiswa/mm');
		}
	 }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */