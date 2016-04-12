<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Agama extends CI_Controller
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
			'judul' => "Agama Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "agama",
			'content' =>'data/content_agama',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'agama' => $this->primary_model->getAnd('tb_agama','agama_id','!=0','agama_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah agama
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$data = array(
			'judul' => "Agama Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah Agama",
			'url' =>"agama/simpan",
			'tbutton' => 'Simpan Data',
			'subPage' => "tambah agama",
			'content' =>'data/form_agama',
			'agama_id'=>"",
			'agama'=>"",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit agama
	public function edit($id)
	{
		$id_agama = array(
			'agama_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$agamaData = $this->primary_model->getDataBy('tb_agama',$id_agama);
		foreach($agamaData as $rowData)
		{
			
		}
		$data = array(
			'judul' => "agama Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit Agama",
			'url' =>"agama/update",
			'tbutton' => 'Simpan Data',
			'subPage' => "edit agama",
			'content' =>'data/form_agama',
			'agama_id' =>$rowData->agama_id,
			'agama' =>$rowData->agama,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		$data = array(
			'agama_id' => $this->input->post('agama_id'),
			'agama' => $this->input->post('agama'),
		);
			$insert =$this->primary_model->insertData('tb_agama',$data);
			redirect('agama');
	}

	//metode untuk update data
	public function update()
	{
		$data = array(
			'agama' => $this->input->post('agama'),
		);
		$agama_id= $this->input->post('agama_id');
			$this->primary_model->updateData('agama_id',$agama_id,'tb_agama',$data);
			redirect('agama');
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$agama_id = array(
			'agama_id' => $id,
		);
		$this->primary_model->deleteData('tb_agama',$agama_id);
		$update = array('agama_id' =>0);
		$this->primary_model->updateData('agama_id',$id,'tb_guru',$update);
		$this->primary_model->updateData('agama_id',$id,'tb_murid',$update);
		redirect('agama');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('agama_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('agama_id');
				$this->primary_model->remove_checked($id,'agama_id','tb_agama');
				$data=array('agama_id' => 0);
				$this->primary_model->update_checked($id,'agama_id','tb_guru',$data);
				$this->primary_model->update_checked($id,'agama_id','tb_murid',$data);
				redirect('agama');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('agama_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$agama_id =$this->input->post('agama_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "Agama Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit Agama",
					'url' => "agama/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak agama",
					'agama_id' => $agama_id,
					'content' =>'data/form_agama_multi',
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
		$agama_id = $this->input->post('agama_id');
		$agama = $this->input->post('agama');
	
		for($i =0;$i < count($agama_id); $i++)
		{
			$query = "update tb_agama set agama='$agama[$i]' WHERE agama_id = ".$agama_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('agama');
		
	}
	
}

/* End of file agama.php */
/* Location : ./application/modules/agama/controllers/agama.php */