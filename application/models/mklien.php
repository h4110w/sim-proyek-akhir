<?php
class mklien extends CI_Model {
 	
 	public function GetJudul($where="") {
 		$data = $this->db->query("
 			select
 			j.idjudul,
 			m.nrp,
 			m.nama_mahasiswa,
 			j.judul,
 			j.deskripsi,
 			j.dokumen,
 			j.status,
 			j.tanggal_pengajuan,
 			j.tanggal_acc, 			
 			(select d.namadosen from dosen as d where j.pembimbing1=d.nip) AS pembimbing1,
 			(select d.namadosen from dosen as d where j.pembimbing2=d.nip) AS pembimbing2
 			from mahasiswa as m, judul as j
 			".$where);
 		return $data->result_array();
 	}

 	public function GetStatus($where="") {
 		$data = $this->db->query("select * from judul".$where);
 		return $data->result_array();
 	}

 	public function DeadLine($where="") {
 		$data = $this->db->query('select * from deadline'.$where);
 		return $data->result_array();
 	}

 	public function UpdateDeadline($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}

 	public function KonfirmasiJudul($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}

 	public function Acc($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
 	
 	public function GetMahasiswa($where="") {
 		$data = $this->db->query('select * from mahasiswa'.$where);
 		return $data->result_array();
 	}

 	public function SimpanMahasiswa($tableName,$data){
 		$res = $this->db->insert($tableName,$data);
 		return $res;
 	}
 	public function SimpanUser($tableName,$data){
 		$res = $this->db->insert($tableName,$data);
 		return $res;
 	}

 	public function UpdateUser($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
	
	public function UpdateMahasiswa($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
 	
 	function GetDosen($sampai,$dari) {
 		$data = $this->db->get('dosen',$sampai,$dari);
 		return $data->result_array();
 	}

 	public function GetDetailDosen($where="") {
 		$data = $this->db->query('select
 			d.nip,
 			d.namadosen,
 			d.prodi,
 			d.alamat,
 			d.nomerhp,
 			u.username,
 			u.password
 			from dosen as d, user as u'.$where);
 		return $data->result_array();
 	}

 	function jumlah() {
 		$data = $this->db->get('dosen');
 		return $data->num_rows();
 	}

 	public function SimpanDosen($tableName,$data){
 		$res = $this->db->insert($tableName,$data);
 		return $res;
 	}
 	public function UpdateDosen($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
 	public function HapusDosen($tableName,$where){
 		$res = $this->db->delete($tableName,$where);
 		return $res;
 	}
 	public function HapusUser($tableName,$where){
 		$res = $this->db->delete($tableName,$where);
 		return $res;
 	}
 	public function HapusBimbingan($tableName,$where){
 		$res = $this->db->delete($tableName,$where);
 		return $res;
 	}
 	public function GetMhsPmbb($where="") { 		
 		$data = $this->db->query('select * from vmhsbimbingan'.$where);
 		return $data->result_array();
 	}
 	public function HapusMahasiswa($tableName,$where){
 		$res = $this->db->delete($tableName,$where);
 		return $res;
 	}
 	public function HapusJudul($tableName,$where){
 		$res1 = $this->db->delete($tableName,$where);
 		return $res1;
 	}

 	function jjud() {
 		$data = $this->db->get('vjudul');
 		return $data->num_rows();
 	}
 	function Getrek($sampai,$dari) {
 		$data = $this->db->get('vjudul',$sampai,$dari);
 		return $data->result_array();
 	}
 	public function GetRekomendasi($where="") {
 		$data = $this->db->query("
 			select
 			j.idjudul,
 			m.nrp,
 			m.nama_mahasiswa,
 			j.judul,
 			j.deskripsi,
 			j.dokumen,
 			j.status,
 			j.tanggal_pengajuan,
 			j.tanggal_acc, 			
 			(select d.namadosen from dosen as d where j.pembimbing1=d.nip) AS pembimbing1,
 			(select d.namadosen from dosen as d where j.pembimbing2=d.nip) AS pembimbing2
 			from mahasiswa as m, judul as j
 			".$where);
 		return $data->result_array();
 	}
  	 		
}