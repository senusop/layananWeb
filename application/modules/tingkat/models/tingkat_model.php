<?php if(!defined('BASEPATH')) exit('akses langsung tidak diijinkan');

class Tingkat_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getByAnd($table,$where1,$desc)
	{
		$sql ="select * from ".$table." where ".$where1." order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}
	
	public function getRelasiAnd($table1,$table2,$where1,$where2,$not,$desc)
	{
		$sql ="select * from ".$table1.",".$table2." where ".$where1. " = " .$where2." and " .$not. " order by ".$desc." desc";
		return $this->db->query($sql);
		
	}

	
	
}