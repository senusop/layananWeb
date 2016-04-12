<?php if(!defined('BASEPATH')) exit('akses langsung tidak diijinkan');

class Guru_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//menampilkan data yang berelsasi
	public function getDataRelasi($table1,$table2,$where1,$where2,$desc)
	{
		$sql ="select * from ".$table1.",".$table2." where ".$where1."=".$where2." order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}
	//menampilkan data yang berelsasi dengan id
	public function getDataRelasiBy($table1,$table2,$where1,$where2,$field1,$field2,$mid,$jid)
	{
		$sql ="select * from ".$table1.",".$table2." where ".$where1."=".$where2." and ". $field1 . "=" . $mid ." and ". $field2 . "=" . $jid ;
		return $this->db->query($sql)->result();
		
	}
	
	
}