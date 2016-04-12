<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Pembimbing extends CI_Controller
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
			'judul' => "pembimbing Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "pembimbing kelompok",
			'content' =>'data/content_pembimbing',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'pembimbing' => $this->primary_model->getRelasiMore("tb_pembimbing","tb_jurusan","tb_guru","tb_pembimbing.jurusan_id = tb_jurusan.jurusan_id","tb_pembimbing.guru_id = tb_guru.guru_id"),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah pembimbing
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$not ='!=0';
		$data = array(
			'judul' 				=> "pembimbing Tambah",
			'head' 					=> "template/header",
			'pageTitle'	 			=> "Master Data",
			'titleForm' 			=> "Tambah pembimbing",
			'url' 					=>"pembimbing/simpan",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "tambah Jenis pembimbing",
			'content'				=>'data/form_pembimbing',
			'pembimbing_id'			=> "",
			'nama_pembimbing'		=> "",
			'jurusan_id'			=> "",
			'jurusan_nama'			=> "",
			'guru_nama'				=> "",
			'guru_id'				=> "",
			'guru'					=> $this->primary_model->getAll('tb_guru','guru_id'),
			'jurusan'				=> $this->primary_model->getAll('tb_jurusan','jurusan_id'),
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'pembimbing' 			=> $this->primary_model->getRelasiMore("tb_pembimbing","tb_jurusan","tb_guru","tb_pembimbing.jurusan_id = tb_jurusan.jurusan_id","tb_pembimbing.guru_id = tb_guru.guru_id"),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit pembimbing
	public function edit($id)
	{
		$id_pembimbing = array(
			'pembimbing_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$pembimbingData = $this->primary_model->getDataRelasiBy('tb_pembimbing','tb_jenis_pembimbing','tb_pembimbing.jenis_pembimbing_id','tb_jenis_pembimbing.jenis_pembimbing_id','pembimbing_id',$id);
		foreach($pembimbingData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "pembimbing Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit pembimbing",
			'url' 					=>"pembimbing/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit pembimbing",
			'content'				=>'data/form_pembimbing',
			'pembimbing_id'			=>$rowData->pembimbing_id,
			'nama_pembimbing'		=>$rowData->nama_pembimbing,
			'pimpinan_pembimbing'	=>$rowData->pimpinan_pembimbing,
			'jenis_pembimbing_id'	=>$rowData->jenis_pembimbing_id,
			'jenis_pembimbing'		=>$rowData->jenis_pembimbing,
			'alamat_pembimbing'		=>$rowData->alamat_pembimbing,
			'no_tlp'				=>$rowData->no_tlp,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 				=> $this->primary_model->getAnd('tb_jenis_pembimbing','jenis_pembimbing_id','!=0','jenis_pembimbing_id'),
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
			$redirect="pembimbing/tambah";
		}else
		{
			$redirect="pembimbing";
		}
		$data = array(
			'guru_id'			=>$this->input->post('pembimbing_id'),
			'jurusan_id'			=>$this->input->post('jurusan_id'),
			'active'				=>$this->input->post('active'),
		);
			$insert =$this->primary_model->insertData('tb_pembimbing',$data);
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
			$redirect="pembimbing/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="pembimbing";
		}
		$data = array(
			'pembimbing_id'			=>$this->input->post('pembimbing_id'),
			'nama_pembimbing'		=>$this->input->post('nama_pembimbing'),
			'pimpinan_pembimbing'	=>$this->input->post('pimpinan_pembimbing'),
			'jenis_pembimbing_id'	=>$this->input->post('jenis_pembimbing_id'),
			'alamat_pembimbing'		=>$this->input->post('alamat_pembimbing'),
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
		$pembimbing_id= $this->input->post('pembimbing_id');
			$this->primary_model->updateData('pembimbing_id',$pembimbing_id,'tb_pembimbing',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$pembimbing_id = array(
			'pembimbing_id' => $id,
		);
		$this->primary_model->deleteData('tb_pembimbing',$pembimbing_id);
		redirect('pembimbing');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('pembimbing_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('pembimbing_id');
				$this->primary_model->remove_checked($id,'pembimbing_id','tb_pembimbing');
				redirect('pembimbing');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('pembimbing_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$pembimbing_id =$this->input->post('pembimbing_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "pembimbing Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit pembimbing",
					'url' => "pembimbing/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak pembimbing",
					'pembimbing_id' => $pembimbing_id,
					'content' =>'data/form_pembimbing_multi',
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
		$pembimbing_id = $this->input->post('pembimbing_id');
		$pembimbing = $this->input->post('pembimbing');
	
		for($i =0;$i < count($pembimbing_id); $i++)
		{
			$query = "update tb_pembimbing set pembimbing='$pembimbing[$i]' WHERE pembimbing_id = ".$pembimbing_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('pembimbing');
		
	}
	
}

/* End of file pembimbing.php */
/* Location : ./application/modules/pembimbing/controllers/pembimbing.php */