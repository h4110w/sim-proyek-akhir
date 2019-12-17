<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Halamandosen extends CI_Controller {
	public function __construct() {
        parent::__construct();      
        $this->load->model('Mmahasiswa'); 
        $this->load->model('Magenda'); 
        $this->load->model('Madmin'); 
        $this->load->helper(array('url'));
        $this->load->library(array('ckeditor'));
        $this->load->library('pagination');                 
    }

	public function index(){
        	$jumlah= $this->Magenda->jumlah(); 
            //inisialisasi array
           $config = array();
            //set base_url untuk setiap link page
           $config['base_url'] = base_url().'index.php/halamansiswa/index/';
            //hitung jumlah row
           $config['total_rows'] = $jumlah; 
           //mengatur total data yang tampil per page
           $config['per_page'] = 3; 
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
           $data['agenda'] = $this->Magenda->GetAgenda($config['per_page'],$dari);           
           //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
    		   $data['username'] = $this->session->userdata('username');
    		   $nrp = $this->session->userdata('username');
    		   $data['deadline'] = $this->Madmin->DeadLine();
    		   $data['detail'] = $this->Mmahasiswa->GetMahasiswa(" where nrp=$nrp");
    		   $data['judul'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp");
           $data['jdp'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp and j.status='Diambil'");	
		   $this->load->view('mahasiswa/index',array('data'=>$data));
	}
	
	public function ajukan(){
	    $width = '100%';
    	$height = '100px';
      $this->editor($width,$height);
		  $data['username'] = $this->session->userdata('username');
		  $nrp = $this->session->userdata('username');
		  $data['dosen'] = $this->Mmahasiswa->GetDosen();
	    $data['detail'] = $this->Mmahasiswa->GetMahasiswa(" where nrp=$nrp");
      $data['judul'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp");
      $data['deadline'] = $this->Madmin->DeadLine();
      $data['jdp'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp and j.status='Diambil'");  
		   $this->load->view('mahasiswa/ajukan',array('data'=>$data));
	}
  public function bimbinganku(){
      $data['username'] = $this->session->userdata('username');
      $nrp = $this->session->userdata('username');
      $data['detail'] = $this->Mmahasiswa->GetMahasiswa(" where nrp=$nrp");
      $data['jdp'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp and j.status='Diambil'");
      $data['bimbingan'] = $this->Mmahasiswa->GetBimbingan(" where nrp=$nrp order by tgl_bimbingan");
      $data['bimbing'] = $this->Mmahasiswa->GetBimbinganLimit(" where nrp=$nrp");
      $data['deadline'] = $this->Madmin->DeadLine();
      $this->load->view('mahasiswa/bimbinganku',array('data'=>$data));
  }
	public function editajuan(){
	    $width = '100%';
    	$height = '100px';
      $this->editor($width,$height);
      $idj = $_GET['idjudul'];
		  $data['username'] = $this->session->userdata('username');
		  $nrp = $this->session->userdata('username');
		  $data['detail'] = $this->Mmahasiswa->GetMahasiswa(" where nrp=$nrp");
		  $data['dosen'] = $this->Mmahasiswa->GetDosen();
		  $data['judul'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp and j.idjudul=$idj");
      $data['jdp'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp and j.status='Diambil'");   
      $data['deadline'] = $this->Madmin->DeadLine();
		  $this->load->view('mahasiswa/editajuan',array('data'=>$data));
	}
	function editor($width,$height) {
		    //configure base path of ckeditor folder
		    $this->ckeditor->basePath = base_url().'plugins/ckeditor/';
		    $this->ckeditor-> config['toolbar'] = 'Full';
		    $this->ckeditor-> config['language'] = 'en';
		    $this->ckeditor-> config['width'] = $width;
		    $this->ckeditor-> config['height'] = $height;
	}
	public function ajukanjudul(){
		$this->load->library('upload');
        $nmfile = "file_".time();
        $config['upload_path'] = './assets/dokumen/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5048'; 
        $config['max_width']  = '2400';
        $config['max_height']  = '2400';
        $config['file_name'] = $nmfile; 
        $this->upload->initialize($config);        
        if($_FILES['dokumen']['name']){
        	if ($this->upload->do_upload('dokumen')){
  				$jdl = $_POST['judul'];
  				$nrp = $this->session->userdata('username');		
				$des = $_POST['deskripsi'];
				$gbr = $this->upload->data();
				$tgl = date('Y-m-d');
				$tahun = date('Y');
				$acc = null;
				$dospem1 = $_POST['dospem1'];
				$dospem2 = $_POST['dospem2'];
				$simpandata = array(								
					'judul' => $jdl,
					'username' => $nrp,
					'deskripsi' => $des,
					'dokumen' => $gbr['file_name'],
					'tanggal_pengajuan' => $tgl,
					'tanggal_acc' => $acc,
					'tahun' => $tahun,
					'pembimbing1' => $dospem1,
					'pembimbing2' => $dospem2
				);			
 				$res = $this->Mmahasiswa->AjukanJudul('judul',$simpandata);
 				redirect('halamansiswa/ajukan');
 			}else{
 				//redirect('Tempat/index');
 			}
 		}else{
 				$jdl = $_POST['judul'];
  			$nrp = $this->session->userdata('username');		
				$des = $_POST['deskripsi'];
				$gbr = $this->upload->data();
				$tgl = date('Y-m-d');
				$tahun = date('Y');
				$acc = null;
				$dospem1 = $_POST['dospem1'];
				$dospem2 = $_POST['dospem2'];
				$simpandata = array(								
					'judul' => $jdl,
					'username' => $nrp,
					'deskripsi' => $des,
					'dokumen' => null,
					'tanggal_pengajuan' => $tgl,
					'tanggal_acc' => $acc,
					'tahun' => $tahun,
					'pembimbing1' => $dospem1,
					'pembimbing2' => $dospem2
				);		
 				$res = $this->Mmahasiswa->AjukanJudul('judul',$simpandata);
 				redirect('halamansiswa/ajukan');
 		}
 	}
 	public function dosen(){                  
            //hitung jumlah row
           $jumlah= $this->Madmin->jumlah(); 
            //inisialisasi array
           $config = array();
            //set base_url untuk setiap link page
           $config['base_url'] = base_url().'index.php/halamansiswa/dosen/';
            //hitung jumlah row
           $config['total_rows'] = $jumlah; 
           //mengatur total data yang tampil per page
           $config['per_page'] = 10; 
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
           //$data = array();
            //ambil data buku dari database
           $data['dosen'] = $this->Madmin->GetDosen($config['per_page'],$dari);
           $data['username'] = $this->session->userdata('username');
    		   $nrp = $this->session->userdata('username');
    		   $data['deadline'] = $this->Madmin->DeadLine();
    		   $data['detail'] = $this->Mmahasiswa->GetMahasiswa(" where nrp=$nrp");          
           $data['judul'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp");
           $data['jdp'] = $this->Mmahasiswa->GetJudul(" where j.username=m.nrp and j.username=$nrp and j.status='Diambil'");  
          $data['deadline'] = $this->Madmin->DeadLine();
               //Membuat link
           $str_links = $this->pagination->create_links();
           $data["links"] = explode('&nbsp;',$str_links );
           $this->load->view('mahasiswa/dosen',array('data'=>$data));
	}
	public function hapusajuan($idjudul){				
		$idjudul = $_GET['idjudul'];
		$where = array('idjudul' => $idjudul);
 		$res = $this->Madmin->HapusJudul('judul',$where); 		
		redirect('halamansiswa/ajukan');	 				 
	 }

	 public function updatejudul($idjudul){
		$this->load->library('upload');
        $nmfile = "file_".time();
        $config['upload_path'] = './assets/dokumen/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '5048'; 
        $config['max_width']  = '2400';
        $config['max_height']  = '2400';
        $config['file_name'] = $nmfile; 
        $this->upload->initialize($config);        
        if($_FILES['dokumen']['name']){
        	if ($this->upload->do_upload('dokumen')){
  				$idjd = $_POST['idjudul'];
  				$jdl = $_POST['judul'];		
				$des = $_POST['deskripsi'];
				$gbr = $this->upload->data();
				$dospem1 = $_POST['dospem1'];
				$dospem2 = $_POST['dospem2'];
				$simpandata = array(								
					'judul' => $jdl,
					'deskripsi' => $des,
					'dokumen' => $gbr['file_name'],
					'pembimbing1' => $dospem1,
					'pembimbing2' => $dospem2
				);
				$where = array('idjudul' => $idjd);			
 				$res = $this->Mmahasiswa->UpdateJudul('judul',$simpandata,$where);
 				redirect('halamansiswa/ajukan');
 			}else{
 				//redirect('Tempat/index');
 			}
 		}else{
 				$idjd = $_POST['idjudul'];
 				$jdl = $_POST['judul'];
  				$des = $_POST['deskripsi'];
				$gbr = $this->upload->data();
				$dospem1 = $_POST['dospem1'];
				$dospem2 = $_POST['dospem2'];
				$simpandata = array(								
					'judul' => $jdl,
					'deskripsi' => $des,
					'pembimbing1' => $dospem1,
					'pembimbing2' => $dospem2
				);		
 				$where = array('idjudul' => $idjd);			
 				$res = $this->Mmahasiswa->UpdateJudul('judul',$simpandata,$where);
 				redirect('halamansiswa/ajukan');
 		}
 	}	
}
