<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Perusahaan extends CI_Controller
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
			'content' =>'data/content_perusahaan',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'perusahaan' => $this->primary_model->getDataRelasi('tb_perusahaan','tb_jenis_perusahaan','tb_perusahaan.jenis_perusahaan_id','tb_jenis_perusahaan.jenis_perusahaan_id','perusahaan_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah perusahaan
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$not ='!=0';
		$data = array(
			'judul' 				=> "perusahaan Tambah",
			'head' 					=> "template/header",
			'pageTitle'	 			=> "Master Data",
			'titleForm' 			=> "Tambah Perusahaan",
			'url' 					=>"perusahaan/simpan",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "tambah Jenis Perusahaan",
			'content'				=>'data/form_perusahaan',
			'perusahaan_id'			=>"",
			'nama_perusahaan'		=>"",
			'pimpinan_perusahaan'	=>"",
			'jenis_perusahaan_id'	=>"",
			'jenis_perusahaan'		=>"",
			'alamat_perusahaan'		=>"",
			'no_tlp'				=>"",
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 		=> $this->primary_model->getAnd('tb_jenis_perusahaan','jenis_perusahaan_id',$not,'jenis_perusahaan_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit perusahaan
	public function edit($id)
	{
		$id_perusahaan = array(
			'perusahaan_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$perusahaanData = $this->primary_model->getDataRelasiBy('tb_perusahaan','tb_jenis_perusahaan','tb_perusahaan.jenis_perusahaan_id','tb_jenis_perusahaan.jenis_perusahaan_id','perusahaan_id',$id);
		foreach($perusahaanData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "perusahaan Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit perusahaan",
			'url' 					=>"perusahaan/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit perusahaan",
			'content'				=>'data/form_perusahaan',
			'perusahaan_id'			=>$rowData->perusahaan_id,
			'nama_perusahaan'		=>$rowData->nama_perusahaan,
			'pimpinan_perusahaan'	=>$rowData->pimpinan_perusahaan,
			'jenis_perusahaan_id'	=>$rowData->jenis_perusahaan_id,
			'jenis_perusahaan'		=>$rowData->jenis_perusahaan,
			'alamat_perusahaan'		=>$rowData->alamat_perusahaan,
			'no_tlp'				=>$rowData->no_tlp,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 				=> $this->primary_model->getAnd('tb_jenis_perusahaan','jenis_perusahaan_id','!=0','jenis_perusahaan_id'),
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
			$redirect="perusahaan/tambah";
		}else
		{
			$redirect="perusahaan";
		}

		$jalan = $this->input->post('jalan');
		$kota = $this->input->post('kota');
		$provinsi = $this->input->post('provinsi');
		$negara = $this->input->post('negara');
		$alamat = $jalan. ", ". $kota. ", " . $provinsi. ", ". $negara;
		$data = array(
			'perusahaan_id'			=>$this->input->post('perusahaan_id'),
			'nama_perusahaan'		=>$this->input->post('nama_perusahaan'),
			'pimpinan_perusahaan'	=>$this->input->post('pimpinan_perusahaan'),
			'jenis_perusahaan_id'	=>$this->input->post('jenis_perusahaan_id'),
			'alamat_perusahaan'		=>$alamat,
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
			$insert =$this->primary_model->insertData('tb_perusahaan',$data);
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
			$redirect="perusahaan/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="perusahaan";
		}
		$data = array(
			'perusahaan_id'			=>$this->input->post('perusahaan_id'),
			'nama_perusahaan'		=>$this->input->post('nama_perusahaan'),
			'pimpinan_perusahaan'	=>$this->input->post('pimpinan_perusahaan'),
			'jenis_perusahaan_id'	=>$this->input->post('jenis_perusahaan_id'),
			'alamat_perusahaan'		=>$this->input->post('alamat_perusahaan'),
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
		$perusahaan_id= $this->input->post('perusahaan_id');
			$this->primary_model->updateData('perusahaan_id',$perusahaan_id,'tb_perusahaan',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$perusahaan_id = array(
			'perusahaan_id' => $id,
		);
		$this->primary_model->deleteData('tb_perusahaan',$perusahaan_id);
		redirect('perusahaan');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('perusahaan_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('perusahaan_id');
				$this->primary_model->remove_checked($id,'perusahaan_id','tb_perusahaan');
				redirect('perusahaan');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('perusahaan_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$perusahaan_id =$this->input->post('perusahaan_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "perusahaan Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit perusahaan",
					'url' => "perusahaan/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak perusahaan",
					'perusahaan_id' => $perusahaan_id,
					'content' =>'data/form_perusahaan_multi',
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
		$perusahaan_id = $this->input->post('perusahaan_id');
		$perusahaan = $this->input->post('perusahaan');
	
		for($i =0;$i < count($perusahaan_id); $i++)
		{
			$query = "update tb_perusahaan set perusahaan='$perusahaan[$i]' WHERE perusahaan_id = ".$perusahaan_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('perusahaan');
		
	}
	
}

/* End of file perusahaan.php */
/* Location : ./application/modules/perusahaan/controllers/perusahaan.php */