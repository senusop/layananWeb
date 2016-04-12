<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Ajaran extends CI_Controller
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
			'judul' => "Tahun Ajaran Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "tahun ajaran",
			'content' =>'data/content_ajaran',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'ajaran' => $this->primary_model->getAll('tb_thn_ajaran','thn_ajaran_id'),
			'thn_aktif' => $this->primary_model->getAnd('tb_thn_ajaran','status','=1','thn_ajaran_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah ajaran
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$data = array(
			'judul' => "ajaran Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah ajaran",
			'url' =>"ajaran/simpan",
			'tbutton' => 'tambah data',
			'subPage' => "tambah ajaran",
			'content' =>'data/form_ajaran',
			'thn_ajaran_id'=>"",
			'tahun'=>"",
			'semester'=>"",
			'thn_ajaran'=>"",
			'status'=>"",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit ajaran
	public function edit($id)
	{
		$id_ajaran = array(
			'thn_ajaran_id' => $id,
		);
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$ajaranData = $this->primary_model->getDataBy('tb_thn_ajaran',$id_ajaran);
		foreach($ajaranData as $rowData)
		{
			
		}
		$data = array(
			'judul' => "ajaran Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit ajaran",
			'url' =>"ajaran/update",
			'tbutton' => 'update data',
			'subPage' => "edit ajaran",
			'content' =>'data/form_ajaran',
			'thn_ajaran_id' =>$rowData->thn_ajaran_id,
			'tahun' =>$rowData->tahun,
			'thn_ajaran' =>$rowData->thn_ajaran,
			'semester' =>$rowData->semester,
			'status' =>$rowData->status,
			'ajaran' =>$rowData->thn_ajaran,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		$thn = $this->input->post('tahun');
		$tahun = substr($thn,0,4);
		$semester = $this->input->post('semester');
		$thn_ajaran = $tahun.$semester;
		$status = null;
		if($status == null)
		{
			$sts=0;
		}
		else
		{
			$sts=1;
		}
		$data = array(
			'tahun' => $thn,
			'semester' => $semester,
			'thn_ajaran' => $thn_ajaran,
			'status' => $sts,
		);
			$insert =$this->primary_model->insertData('tb_thn_ajaran',$data);
			redirect('ajaran');
	}

	//metode untuk update data
	public function update()
	{
		$thn = $this->input->post('tahun');
		$tahun = substr($thn,0,4);
		$semester = $this->input->post('semester');
		$thn_ajaran = $tahun.$semester;
		
		$data = array(
			'tahun' => $thn,
			'semester' => $semester,
			'thn_ajaran' => $thn_ajaran,
		);
		$id= $this->input->post('thn_ajaran_id');
			$this->primary_model->updateData('thn_ajaran_id',$id,'tb_thn_ajaran',$data);
			redirect('ajaran');
		
	
	}
	//metode untuk update thn ajaran aktif
	public function update_akttif($id)
	{
		$thn_id = $id;
		$show = $this->primary_model->getAnd('tb_thn_ajaran','status','=1','thn_ajaran_id');
		if($show ==true)
		{
			foreach($show as $a)
			{
				$id2=$a->thn_ajaran_id;
			}
			$data =array("status" => 0,);
			$this->primary_model->updateData('thn_ajaran_id',$id2,'tb_thn_ajaran',$data);
		}
		
		$update = array("status" => 1,);
		$updating =$this->primary_model->updateData('thn_ajaran_id',$thn_id,'tb_thn_ajaran',$update);
	
			redirect("ajaran");
	
		
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$ajaran_id = array(
			'thn_ajaran_id' => $id,
		);
		$this->primary_model->deleteData('tb_thn_ajaran',$ajaran_id);
		redirect('ajaran');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('thn_ajaran_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('thn_ajaran_id');
				$this->primary_model->remove_checked($id,'thn_ajaran_id','tb_thn_ajaran');
				redirect('ajaran');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('ajaran_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$ajaran_id =$this->input->post('ajaran_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "ajaran Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit ajaran",
					'url' => "ajaran/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak ajaran",
					'ajaran_id' => $ajaran_id,
					'content' =>'data/form_ajaran_multi',
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
		$ajaran_id = $this->input->post('ajaran_id');
		$ajaran = $this->input->post('ajaran');
	
		for($i =0;$i < count($ajaran_id); $i++)
		{
			$query = "update tb_ajaran set ajaran='$ajaran[$i]' WHERE ajaran_id = ".$ajaran_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('ajaran');
		
	}
	
}

/* End of file ajaran.php */
/* Location : ./application/modules/ajaran/controllers/ajaran.php */