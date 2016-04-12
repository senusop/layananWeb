<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Jadwal_prakerin extends CI_Controller
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
			'judul' => "jadwal_prakerin Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "jadwal_prakerin prakerin",
			'content' =>'data/content_jadwal_prakerin',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'jadwal_prakerin' => $this->primary_model->getRelasiMore("tb_jadwal_prakerin","tb_thn_ajaran","tb_peserta_prakerin","tb_jadwal_prakerin.thn_ajaran_id = tb_thn_ajaran.thn_ajaran_id","tb_jadwal_prakerin.peserta_id = tb_peserta_prakerin.peserta_id"),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah jadwal_prakerin
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
			'content' 			=> 'data/form_jadwal_prakerin',
			'kajur_id'			=>"",
			'thn_ajaran_id'		=>"",
			'tahun'				=>"",
			'jurusan_id'		=>"",
			'tingkat_id'		=>$this->primary_model->get('tb_tingkat','tingkat_id'),
			'nama_kelas_wali'	=>"",
			'guru_id'			=>"",
			'guru_nama'			=>"",
			'adminData'		 	=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'peserta'	 		=> $this->primary_model->getRelasiMore("tb_peserta_prakerin","tb_murid","tb_perusahaan","tb_peserta_prakerin.murid_id = tb_murid.murid_id","tb_peserta_prakerin.perusahaan_id = tb_perusahaan.perusahaan_id"),
			'activeThn' 		=> $activeThn,
			'thn_ajaran_id' 	=>$thn_id,
		
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit jadwal_prakerin
	public function edit($id)
	{
		$id_jadwal_prakerin = array(
			'jadwal_prakerin_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$jadwal_prakerinData = $this->primary_model->getDataRelasiBy('tb_jadwal_prakerin','tb_jenis_jadwal_prakerin','tb_jadwal_prakerin.jenis_jadwal_prakerin_id','tb_jenis_jadwal_prakerin.jenis_jadwal_prakerin_id','jadwal_prakerin_id',$id);
		foreach($jadwal_prakerinData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "jadwal_prakerin Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit jadwal_prakerin",
			'url' 					=>"jadwal_prakerin/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit jadwal_prakerin",
			'content'				=>'data/form_jadwal_prakerin',
			'jadwal_prakerin_id'			=>$rowData->jadwal_prakerin_id,
			'nama_jadwal_prakerin'		=>$rowData->nama_jadwal_prakerin,
			'pimpinan_jadwal_prakerin'	=>$rowData->pimpinan_jadwal_prakerin,
			'jenis_jadwal_prakerin_id'	=>$rowData->jenis_jadwal_prakerin_id,
			'jenis_jadwal_prakerin'		=>$rowData->jenis_jadwal_prakerin,
			'alamat_jadwal_prakerin'		=>$rowData->alamat_jadwal_prakerin,
			'no_tlp'				=>$rowData->no_tlp,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 				=> $this->primary_model->getAnd('tb_jenis_jadwal_prakerin','jenis_jadwal_prakerin_id','!=0','jenis_jadwal_prakerin_id'),
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
			$redirect="jadwal_prakerin/tambah";
		}else
		{
			$redirect="jadwal_prakerin";
		}
		$data = array(
			'murid_id'			=>$this->input->post('murid_id'),
			'perusahaan_id'		=>$this->input->post('perusahaan_id'),
		);
			$insert =$this->primary_model->insertData('tb_jadwal_prakerin_prakerin',$data);
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
			$redirect="jadwal_prakerin/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="jadwal_prakerin";
		}
		$data = array(
			'jadwal_prakerin_id'			=>$this->input->post('jadwal_prakerin_id'),
			'nama_jadwal_prakerin'		=>$this->input->post('nama_jadwal_prakerin'),
			'pimpinan_jadwal_prakerin'	=>$this->input->post('pimpinan_jadwal_prakerin'),
			'jenis_jadwal_prakerin_id'	=>$this->input->post('jenis_jadwal_prakerin_id'),
			'alamat_jadwal_prakerin'		=>$this->input->post('alamat_jadwal_prakerin'),
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
		$jadwal_prakerin_id= $this->input->post('jadwal_prakerin_id');
			$this->primary_model->updateData('jadwal_prakerin_id',$jadwal_prakerin_id,'tb_jadwal_prakerin',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$jadwal_prakerin_id = array(
			'jadwal_prakerin_id' => $id,
		);
		$this->primary_model->deleteData('tb_jadwal_prakerin',$jadwal_prakerin_id);
		redirect('jadwal_prakerin');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('jadwal_prakerin_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('jadwal_prakerin_id');
				$this->primary_model->remove_checked($id,'jadwal_prakerin_id','tb_jadwal_prakerin');
				redirect('jadwal_prakerin');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('jadwal_prakerin_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$jadwal_prakerin_id =$this->input->post('jadwal_prakerin_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "jadwal_prakerin Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit jadwal_prakerin",
					'url' => "jadwal_prakerin/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak jadwal_prakerin",
					'jadwal_prakerin_id' => $jadwal_prakerin_id,
					'content' =>'data/form_jadwal_prakerin_multi',
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
		$jadwal_prakerin_id = $this->input->post('jadwal_prakerin_id');
		$jadwal_prakerin = $this->input->post('jadwal_prakerin');
	
		for($i =0;$i < count($jadwal_prakerin_id); $i++)
		{
			$query = "update tb_jadwal_prakerin set jadwal_prakerin='$jadwal_prakerin[$i]' WHERE jadwal_prakerin_id = ".$jadwal_prakerin_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('jadwal_prakerin');
		
	}
	
}

/* End of file jadwal_prakerin.php */
/* Location : ./application/modules/jadwal_prakerin/controllers/jadwal_prakerin.php */