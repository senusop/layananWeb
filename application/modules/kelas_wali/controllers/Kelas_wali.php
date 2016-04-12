<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class kelas_wali extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('kelas_wali_model');
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
			'judul' 			=> "kelas_wali Page",
			'head' 				=> "template/header",
			'pageTitle' 		=> "Master Data",
			'subPage' 			=> "kelas_wali",
			'content' 			=>'data/content_kelas_wali',
			'adminData' 		=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'wali_kelas' 		=> $this->kelas_wali_model->getRelasiAnd('tb_wali_kelas','tb_thn_ajaran','tb_guru','tb_tingkat','tb_wali_kelas.tingkat_id','tb_tingkat.tingkat_id','tb_wali_kelas.thn_ajaran_id','tb_thn_ajaran.thn_ajaran_id','tb_wali_kelas.guru_id','tb_guru.guru_id','wali_kelas_id !=0','wali_kelas_id'),
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah kelas_wali
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);

		
		$thnAktif = $this->primary_model->getAnd('tb_thn_ajaran','status','=1','thn_ajaran_id');
		foreach($thnAktif as $th)
		{
			$activeThn = $th->tahun;
			$thn_id = $th->thn_ajaran_id;
		}
		
		$data = array(
			'judul' 			=> "kelas_wali Tambah",
			'head' 				=> "template/header",
			'pageTitle' 		=> "Master Data",
			'titleForm2' 		=> "Tambah kelas_wali",
			'titleForm' 		=> "Data Wali Kelas",
			'url' 				=> "kelas_wali/simpan",
			'tbutton' 			=> 'tambah data',
			'subPage' 			=> "tambah kelas_wali",
			'content' 			=> 'data/form_kelas_wali',
			'kajur_id'			=>"",
			'thn_ajaran_id'		=>"",
			'tahun'				=>"",
			'jurusan_id'		=>"",
			'tingkat_id'		=>$this->primary_model->get('tb_tingkat','tingkat_id'),
			'nama_kelas_wali'	=>"",
			'guru_id'			=>"",
			'guru_nama'			=>"",
			'adminData'		 	=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataJurusan'	 	=> $this->primary_model->getAnd('tb_jurusan','jurusan_id','!=0','jurusan_id'),
			'dataGuru' 			=> $this->primary_model->get('tb_guru','guru_id'),
			'activeThn' 		=> $activeThn,
			'thn_ajaran_id' 	=>$thn_id,
		
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit kelas_wali
	public function edit($id)
	{
		$kelas_wali_id = $id;
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$kelas_waliData = $this->primary_model->getDataRelasiBy('tb_kelas_wali','tb_guru','tb_kelas_wali.guru_id','tb_guru.guru_id','kelas_wali_id',$kelas_wali_id);
		foreach($kelas_waliData as $rowData)
		{
			
		}
		
		$row = array(
			'kajur' => 0,
		);
		$data = array(
			'judul' => "kelas_wali Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit kelas_wali",
			'url' =>"kelas_wali/update",
			'tbutton' => 'update data',
			'subPage' => "edit kelas_wali",
			'content' =>'data/form_kelas_wali',
			'kelas_wali_id'=>$rowData->kelas_wali_id,
			'kelas_wali_nama'=>$rowData->kelas_wali_nama,
			'kelas_wali_singkat'=>$rowData->kelas_wali_singkat,
			'akreditasi'=>$rowData->akreditasi,
			'guru_nama'=>$rowData->guru_nama,
			'guru_id'=>$rowData->guru_id,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataGuru' => $this->kelas_wali_model->getByAnd('tb_guru','kajur =0','guru_id !=0','guru_id'),
			
			
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		/*	
		$tgl_insert = date('Y-m-d H-i-s');
		$data = array(
			'guru_id' => $this->input->post('guru_id'),
			'kelas_wali_singkat' => $this->input->post('kelas_wali_singkat'),
			'kelas_wali_nama' => $this->input->post('kelas_wali_nama'),
			'akreditasi' => $this->input->post('akreditasi'),
			'tgl_insert' => $tgl_insert,
		);
		$id_guru = $this->input->post('guru_id');
		$guruUpdate=array(
			'kajur' => 1,
		);
		
			$insert =$this->primary_model->insertData('tb_kelas_wali',$data);
			$this->primary_model->updateData('guru_id',$id_guru,'tb_guru',$guruUpdate);
			redirect('kelas_wali');
		*/
			$table = "tb_wali_kelas";
			$tingkat_id= $this->input->post('tingkat_id');
			$guru_id = $this->input->post('dataGuru');
			$thn_ajaran_id= $this->input->post('thn_ajaran_id');
			$data = array(
					"thn_ajaran_id" => $thn_ajaran_id,
					"guru_id"		=> $guru_id,
					"tingkat_id"	=> $tingkat_id,
				);

			$this->primary_model->insertData($table,$data);
			
			redirect("kelas_wali");

			

	}

	//metode untuk update data
	public function update()
	{
		$tgl_update = date('Y-m-d H-i-s');
		$data = array(
			'guru_id' => $this->input->post('guru_id'),
			'kelas_wali_singkat' => $this->input->post('kelas_wali_singkat'),
			'kelas_wali_nama' => $this->input->post('kelas_wali_nama'),
			'akreditasi' => $this->input->post('akreditasi'),
			'tgl_update' => $tgl_update,
		);
		//indikator
		$id_kelas_wali = $this->input->post('kelas_wali_id');
		$id_guru = $this->input->post('guru_id');
		$id_guru_awal = $this->input->post('guru_id_awal');
		
		$nonKajur = array(
			'kajur' => 0,
		);
		$kajur=array(
			'kajur' => 1,
			);
		if($id_guru_awal == $id_guru)
		{
			$this->primary_model->updateData('kelas_wali_id',$id_kelas_wali,'tb_kelas_wali',$data);
			redirect('kelas_wali');
		}
		else{
		
		
			$this->primary_model->updateData('kelas_wali_id',$id_kelas_wali,'tb_kelas_wali',$data);
			$this->primary_model->updateData('guru_id',$id_guru_awal,'tb_guru',$nonKajur);
			$this->primary_model->updateData('guru_id',$id_guru,'tb_guru',$kajur);
			redirect('kelas_wali');
		}
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$guru_id = array(
			'guru_id' => $id,
		);
		$alldata=$this->primary_model->getDataBy('tb_kelas_wali',$guru_id);
		foreach($alldata as $d)
		{
			$kelas_wali_id = $d->kelas_wali_id;
		}
		$nonKajur = array(
			'kajur' => 0,
		);
		$update = array('kelas_wali_id' =>0,);
		$this->primary_model->deleteData('tb_kelas_wali',$guru_id);
		$this->primary_model->updateData('guru_id',$id,'tb_guru',$nonKajur);
		$this->primary_model->updateData('kelas_wali_id',$kelas_wali_id,'tb_murid',$update);
		redirect('kelas_wali');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('GURUID'));
			$data = array(
				'kajur' => 0,
			);
			$datajur = array(
				'kelas_wali_id' => 0,
			);
			if($deleteData == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$id = $this->input->post('GURUID');
				$this->primary_model->remove_checked($id,'guru_id','tb_kelas_wali');
				$this->primary_model->update_checked($id,'guru_id','tb_guru',$data);
				$datakelas_wali = $this->primary_model->show_checked($id,'guru_id','tb_kelas_wali');
				foreach($datakelas_wali as $d)
				{
					echo  $d->kelas_wali_id;
				}
				$this->primary_model->update_checked($kelas_wali_id,'kelas_wali_id','tb_murid',$datajur);
				redirect('kelas_wali');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
			);
			$deleteData =count($this->input->post('GURUID'));
			$kajur = array(
				'kajur' => 0,
			);
			if($deleteData == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$GURUID =$this->input->post('GURUID');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				$kajur=array(
					'kajur' => 0,
					);
				$data = array(
					'judul' => "kelas_wali Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'url' => "kelas_wali/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak kelas_wali",
					'guruID' => $GURUID,
					'content' =>'data/form_kelas_wali_multi',
					'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
					'dataGuru' => $this->primary_model->getDataBy('tb_guru',$kajur),
				);
				
				$this->load->view('views',$data);
				
			
			}
		}
		
	}
	
	//metode untuk multi update
	public function multi_update()
	{
		//menangkap variabel inputan
		$kelas_wali_nama = $this->input->post('kelas_wali_nama');
		$kelas_wali_singkat = $this->input->post('kelas_wali_singkat');
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
	
	//metode tambah kelas_wali
	
	
}

/* End of file kelas_wali.php */
/* Location : ./application/modules/kelas_wali/controllers/kelas_wali.php */