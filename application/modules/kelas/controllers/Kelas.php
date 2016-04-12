<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('kelas_model');
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
			'judul' => "kelas Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "kelas",
			'content' =>'data/content_kelas',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'datakelas' => $this->kelas_model->getRelasiAnd('tb_kelas','tb_tingkat','tb_thn_ajaran','tb_murid','tb_kelas.tingkat_id','tb_tingkat.tingkat_id','tb_kelas.thn_ajaran_id','tb_thn_ajaran.thn_ajaran_id','tb_kelas.murid_id','tb_murid.murid_id','kelas_id !=0','kelas_id'),
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah kelas
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
			'judul' 			=> "Kelas Tambah",
			'head' 				=> "template/header",
			'pageTitle' 		=> "Master Data",
			'titleForm2' 		=> "Tambah Kelas",
			'titleForm' 		=> "Data Murid",
			'url' 				=>"kelas/simpan",
			'tbutton' 			=> 'tambah data',
			'subPage' 			=> "tambah kelas",
			'content' 			=>'data/form_kelas',
			'kajur_id'			=>"",
			'thn_ajaran_id'		=>"",
			'tahun'				=>"",
			'jurusan_id'		=>"",
			'tingkat_id'		=>$this->primary_model->get('tb_tingkat','tingkat_id'),
			'nama_kelas'		=>"",
			'guru_id'			=>"",
			'guru_nama'			=>"",
			'adminData'		 	=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataJurusan'	 	=> $this->primary_model->getAnd('tb_jurusan','jurusan_id','!=0','jurusan_id'),
			'dataMurid' 		=> $this->primary_model->get('tb_murid','murid_id'),
			'activeThn' 		=> $activeThn,
			'thn_ajaran_id' 	=>$thn_id,
		
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit kelas
	public function edit($id)
	{
		$kelas_id = $id;
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$kelasData = $this->primary_model->getDataRelasiBy('tb_kelas','tb_guru','tb_kelas.guru_id','tb_guru.guru_id','kelas_id',$kelas_id);
		foreach($kelasData as $rowData)
		{
			
		}
		
		$row = array(
			'kajur' => 0,
		);
		$data = array(
			'judul' => "kelas Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit kelas",
			'url' =>"kelas/update",
			'tbutton' => 'update data',
			'subPage' => "edit kelas",
			'content' =>'data/form_kelas',
			'kelas_id'=>$rowData->kelas_id,
			'kelas_nama'=>$rowData->kelas_nama,
			'kelas_singkat'=>$rowData->kelas_singkat,
			'akreditasi'=>$rowData->akreditasi,
			'guru_nama'=>$rowData->guru_nama,
			'guru_id'=>$rowData->guru_id,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataGuru' => $this->kelas_model->getByAnd('tb_guru','kajur =0','guru_id !=0','guru_id'),
			
			
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
			'kelas_singkat' => $this->input->post('kelas_singkat'),
			'kelas_nama' => $this->input->post('kelas_nama'),
			'akreditasi' => $this->input->post('akreditasi'),
			'tgl_insert' => $tgl_insert,
		);
		$id_guru = $this->input->post('guru_id');
		$guruUpdate=array(
			'kajur' => 1,
		);
		
			$insert =$this->primary_model->insertData('tb_kelas',$data);
			$this->primary_model->updateData('guru_id',$id_guru,'tb_guru',$guruUpdate);
			redirect('kelas');
		*/
			$id = $this->input->post('dataSiswa');
			$table = "tb_kelas";
			$tingkat_id= $this->input->post('tingkat_id');
			$thn_ajaran_id= $this->input->post('thn_ajaran_id');

			for($i=0;$i<count($id);$i++){
				$sql = "insert into $table(tingkat_id,thn_ajaran_id,murid_id) VALUES('$tingkat_id','$thn_ajaran_id','$id[$i]')";
				$this->db->query($sql);
			}
			redirect("kelas");

			

	}

	//metode untuk update data
	public function update()
	{
		$tgl_update = date('Y-m-d H-i-s');
		$data = array(
			'guru_id' => $this->input->post('guru_id'),
			'kelas_singkat' => $this->input->post('kelas_singkat'),
			'kelas_nama' => $this->input->post('kelas_nama'),
			'akreditasi' => $this->input->post('akreditasi'),
			'tgl_update' => $tgl_update,
		);
		//indikator
		$id_kelas = $this->input->post('kelas_id');
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
			$this->primary_model->updateData('kelas_id',$id_kelas,'tb_kelas',$data);
			redirect('kelas');
		}
		else{
		
		
			$this->primary_model->updateData('kelas_id',$id_kelas,'tb_kelas',$data);
			$this->primary_model->updateData('guru_id',$id_guru_awal,'tb_guru',$nonKajur);
			$this->primary_model->updateData('guru_id',$id_guru,'tb_guru',$kajur);
			redirect('kelas');
		}
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$guru_id = array(
			'guru_id' => $id,
		);
		$alldata=$this->primary_model->getDataBy('tb_kelas',$guru_id);
		foreach($alldata as $d)
		{
			$kelas_id = $d->kelas_id;
		}
		$nonKajur = array(
			'kajur' => 0,
		);
		$update = array('kelas_id' =>0,);
		$this->primary_model->deleteData('tb_kelas',$guru_id);
		$this->primary_model->updateData('guru_id',$id,'tb_guru',$nonKajur);
		$this->primary_model->updateData('kelas_id',$kelas_id,'tb_murid',$update);
		redirect('kelas');
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
				'kelas_id' => 0,
			);
			if($deleteData == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$id = $this->input->post('GURUID');
				$this->primary_model->remove_checked($id,'guru_id','tb_kelas');
				$this->primary_model->update_checked($id,'guru_id','tb_guru',$data);
				$datakelas = $this->primary_model->show_checked($id,'guru_id','tb_kelas');
				foreach($datakelas as $d)
				{
					echo  $d->kelas_id;
				}
				$this->primary_model->update_checked($kelas_id,'kelas_id','tb_murid',$datajur);
				redirect('kelas');
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
					'judul' => "kelas Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'url' => "kelas/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak kelas",
					'guruID' => $GURUID,
					'content' =>'data/form_kelas_multi',
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
		$kelas_nama = $this->input->post('kelas_nama');
		$kelas_singkat = $this->input->post('kelas_singkat');
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
	
	//metode tambah kelas
	
	
}

/* End of file kelas.php */
/* Location : ./application/modules/kelas/controllers/kelas.php */