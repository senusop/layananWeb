<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Mapel extends CI_Controller
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
			'judul' => "Mapel Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "Jenis mapel",
			'content' =>'data/content_mapel',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'mapel' => $this->primary_model->getAnd('tb_mapel','mapel_id','!=0','mapel_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah mapel
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$data = array(
			'judul' 				=> "mapel Tambah",
			'head' 					=> "template/header",
			'pageTitle'	 			=> "Master Data",
			'titleForm' 			=> "Tambah mapel",
			'url' 					=>"mapel/simpan",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "tambah Jenis mapel",
			'content'				=>'data/form_mapel',
			'mapel_id'				=>"",
			'mapel_nama'			=>"",
			'singkatan'				=>"",
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit mapel
	public function edit($id)
	{
		$id_mapel = array(
			'mapel_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$mapelData = $this->primary_model->getDataBy('tb_mapel',$id_mapel);
		foreach($mapelData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "mapel Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit mapel",
			'url' 					=>"mapel/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit mapel",
			'content'				=>'data/form_mapel',
			'mapel_id'				=>$rowData->mapel_id,
			'mapel_nama'			=>$rowData->mapel_nama,
			'singkatan'				=>$rowData->singkatan,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		$redirect ="";
		$uri3=$this->input->post('uri3');
		$uri4=$this->input->post('uri4');
		if($this->input->post('saveOnly'))
		{
			$redirect="mapel/tambah";
		}else
		{
			$redirect="mapel";
		}
		$data = array(
			'mapel_id'			=>$this->input->post('mapel_id'),
			'singkatan'			=>$this->input->post('singkatan'),
			'mapel_nama'		=>$this->input->post('mapel_nama'),
		);
			$insert =$this->primary_model->insertData('tb_mapel',$data);
			redirect($redirect);
	}

	//metode untuk update data
	public function update()
	{
		$redirect ="";
		$uri3=$this->input->post('uri3');
		$uri4=$this->input->post('uri4');
		if($this->input->post('saveOnly'))
		{
			$redirect="mapel/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="mapel";
		}
		$data = array(
			'mapel_id'			=>$this->input->post('mapel_id'),
			'singkatan'			=>$this->input->post('singkatan'),
			'mapel_nama'		=>$this->input->post('mapel_nama'),
		);
			$mapel_id= $this->input->post('mapel_id');
			$this->primary_model->updateData('mapel_id',$mapel_id,'tb_mapel',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$mapel_id = array(
			'mapel_id' => $id,
		);
		$this->primary_model->deleteData('tb_mapel',$mapel_id);
		$update = array('mapel_id' =>0);
		$this->primary_model->updateData('mapel_id',$id,'tb_guru',$update);
		redirect('mapel');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('mapel_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('mapel_id');
				$this->primary_model->remove_checked($id,'mapel_id','tb_mapel');
				$data=array('mapel_id' => 0);
				$this->primary_model->update_checked($id,'mapel_id','tb_guru',$data);
				redirect('mapel');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('mapel_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$mapel_id =$this->input->post('mapel_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "mapel Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit mapel",
					'url' => "mapel/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak mapel",
					'mapel_id' => $mapel_id,
					'content' =>'data/form_mapel_multi',
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
		$mapel_id = $this->input->post('mapel_id');
		$mapel = $this->input->post('mapel');
	
		for($i =0;$i < count($mapel_id); $i++)
		{
			$query = "update tb_mapel set mapel='$mapel[$i]' WHERE mapel_id = ".$mapel_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('mapel');
		
	}
	
}

/* End of file mapel.php */
/* Location : ./application/modules/mapel/controllers/mapel.php */