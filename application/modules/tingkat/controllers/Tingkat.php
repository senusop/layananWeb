<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Tingkat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('tingkat_model');
	}
	
	public function index()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);

		$data = array(
			'judul' => "tingkat Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "Tingkat Kelas",
			'content' =>'data/content_tingkat',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'datatingkat' => $this->tingkat_model->getRelasiAnd('tb_tingkat','tb_jurusan','tb_tingkat.jurusan_id','tb_jurusan.jurusan_id','tingkat_id !=0','tingkat_id'),
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah tingkat
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);

		
		$data = array(
			'judul' => "tingkat Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah tingkat",
			'url' =>"tingkat/simpan",
			'tbutton' => 'tambah data',
			'subPage' => "tambah tingkat",
			'content' =>'data/form_tingkat',
			'tingkat_id'=>"",
			'jurusan_id'=>"",
			'nama_tingkat'=>"",
			'jurusan_nama'=>"",
			'tingkat'=>"",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'jurusan' => $this->tingkat_model->getByAnd('tb_jurusan','jurusan_id !=0','jurusan_id'),
		
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit tingkat
	public function edit($id)
	{
		$tingkat_id = $id;
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$tingkatData = $this->primary_model->getDataRelasiBy('tb_tingkat','tb_jurusan','tb_tingkat.jurusan_id','tb_jurusan.jurusan_id','tingkat_id',$tingkat_id);
		foreach($tingkatData as $r)
		{
			$tingkat_id = $r->tingkat_id;
			$jurusan_id = $r->jurusan_id;
			$jurusan_nama = $r->jurusan_nama;
			$nama_tingkat = $r->nama_tingkat;
			$tingkat = $r->tingkat;
		}
		
		$row = array(
			'kajur' => 0,
		);
		$data = array(
			'judul' => "tingkat Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit tingkat",
			'url' =>"tingkat/update",
			'tbutton' => 'update data',
			'subPage' => "edit tingkat",
			'content' =>'data/form_tingkat',
			'tingkat_id'=> $tingkat_id,
			'jurusan_id'=> $jurusan_id,
			'nama_tingkat'=> $nama_tingkat,
			'jurusan_nama'=> $jurusan_nama,
			'tingkat'=> $tingkat,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'jurusan' => $this->tingkat_model->getByAnd('tb_jurusan','jurusan_id !=0','jurusan_id'),
			
			
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		$tgl_insert = date('Y-m-d H-i-s');
		$data = array(
			'tingkat_id' => $this->input->post('tingkat_id'),
			'jurusan_id' => $this->input->post('jurusan_id'),
			'nama_tingkat' => $this->input->post('nama_tingkat'),
			'tingkat' => $this->input->post('tingkat'),
			'tgl_insert' => $tgl_insert,
		);

		
			$insert =$this->primary_model->insertData('tb_tingkat',$data);
			redirect('tingkat');
	}

	//metode untuk update data
	public function update()
	{
		$tgl_update = date('Y-m-d H-i-s');
		$data = array(
			'tingkat_id' => $this->input->post('tingkat_id'),
			'jurusan_id' => $this->input->post('jurusan_id'),
			'nama_tingkat' => $this->input->post('nama_tingkat'),
			'tingkat' => $this->input->post('tingkat'),
			'tgl_update' => $tgl_update,
		);
		$id_tingkat = $this->input->post('tingkat_id');
		
			$this->primary_model->updateData('tingkat_id',$id_tingkat,'tb_tingkat',$data);
			redirect('tingkat');
	
		
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$tingkatID = array(
			'tingkat_id' => $id,
		);
		$alldata=$this->primary_model->getDataByCount('tb_kelas',$tingkatID);
		$rows = $alldata->num_rows();
		if($rows >0)
		{
			foreach($alldata->result() as $d)
			{
				$kelas_id = $d->tingkat_id;
			}
			$update = array('tingkat_id' =>0,);
			for($x =0; $x <= $rows; $x++)
			{
			$this->primary_model->updateData('tingkat_id',$kelas_id,'tb_kelas',$update);
			}
		}
		
		$this->primary_model->deleteData('tb_tingkat',$tingkatID);
		
		redirect('tingkat');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('tingkat'));
			$data = array(
				'kajur' => 0,
			);
			$datajur = array(
				'tingkat_id' => 0,
			);
			if($deleteData == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$id = $this->input->post('tingkat');
				$this->primary_model->remove_checked($id,'tingkat_id','tb_tingkat');
				redirect('tingkat');
			}
		}
		
	}
	
	//metode untuk multi update
	public function multi_update()
	{
		//menangkap variabel inputan
		$tingkat_nama = $this->input->post('tingkat_nama');
		$tingkat_singkat = $this->input->post('tingkat_singkat');
		$akreditasi = $this->input->post('akreditasi');
		$guru_id = $this->input->post('guru_id');
		$guru_id2 = $this->input->post('guru_id');
		$guru_id_awal = $this->input->post('guru_id_awal');
		//view data
		for($i=0; $i < count($guru_id); $i++)
		{
			$a=$guru_id[$i];
			$b=$guru_id[$i];

		}
	}
	
	
	//---------------------------------------------------------------//
	//                         METODE WITH AJAX                      //
	//---------------------------------------------------------------//
	
	//metode tambah tingkat
	
	
}

/* End of file tingkat.php */
/* Location : ./application/modules/tingkat/controllers/tingkat.php */