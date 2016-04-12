<?php if(!defined('BASEPATH')) exit('akses langsung tidak diijinkan');

class Kelas_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function getByAnd($table,$where1,$where2,$desc)
	{
		$sql ="select * from ".$table." where ".$where1. " and " .$where2." order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}
	
	public function getRelasiAnd($table1,$table2,$table3,$table4,$where1,$where2,$where3,$where4,$where5,$where6,$not,$desc)
	{
		$sql ="select * from ".$table1.",".$table2.",".$table3.",".$table4." where ".$where1. " = " .$where2." and ". $where3. " = ". $where4 . " and ". $where5. " = " .$where6. " and " .$not. " order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}

		//metode simpan banyak
	public function simpan_multi($id,$table,$tingkat_id,$thn_ajaran_id,$murid_id)
	{
		for($i=0;$i<count($id);$i++){
				$sql = "insert into $table(tingkat_id,thn_ajaran_id,murid_id) VALUES($tingkat_id,$thn_ajaran_id,$murid_id[$i])";
				return $this->db->query($sql);
			}

	}

	
	
}