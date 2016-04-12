<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Jenis_perusahaan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
	}
	
	public function index()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		
	
		$data = array(
			'judul' => "Jenis Perusahaan Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "Jenis Perusahaan",
			'content' =>'data/content_jenis_perusahaan',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis_perusahaan' => $this->primary_model->getAnd('tb_jenis_perusahaan','jenis_perusahaan_id','!=0','jenis_perusahaan_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah jenis_perusahaan
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$data = array(
			'judul' => "jenis_perusahaan Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah Jenis Perusahaan",
			'url' =>"jenis_perusahaan/simpan",
			'tbutton' => 'tambah data',
			'subPage' => "tambah Jenis Perusahaan",
			'content' =>'data/form_jenis_perusahaan',
			'jenis_perusahaan_id'=>"",
			'jenis_perusahaan'=>"",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit jenis_perusahaan
	public function edit($id)
	{
		$id_jenis_perusahaan = array(
			'jenis_perusahaan_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$jenis_perusahaanData = $this->primary_model->getDataBy('tb_jenis_perusahaan',$id_jenis_perusahaan);
		foreach($jenis_perusahaanData as $rowData)
		{
			
		}
		$data = array(
			'judul' => "jenis_perusahaan Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit jenis_perusahaan",
			'url' =>"jenis_perusahaan/update",
			'tbutton' => 'update data',
			'subPage' => "edit jenis_perusahaan",
			'content' =>'data/form_jenis_perusahaan',
			'jenis_perusahaan_id' =>$rowData->jenis_perusahaan_id,
			'jenis_perusahaan' =>$rowData->jenis_perusahaan,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		$data = array(
			'jenis_perusahaan_id' => $this->input->post('jenis_perusahaan_id'),
			'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
		);
			$insert =$this->primary_model->insertData('tb_jenis_perusahaan',$data);
			redirect('jenis_perusahaan');
	}

	//metode untuk update data
	public function update()
	{
		$data = array(
			'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
		);
		$jenis_perusahaan_id= $this->input->post('jenis_perusahaan_id');
			$this->primary_model->updateData('jenis_perusahaan_id',$jenis_perusahaan_id,'tb_jenis_perusahaan',$data);
			redirect('jenis_perusahaan');
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$jenis_perusahaan_id = array(
			'jenis_perusahaan_id' => $id,
		);
		$this->primary_model->deleteData('tb_jenis_perusahaan',$jenis_perusahaan_id);
		$update = array('jenis_perusahaan_id' =>0);
		$this->primary_model->updateData('jenis_perusahaan_id',$id,'tb_perusahaan',$update);
		redirect('jenis_perusahaan');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('jenis_perusahaan_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('jenis_perusahaan_id');
				$this->primary_model->remove_checked($id,'jenis_perusahaan_id','tb_jenis_perusahaan');
				$data=array('jenis_perusahaan_id' => 0);
				$this->primary_model->update_checked($id,'jenis_perusahaan_id','tb_perusahaan',$data);
				redirect('jenis_perusahaan');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('jenis_perusahaan_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$jenis_perusahaan_id =$this->input->post('jenis_perusahaan_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "jenis_perusahaan Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit jenis_perusahaan",
					'url' => "jenis_perusahaan/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak jenis_perusahaan",
					'jenis_perusahaan_id' => $jenis_perusahaan_id,
					'content' =>'data/form_jenis_perusahaan_multi',
					'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
				
				);
				
				$this->load->view('views',$data);
				
			
			}
		}
		
	}
	
	//metode untuk multi update
	public function multi_update()
	{
		//menangkap variabel inputan
		$jenis_perusahaan_id = $this->input->post('jenis_perusahaan_id');
		$jenis_perusahaan = $this->input->post('jenis_perusahaan');
	
		for($i =0;$i < count($jenis_perusahaan_id); $i++)
		{
			$query = "update tb_jenis_perusahaan set jenis_perusahaan='$jenis_perusahaan[$i]' WHERE jenis_perusahaan_id = ".$jenis_perusahaan_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('jenis_perusahaan');
		
	}
	
}

/* End of file jenis_perusahaan.php */
/* Location : ./application/modules/jenis_perusahaan/controllers/jenis_perusahaan.php */