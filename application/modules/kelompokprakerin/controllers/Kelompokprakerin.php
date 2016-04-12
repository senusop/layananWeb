<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Kelompokprakerin extends CI_Controller
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
			'judul' => "kelompokprakerin Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "kelompokprakerin prakerin",
			'content' =>'data/content_kelompokprakerin',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'kelompokprakerin' => $this->primary_model->getRelasiMore("tb_kelompok_prakerin","tb_pembimbing","tb_peserta_prakerin","tb_kelompok_prakerin.pembimbing_id = tb_pembimbing.pembimbing_id","tb_kelompok_prakerin.peserta_id = tb_peserta_prakerin.peserta_id"),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah kelompokprakerin
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$not ='!=0';
		$data = array(
			'judul' 				=> "kelompokprakerin Tambah",
			'head' 					=> "template/header",
			'pageTitle'	 			=> "Master Data",
			'titleForm' 			=> "Tambah kelompokprakerin",
			'url' 					=> "kelompokprakerin/simpan",
			'tbutton' 				=> "Simpan Data",
			'subPage' 				=> "tambah kelompokprakerin prakerin",
			'content'				=> "data/form_kelompokprakerin",
			'kelompokprakerin_id'			=> "",
			'nama_kelompokprakerin'			=> "",
			'perusahaan_id'			=> "",
			'nama_perusahaan'		=> "",
			'guru_nama'				=> "",
			'murid_id'				=> "",
			'murid'					=> $this->primary_model->getAll('tb_murid','murid_id'),
			'perusahaan'			=> $this->primary_model->getAll('tb_perusahaan','perusahaan_id'),
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit kelompokprakerin
	public function edit($id)
	{
		$id_kelompokprakerin = array(
			'kelompokprakerin_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$kelompokprakerinData = $this->primary_model->getDataRelasiBy('tb_kelompokprakerin','tb_jenis_kelompokprakerin','tb_kelompokprakerin.jenis_kelompokprakerin_id','tb_jenis_kelompokprakerin.jenis_kelompokprakerin_id','kelompokprakerin_id',$id);
		foreach($kelompokprakerinData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "kelompokprakerin Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit kelompokprakerin",
			'url' 					=>"kelompokprakerin/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit kelompokprakerin",
			'content'				=>'data/form_kelompokprakerin',
			'kelompokprakerin_id'			=>$rowData->kelompokprakerin_id,
			'nama_kelompokprakerin'		=>$rowData->nama_kelompokprakerin,
			'pimpinan_kelompokprakerin'	=>$rowData->pimpinan_kelompokprakerin,
			'jenis_kelompokprakerin_id'	=>$rowData->jenis_kelompokprakerin_id,
			'jenis_kelompokprakerin'		=>$rowData->jenis_kelompokprakerin,
			'alamat_kelompokprakerin'		=>$rowData->alamat_kelompokprakerin,
			'no_tlp'				=>$rowData->no_tlp,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 				=> $this->primary_model->getAnd('tb_jenis_kelompokprakerin','jenis_kelompokprakerin_id','!=0','jenis_kelompokprakerin_id'),
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
			$redirect="kelompokprakerin/tambah";
		}else
		{
			$redirect="kelompokprakerin";
		}
		$data = array(
			'murid_id'			=>$this->input->post('murid_id'),
			'perusahaan_id'		=>$this->input->post('perusahaan_id'),
		);
			$insert =$this->primary_model->insertData('tb_kelompokprakerin_prakerin',$data);
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
			$redirect="kelompokprakerin/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="kelompokprakerin";
		}
		$data = array(
			'kelompokprakerin_id'			=>$this->input->post('kelompokprakerin_id'),
			'nama_kelompokprakerin'		=>$this->input->post('nama_kelompokprakerin'),
			'pimpinan_kelompokprakerin'	=>$this->input->post('pimpinan_kelompokprakerin'),
			'jenis_kelompokprakerin_id'	=>$this->input->post('jenis_kelompokprakerin_id'),
			'alamat_kelompokprakerin'		=>$this->input->post('alamat_kelompokprakerin'),
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
		$kelompokprakerin_id= $this->input->post('kelompokprakerin_id');
			$this->primary_model->updateData('kelompokprakerin_id',$kelompokprakerin_id,'tb_kelompokprakerin',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$kelompokprakerin_id = array(
			'kelompokprakerin_id' => $id,
		);
		$this->primary_model->deleteData('tb_kelompokprakerin',$kelompokprakerin_id);
		redirect('kelompokprakerin');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('kelompokprakerin_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('kelompokprakerin_id');
				$this->primary_model->remove_checked($id,'kelompokprakerin_id','tb_kelompokprakerin');
				redirect('kelompokprakerin');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('kelompokprakerin_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$kelompokprakerin_id =$this->input->post('kelompokprakerin_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "kelompokprakerin Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit kelompokprakerin",
					'url' => "kelompokprakerin/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak kelompokprakerin",
					'kelompokprakerin_id' => $kelompokprakerin_id,
					'content' =>'data/form_kelompokprakerin_multi',
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
		$kelompokprakerin_id = $this->input->post('kelompokprakerin_id');
		$kelompokprakerin = $this->input->post('kelompokprakerin');
	
		for($i =0;$i < count($kelompokprakerin_id); $i++)
		{
			$query = "update tb_kelompokprakerin set kelompokprakerin='$kelompokprakerin[$i]' WHERE kelompokprakerin_id = ".$kelompokprakerin_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('kelompokprakerin');
		
	}
	
}

/* End of file kelompokprakerin.php */
/* Location : ./application/modules/kelompokprakerin/controllers/kelompokprakerin.php */