<?php
class magenda extends CI_Model {
 	
 	function GetAgenda($sampai,$dari) {
 		$this->db->select('*');
 		$this->db->from('agenda');
 		$this->db->order_by('idagenda','desc');
 		$this->db->limit($sampai,$dari);
 		$data = $this->db->get();
 		return $data->result_array();
 	}
 	
 	function jumlah() {
 		$data = $this->db->get('agenda');
 		return $data->num_rows();
 	}

 	public function Agenda($where="") {
 		$data = $this->db->query("select * from agenda".$where);
 		return $data->result_array();
 	}

 	public function SimpanAgenda($tableName,$data){
 		$res = $this->db->insert($tableName,$data);
 		return $res;
 	}
	
	public function UpdateAgenda($tableName,$data,$where){
 		$res = $this->db->update($tableName,$data,$where);
 		return $res;
 	}
 	public function HapusAgenda($tableName,$where){
 		$res = $this->db->delete($tableName,$where);
 		return $res;
 	}
  	 		
}