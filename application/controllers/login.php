<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('Magenda'); 
        $this->load->helper(array('url'));
        $this->load->library('pagination');                  
    }
	public function index()
	{
		       $jumlah= $this->Magenda->jumlah(); 
            //inisialisasi array
           $config = array();
            //set base_url untuk setiap link page
           $config['base_url'] = base_url().'index.php/login/index/';
            //hitung jumlah row
           $config['total_rows'] = $jumlah; 
           //mengatur total data yang tampil per page
           $config['per_page'] = 1; 
           //mengatur jumlah nomor page yang tampil
           $config['num_links'] = $jumlah; 
           //mengatur tag
           $config['num_tag_open'] = '<li>';
           $config['num_tag_close'] = '</li>';
           $config['next_tag_open'] = "<li>";
           $config['next_tagl_close'] = "</li>";
           $config['prev_tag_open'] = "<li>";
           $config['prev_tagl_close'] = "</li>";
           $config['first_tag_open'] = "<li>";
           $config['first_tagl_close'] = "</li>";
           $config['last_tag_open'] = "<li>";
           $config['last_tagl_close'] = "</li>";
           $config['cur_tag_open'] = '&nbsp;<a class="current">';
           $config['cur_tag_close'] = '</a>';
           $config['next_link'] = 'Next';
           $config['prev_link'] = 'Previous'; 
           //inisialisasi array 'config' dan set ke pagination library
           $this->pagination->initialize($config);    
           $dari = $this->uri->segment('3');
           //inisialisasi array
           $data = array();
            //ambil data buku dari database
           $data['username'] = $this->session->userdata('username');
		       $data['level'] = $this->session->userdata('level');
           $data['agenda'] = $this->Magenda->GetAgenda($config['per_page'],$dari);           
           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('login/login',array('data'=>$data));
	}
	public function cek_login() {
		$data = array(
			'username' => $this->input->post('username', TRUE),
			'password' => $this->input->post('password', TRUE)
			);
		$this->load->model('Mlogin'); // load model_user
		$hasil = $this->Mlogin->cek_user($data);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['logged_in'] = 'Sudah Loggin';
				$sess_data['iduser'] = $sess->iduser;
				$sess_data['username'] = $sess->username;
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='Admin') {
				redirect('home');
			}    
      elseif ($this->session->userdata('level')=='Dosen') {
        redirect('Cdosen');
      }
			elseif ($this->session->userdata('level')=='Mahasiswa') {
				redirect('halamansiswa');
			}		
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}		
	}
	public function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('level');
		session_destroy();
		redirect('login');
	}

}
