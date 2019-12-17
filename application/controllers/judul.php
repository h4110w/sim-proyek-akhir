<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Judul extends CI_Controller {
	public function __construct() {
        parent::__construct();
         if($this->session->userdata('username')==""){
          redirect('login');
        }else if($this->session->userdata('level')=="Dosen"){
          redirect('home');
        }     
        $this->load->model('Madmin'); 
        $this->load->model('Mjudul');
        $this->load->model('Mmahasiswa');
        $this->load->helper(array('url'));   
    }

	public function index()
	{                             
    $data['username'] = $this->session->userdata('username');
    $data['level'] = $this->session->userdata('level');
    $data['judul'] = $this->Mjudul->GetJudul();
    $data['rek'] = $this->Madmin->GetSet();
    $data['dosen'] = $this->Madmin->Getdosen(" where u.username=d.nip and u.level='Dosen'");
    $data['deadline'] = $this->Madmin->DeadLine();
    $this->load->view('adminlte/judul/sjudul',array('data'=>$data));
	}	

  public function batal($idjudul){
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
    redirect('judul');
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
        $this->load->view('adminlte/monitor/dti',array('data'=>$data));
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
        $this->load->view('adminlte/monitor/dmm',array('data'=>$data));
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
        redirect('judul');
    }

    public function accti($idjudul){
        $idj = $_POST['idjudul'];
        $st = $_POST['status'];
        $updatedata = array(                                    
                'acc' => 'Disetujui'            
        );
        $where = array('idjudul' => $idj, 'status' => $st);
        $res = $this->Madmin->Acc('bimbingan',$updatedata,$where);
        redirect('judul/dti?idjudul='.$idj.'');
        
    }

    public function accmm($idjudul){        
        $idj = $_POST['idjudul'];
        $st = $_POST['status'];
        $updatedata = array(                                    
                'acc' => 'Disetujui'            
        );
        $where = array('idjudul' => $idj, 'status' => $st);
        $res = $this->Madmin->Acc('bimbingan',$updatedata,$where);
        redirect('judul/dmm?idjudul='.$idj.'');
        
    }
   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */