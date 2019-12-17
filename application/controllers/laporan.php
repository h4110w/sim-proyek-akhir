<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {
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
	
    public function laporan1(){
        $data['username'] = $this->session->userdata('username');
        $data['level'] = $this->session->userdata('level');
        $data['rek'] = $this->Madmin->GetSet();
        $data['dosen'] = $this->Madmin->GetDosen(" where u.username=d.nip and u.level='Dosen'");               
        $this->load->view('adminlte/laporan/laporan1',array('data'=>$data));
    }

    public function laporan2(){
        $data['ti'] = $this->Mjudul->GetJudul(' where jurusan="Teknik Informatika"');
        $data['mm'] = $this->Mjudul->GetJudul(' where jurusan="Multimedia"');        
        $data['masuk'] = $this->Mjudul->GetJ(" where status='Belum Disetujui'");
        $data['setuju'] = $this->Mjudul->GetJ(" where status='Disetujui'");
        $data['ambil'] = $this->Mjudul->GetJ(" where status='Diambil'");
        $data['tolak'] = $this->Mjudul->GetJ(" where status='Ditolak'");
        $this->load->view('adminlte/laporan/laporan2',array('data'=>$data));
    }
    
    public function grafik(){        
        $data['rek'] = $this->Madmin->GetSet();
        $data['Da'] = $this->Mjudul->Getgrafik();
        $this->load->view('adminlte/grafik',array('data'=>$data));
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */