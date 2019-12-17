<?php
class Mjudul extends CI_Model {

public function Jud($where="") {
 		$data = $this->db->query("select * from judul".$where);
 		return $data->result_array();
 	}

public function GetJudul($where="") {
 		$data = $this->db->query("select * from vjudul".$where);
 		return $data->result_array();
 	}

public function GetJ($where="") {
 		$data = $this->db->query("select count(idjudul) as jum from vjudul".$where);
 		return $data->result_array();
 	}

public function HapusJudul($tableName,$where){
 		$res1 = $this->db->delete($tableName,$where);
 		return $res1;
 	}
public function UpdateJudul($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
public function Getgrafik($where="") {
 		$data = $this->db->query("
 			select d.namadosen,
			(select count(j.pembimbing1) from judul as j where d.nip=j.pembimbing1 and j.status='Diambil') as p1,
			(select count(j.pembimbing2) from judul as j where d.nip=j.pembimbing2 and j.status='Diambil') as p2
			from dosen as d".$where);
 		return $data->result_array();
 	}
 	
}
  	 		