<?php if(!defined('BASEPATH')) exit('tidak boleh akses langsung');

class Mlogin extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function cek_data($data,$table)
	{
		$hasil = $this->db->get_where($table,$data);
		if($hasil->num_rows() == 1)
		{
			return $hasil->result();
		}else
		{
			return false;
		}
	}
	
}

/* End of file mlogin.php */
/* Location: ./application/modules/login/models/mlogin.php */