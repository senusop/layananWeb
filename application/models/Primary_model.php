<?php if(!defined('BASEPATH')) exit('akses langsung tidak diijinkan');

class Primary_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	//Menampilkan seluruh data dari table dengan descending
	public function getAll($table,$desc)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($desc,'desc');
		return $this->db->get()->result();
	}
	//menampilkan data dengan kondisi
	public function getAnd($table,$field,$where,$desc)
	{
		$sql ="select * from ".$table." where ".$field.$where." order by ".$desc." desc";
		return $this->db->query($sql)->result();
	}
	//menampilkan data yang berelsasi
	public function getDataRelasi($table1,$table2,$where1,$where2,$desc)
	{
		$sql ="select * from ".$table1.",".$table2." where ".$where1."=".$where2." order by ".$desc." desc";
		return $this->db->query($sql)->result();
		
	}
	//menampilkan data yang berelsasi dengan id
	public function getDataRelasiBy($table1,$table2,$where1,$where2,$field,$id)
	{
		$sql ="select * from ".$table1.",".$table2." where ".$where1."=".$where2." and ". $field . "=" . $id ;
		return $this->db->query($sql)->result();
		
	}
	//menampilkan data dengan relasi banyak table
	public function getRelasiMore($table1,$table2,$table3,$where1,$where2)
	{
		$sql = "select * from ". $table1.",".$table2.",".$table3. " where ".$where1. " and " .$where2;
		return $this->db->query($sql);
	}
	//menampilkan 
	public function get($table,$id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->order_by($id,'desc');
		return $this->db->get()->result();
	}
	//menampilkan data dari table dengan kondisi tertentu dan descending
	public function getData($table,$where,$data,$id)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where,$data);
		$this->db->order_by($id,'desc');
		return $this->db->get()->result();

	}
	public function getDataBy($table,$data)
	{
		return $this->db->get_where($table,$data)->result();
	}
	public function getDataByCount($table,$data)
	{
		return $this->db->get_where($table,$data);
	}
	//Mengecek data
	public function cekData($data,$table)
	{
		$hasil = $this->db->get_where($table,$data);
		return $hasil;
	}
	//metode input data
	public function insertData($table,$data)
	{
		$this->db->insert($table,$data);
	}
	//metode update data
	public function updateData($id,$IDdata,$table,$data)
	{
		$this->db->where($id,$IDdata);
		$this->db->update($table,$data);
	}
	//metode delete data
	public function deleteData($table,$data)
	{
		$this->db->delete($table,$data);
	}
	//metode mengetahui jumlah data
	public function countdata($table)
	{
		return $this->db->get($table)->num_rows();
	}
	//method get multi relasi data
	public function getDataRelasiMultiBy($table1,$table2,$where1,$where2,$field,$id)
	{
		for($i=0; $i < count($id); $i++)
		{
			$sql ="select * from ".$table1.",".$table2." where ".$where1."=".$where2." and ". $field . "=" . $id[$i] ;
			return $this->db->query($sql)->result();
		}
		
	}
	//metode delete data banyak
	public function remove_checked($id,$where,$table)
	{
		
			for ($i=0; $i < count($id); $i++) { 
				$this->db->where($where, $id[$i]);
				$this->db->delete($table);
			}
		
	}
	//metode SHOW data banyak
	public function show_checked($id,$field,$table)
	{
		
			for ($i=0; $i < count($id); $i++) { 
				$this->db->where($field, $id[$i]);
				return $this->db->get($table);
			}
		
	}
	//metode update data banyak
	public function update_checked($id,$where,$table,$data)
	{
		for($i=0; $i < count($id); $i++)
		{
			$this->db->where($where, $id[$i]);
			$this->db->update($table,$data);
		}
	}
	
}