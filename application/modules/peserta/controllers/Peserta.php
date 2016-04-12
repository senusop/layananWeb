<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Peserta extends CI_Controller
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
			'judul' => "peserta Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "peserta prakerin",
			'content' =>'data/content_peserta',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'peserta' => $this->primary_model->getRelasiMore("tb_peserta_prakerin","tb_murid","tb_perusahaan","tb_peserta_prakerin.murid_id = tb_murid.murid_id","tb_peserta_prakerin.perusahaan_id = tb_perusahaan.perusahaan_id"),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah peserta
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$not ='!=0';
		$data = array(
			'judul' 				=> "peserta Tambah",
			'head' 					=> "template/header",
			'pageTitle'	 			=> "Master Data",
			'titleForm' 			=> "Tambah peserta",
			'url' 					=> "peserta/simpan",
			'tbutton' 				=> "Simpan Data",
			'subPage' 				=> "tambah peserta prakerin",
			'content'				=> "data/form_peserta",
			'peserta_id'			=> "",
			'nama_peserta'			=> "",
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
	
	//metode edit peserta
	public function edit($id)
	{
		$id_peserta = array(
			'peserta_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$pesertaData = $this->primary_model->getDataRelasiBy('tb_peserta','tb_jenis_peserta','tb_peserta.jenis_peserta_id','tb_jenis_peserta.jenis_peserta_id','peserta_id',$id);
		foreach($pesertaData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "peserta Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit peserta",
			'url' 					=>"peserta/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit peserta",
			'content'				=>'data/form_peserta',
			'peserta_id'			=>$rowData->peserta_id,
			'nama_peserta'		=>$rowData->nama_peserta,
			'pimpinan_peserta'	=>$rowData->pimpinan_peserta,
			'jenis_peserta_id'	=>$rowData->jenis_peserta_id,
			'jenis_peserta'		=>$rowData->jenis_peserta,
			'alamat_peserta'		=>$rowData->alamat_peserta,
			'no_tlp'				=>$rowData->no_tlp,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 				=> $this->primary_model->getAnd('tb_jenis_peserta','jenis_peserta_id','!=0','jenis_peserta_id'),
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
			$redirect="peserta/tambah";
		}else
		{
			$redirect="peserta";
		}
		$data = array(
			'murid_id'			=>$this->input->post('murid_id'),
			'perusahaan_id'		=>$this->input->post('perusahaan_id'),
		);
			$insert =$this->primary_model->insertData('tb_peserta_prakerin',$data);
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
			$redirect="peserta/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="peserta";
		}
		$data = array(
			'peserta_id'			=>$this->input->post('peserta_id'),
			'nama_peserta'		=>$this->input->post('nama_peserta'),
			'pimpinan_peserta'	=>$this->input->post('pimpinan_peserta'),
			'jenis_peserta_id'	=>$this->input->post('jenis_peserta_id'),
			'alamat_peserta'		=>$this->input->post('alamat_peserta'),
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
		$peserta_id= $this->input->post('peserta_id');
			$this->primary_model->updateData('peserta_id',$peserta_id,'tb_peserta',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$peserta_id = array(
			'peserta_id' => $id,
		);
		$this->primary_model->deleteData('tb_peserta',$peserta_id);
		redirect('peserta');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('peserta_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('peserta_id');
				$this->primary_model->remove_checked($id,'peserta_id','tb_peserta');
				redirect('peserta');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('peserta_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$peserta_id =$this->input->post('peserta_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "peserta Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit peserta",
					'url' => "peserta/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak peserta",
					'peserta_id' => $peserta_id,
					'content' =>'data/form_peserta_multi',
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
		$peserta_id = $this->input->post('peserta_id');
		$peserta = $this->input->post('peserta');
	
		for($i =0;$i < count($peserta_id); $i++)
		{
			$query = "update tb_peserta set peserta='$peserta[$i]' WHERE peserta_id = ".$peserta_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('peserta');
		
	}
	
}

/* End of file peserta.php */
/* Location : ./application/modules/peserta/controllers/peserta.php */