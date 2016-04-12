<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Jadwal_monitoring extends CI_Controller
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
			'judul' => "jadwal_monitoring Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "jadwal_monitoring prakerin",
			'content' =>'data/content_jadwal_monitoring',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'jadwal_monitoring' => $this->primary_model->getRelasiMore("tb_monitoring","tb_thn_ajaran","tb_pembimbing","tb_monitoring.thn_ajaran_id = tb_thn_ajaran.thn_ajaran_id","tb_monitoring.pembimbing_id = tb_pembimbing.pembimbing_id"),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah jadwal_monitoring
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$not ='!=0';
		$data = array(
			'judul' 				=> "jadwal_monitoring Tambah",
			'head' 					=> "template/header",
			'pageTitle'	 			=> "Master Data",
			'titleForm' 			=> "Tambah jadwal_monitoring",
			'url' 					=> "jadwal_monitoring/simpan",
			'tbutton' 				=> "Simpan Data",
			'subPage' 				=> "tambah jadwal_monitoring prakerin",
			'content'				=> "data/form_jadwal_monitoring",
			'jadwal_monitoring_id'			=> "",
			'nama_jadwal_monitoring'			=> "",
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
	
	//metode edit jadwal_monitoring
	public function edit($id)
	{
		$id_jadwal_monitoring = array(
			'jadwal_monitoring_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$jadwal_monitoringData = $this->primary_model->getDataRelasiBy('tb_jadwal_monitoring','tb_jenis_jadwal_monitoring','tb_jadwal_monitoring.jenis_jadwal_monitoring_id','tb_jenis_jadwal_monitoring.jenis_jadwal_monitoring_id','jadwal_monitoring_id',$id);
		foreach($jadwal_monitoringData as $rowData)
		{
			
		}
		$data = array(
			'judul' 				=> "jadwal_monitoring Edit",
			'head' 					=> "template/header",
			'pageTitle' 			=> "Master Data",
			'titleForm' 			=> "Edit jadwal_monitoring",
			'url' 					=>"jadwal_monitoring/update",
			'tbutton' 				=> 'Simpan Data',
			'subPage' 				=> "edit jadwal_monitoring",
			'content'				=>'data/form_jadwal_monitoring',
			'jadwal_monitoring_id'			=>$rowData->jadwal_monitoring_id,
			'nama_jadwal_monitoring'		=>$rowData->nama_jadwal_monitoring,
			'pimpinan_jadwal_monitoring'	=>$rowData->pimpinan_jadwal_monitoring,
			'jenis_jadwal_monitoring_id'	=>$rowData->jenis_jadwal_monitoring_id,
			'jenis_jadwal_monitoring'		=>$rowData->jenis_jadwal_monitoring,
			'alamat_jadwal_monitoring'		=>$rowData->alamat_jadwal_monitoring,
			'no_tlp'				=>$rowData->no_tlp,
			'adminData' 			=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'jenis' 				=> $this->primary_model->getAnd('tb_jenis_jadwal_monitoring','jenis_jadwal_monitoring_id','!=0','jenis_jadwal_monitoring_id'),
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
			$redirect="jadwal_monitoring/tambah";
		}else
		{
			$redirect="jadwal_monitoring";
		}
		$data = array(
			'murid_id'			=>$this->input->post('murid_id'),
			'perusahaan_id'		=>$this->input->post('perusahaan_id'),
		);
			$insert =$this->primary_model->insertData('tb_jadwal_monitoring_prakerin',$data);
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
			$redirect="jadwal_monitoring/edit/".$uri3."/".$uri4;
		}else
		{
			$redirect="jadwal_monitoring";
		}
		$data = array(
			'jadwal_monitoring_id'			=>$this->input->post('jadwal_monitoring_id'),
			'nama_jadwal_monitoring'		=>$this->input->post('nama_jadwal_monitoring'),
			'pimpinan_jadwal_monitoring'	=>$this->input->post('pimpinan_jadwal_monitoring'),
			'jenis_jadwal_monitoring_id'	=>$this->input->post('jenis_jadwal_monitoring_id'),
			'alamat_jadwal_monitoring'		=>$this->input->post('alamat_jadwal_monitoring'),
			'no_tlp'				=>$this->input->post('no_tlp'),
		);
		$jadwal_monitoring_id= $this->input->post('jadwal_monitoring_id');
			$this->primary_model->updateData('jadwal_monitoring_id',$jadwal_monitoring_id,'tb_jadwal_monitoring',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$jadwal_monitoring_id = array(
			'jadwal_monitoring_id' => $id,
		);
		$this->primary_model->deleteData('tb_jadwal_monitoring',$jadwal_monitoring_id);
		redirect('jadwal_monitoring');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('jadwal_monitoring_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('jadwal_monitoring_id');
				$this->primary_model->remove_checked($id,'jadwal_monitoring_id','tb_jadwal_monitoring');
				redirect('jadwal_monitoring');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('jadwal_monitoring_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$jadwal_monitoring_id =$this->input->post('jadwal_monitoring_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "jadwal_monitoring Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit jadwal_monitoring",
					'url' => "jadwal_monitoring/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak jadwal_monitoring",
					'jadwal_monitoring_id' => $jadwal_monitoring_id,
					'content' =>'data/form_jadwal_monitoring_multi',
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
		$jadwal_monitoring_id = $this->input->post('jadwal_monitoring_id');
		$jadwal_monitoring = $this->input->post('jadwal_monitoring');
	
		for($i =0;$i < count($jadwal_monitoring_id); $i++)
		{
			$query = "update tb_jadwal_monitoring set jadwal_monitoring='$jadwal_monitoring[$i]' WHERE jadwal_monitoring_id = ".$jadwal_monitoring_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('jadwal_monitoring');
		
	}
	
}

/* End of file jadwal_monitoring.php */
/* Location : ./application/modules/jadwal_monitoring/controllers/jadwal_monitoring.php */