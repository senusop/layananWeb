<?php if(!defined('BASEPATH')) exit('akses langsung tidak diijinkan');

class Kajur_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getByAnd($table,$where,$desc)
	{
		$sql ="select * from ".$table." where " .$where. " order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}
	
	public function getRelasiAnd($table1,$table2,$table3,$table4,$where1,$where2,$where3,$where4,$where5,$where6,$kondisi,$desc)
	{
		$sql ="select * from ".$table1.",".$table2.",".$table3.",".$table4." where ".$where1. " = " .$where2." and ". $where3. " = ". $where4 . " and ". $where5. " = " .$where6. " and ". $kondisi. " order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}

	
	
}