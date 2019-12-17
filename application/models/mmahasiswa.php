<?php
class mmahasiswa extends CI_Model { 	
 	public function GetMahasiswa($where="") {
 		$data = $this->db->query('select * from mahasiswa'.$where);
 		return $data->result_array();
 	}

 	public function GetJudul($where="") {
 		$data = $this->db->query("
 			select
 			j.idjudul,
 			m.nrp,
 			j.username,
 			m.nama_mahasiswa,
 			j.judul,
 			j.status,
 			j.deskripsi,
 			j.komentar,
 			j.dokumen,
 			j.pembimbing1 as nip1,
 			j.pembimbing2 as nip2,
 			j.tanggal_pengajuan,
 			j.tanggal_acc, 			
 			(select d.namadosen from dosen as d where j.pembimbing1=d.nip) AS pembimbing1,
 			(select d.namadosen from dosen as d where j.pembimbing2=d.nip) AS pembimbing2
 			from mahasiswa as m, judul as j
 			".$where);
 		return $data->result_array();
 	}

 	public function GetDosen($where="") {
 		$data = $this->db->query('select * from dosen'.$where);
 		return $data->result_array();
 	}

 	public function Gj($where="") {
 		$data = $this->db->query('select count(idjudul) as jumlah from judul'.$where);
 		return $data->result_array();
 	}

 	public function GetBimbingan($where="") {
 		$data = $this->db->query('select 
 			b.idb,
 			b.idjudul,
 			b.nrp,
 			b.bimbingan,
 			b.nip,
 			d.namadosen,
 			b.acc,
 			b.status,
 			b.tgl_bimbingan,
 			b.keterangan
 			from bimbingan as b, dosen as d'.$where);
 		return $data->result_array();
 	}

 	public function GetBimbinganLimit($where="") {
 		$data = $this->db->query('select count(idb) as bim from bimbingan'.$where);
 		return $data->result_array();
 	}

 	public function AjukanJudul($tableName,$data){
 		$res = $this->db->insert($tableName,$data);
 		return $res;
 	}

 	public function Bimbingan($tableName,$data){
 		$res = $this->db->insert($tableName,$data);
 		return $res;
 	}

 	public function UpdateBimbingan($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}

	public function UpdateJudul($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
 	
 	public function HapusJudul($tableName,$where){
 		$res1 = $this->db->delete($tableName,$where);
 		return $res1;
 	}
  	 		
}