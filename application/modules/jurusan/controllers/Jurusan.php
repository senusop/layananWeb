<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Jurusan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('jurusan_model');
	}
	
	public function index()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$row = array(
			'kajur' => 0,
		);
		$data = array(
			'judul' => "Jurusan Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "jurusan",
			'content' =>'data/content_jurusan',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataGuru' => $this->primary_model->getDataBy('tb_guru',$row),
			'dataJurusan' => $this->primary_model->getAnd('tb_jurusan','jurusan_id','!=0','jurusan_id'),
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah jurusan
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);

		
		$data = array(
			'judul' => "Jurusan Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah Jurusan",
			'url' =>"jurusan/simpan",
			'tbutton' => 'tambah data',
			'subPage' => "tambah jurusan",
			'content' =>'data/form_jurusan',
			'jurusan_id'=>"",
			'jurusan_nama'=>"",
			'jurusan_singkat'=>"",
			'akreditasi'=>"",
			'guru_nama'=>"",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit jurusan
	public function edit($id)
	{
		$jurusan_id = $id;
		$data=array("jurusan_id" => $jurusan_id);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$jurusanData = $this->primary_model->getDataBy('tb_jurusan',$data);
		foreach($jurusanData as $rowData)
		{
			$id_jurusan = $rowData->jurusan_id;
			$jurusan_nama =$rowData->jurusan_nama;
			$singkatan= $rowData->jurusan_singkat;
			$akreditasi = $rowData->akreditasi;
		}
		
		$row = array(
			'kajur' => 0,
		);
		$data = array(
			'judul' => "Jurusan Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit Jurusan",
			'url' =>"jurusan/update",
			'tbutton' => 'update data',
			'subPage' => "edit jurusan",
			'content' =>'data/form_jurusan',
			'jurusan_id'=>$id_jurusan,
			'jurusan_nama'=>$jurusan_nama,
			'jurusan_singkat'=>$singkatan,
			'akreditasi'=>$akreditasi,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			
			
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
			$redirect="jurusan/tambah/";
		}else
		{
			$redirect="jurusan";
		}
		$tgl_insert = date('Y-m-d H-i-s');
		$data = array(
			'jurusan_singkat' => $this->input->post('jurusan_singkat'),
			'jurusan_nama' => $this->input->post('jurusan_nama'),
			'akreditasi' => $this->input->post('akreditasi'),
			'tgl_insert' => $tgl_insert,
		);
		
		$insert =$this->primary_model->insertData('tb_jurusan',$data);
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
			$redirect="jurusan/edit/".$this->input->post('jurusan_id');
		}else
		{
			$redirect="jurusan";
		}
		$tgl_update = date('Y-m-d H-i-s');
		$data = array(
			'jurusan_singkat' => $this->input->post('jurusan_singkat'),
			'jurusan_nama' => $this->input->post('jurusan_nama'),
			'akreditasi' => $this->input->post('akreditasi'),
			'tgl_update' => $tgl_update,
		);
		//indikator
		$id_jurusan = $this->input->post('jurusan_id');
	
			$this->primary_model->updateData('jurusan_id',$id_jurusan,'tb_jurusan',$data);
			redirect($redirect);
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$jurusan_id = array(
			'jurusan_id' => $id,
		);
		$this->primary_model->deleteData('tb_jurusan',$jurusan_id);
		redirect('jurusan');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('jurusan_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('jurusan_id');
				$this->primary_model->remove_checked($id,'jurusan_id','tb_jurusan');
				redirect('jurusan');
			}
		}
	}
	
	//---------------------------------------------------------------//
	//                         METODE WITH AJAX                      //
	//---------------------------------------------------------------//
	
	//metode tambah jurusan
	
	
}

/* End of file jurusan.php */
/* Location : ./application/modules/jurusan/controllers/jurusan.php */