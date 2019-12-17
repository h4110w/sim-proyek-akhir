<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen extends CI_Controller {
	public function __construct() {
        parent::__construct();
        if($this->session->userdata('username')==""){
          redirect('login');
        }else if($this->session->userdata('level')=="Mahasiswa"){
          redirect('login/logout');
        }else if($this->session->userdata('level')=="Dosen"){
          redirect('dosen');
        }       
        $this->load->model('Madmin'); 
        $this->load->helper(array('url'));           
    }

	public function index()
	{                  
      $data['username'] = $this->session->userdata('username');
      $data['level'] = $this->session->userdata('level');           
      $data['rek'] = $this->Madmin->GetSet();
      $data['dosen'] = $this->Madmin->Getdosen(" where u.username=d.nip and u.level='Dosen'");
      $this->load->view('adminlte/dosen/dosen',array('data'=>$data));
	}
	
	public function simpandosen(){				
		$nip = $_POST['nip'];
		$nm = $_POST['nama'];
        $pas = $_POST['pass'];
		$prodi = $_POST['prodi'];		
		$kontak = $_POST['kontak'];
		$alamat = $_POST['alamat'];		
		$simpandata = array(							
				'nip' => $nip,
				'namadosen' => $nm,
				'prodi' => $prodi,				
				'alamat' => $alamat,
				'nomerhp' => $kontak
				);
    $simpandataa = array(             
        'username' => $nip,
        'password' => $pas,
        'level' => 'Dosen'
        );
		$res = $this->Madmin->SimpanDosen('dosen',$simpandata);
    $res = $this->Madmin->SimpanUser('user',$simpandataa);
		redirect('dosen');	 				 
	 }

  public function edtdosen($nip){           
    $nipp = $_GET['nipp'];
    $nip = $_POST['nip'];
    $nm = $_POST['nama'];
    $pas = $_POST['pass'];
    $prodi = $_POST['prodi'];   
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];   
    $updatedata = array(              
        'nip' => $nip,
        'namadosen' => $nm,
        'prodi' => $prodi,        
        'alamat' => $alamat,
        'nomerhp' => $kontak
        );
    $where = array('nip' => $nipp);
    $updatedataa = array(              
        'username' => $nip,
        'password' => $pas,
        'level' => 'Dosen'
        );
    $wheree = array('username' => $nipp);
    $res = $this->Madmin->UpdateDosen('dosen',$updatedata,$where);
    $res = $this->Madmin->UpdateUser('user',$updatedataa,$wheree);
    redirect('dosen');           
   }

	public function detail($nip)
	{		
		 //hitung jumlah row
    $data['username'] = $this->session->userdata('username');
    $data['level'] = $this->session->userdata('level');
    $data['rek'] = $this->Madmin->GetSet();
 	$data['mbti1'] = $this->Madmin->GetMhsPmbb(" where status='Diambil' and jurusan='Teknik Informatika' and p1='$nip'");
    $data['mbti2'] = $this->Madmin->GetMhsPmbb(" where status='Diambil' and jurusan='Teknik Informatika' and p2='$nip'");
    $data['mbmm1'] = $this->Madmin->GetMhsPmbb(" where status='Diambil' and jurusan='Multimedia' and p1='$nip'");
    $data['mbmm2'] = $this->Madmin->GetMhsPmbb(" where status='Diambil' and jurusan='Multimedia' and p2='$nip'");
 		$data['dosen'] = $this->Madmin->GetDosen(" where u.username=d.nip and u.level='Dosen' and d.nip='$nip'");		
		$this->load->view('adminlte/dosen/ddosen',array('data'=>$data));
	}

	public function hapusdosen($nip){				
		$nip = $_GET['nip'];
		$where = array('nip' => $nip);
        $where1 = array('username' => $nip);
 		$res = $this->Madmin->HapusDosen('dosen',$where);
        $res = $this->Madmin->HapusUser('user',$where1); 		
		redirect('dosen');	 				 
	 }	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */