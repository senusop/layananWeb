<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Kajur extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('kajur_model');
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
		 $table1="tb_kajur";
		 $table2="tb_thn_ajaran";
		 $table3="tb_jurusan";
		 $table4="tb_guru";
		 $where1="tb_kajur.thn_ajaran_id";
		 $where2="tb_thn_ajaran.thn_ajaran_id";
		 $where3="tb_kajur.jurusan_id";
		 $where4="tb_jurusan.jurusan_id";
		 $where5="tb_kajur.guru_id";
		 $where6="tb_guru.guru_id";
		 $desc="kajur_id";
		 $kondisi="kajur_id !=0";
		$data = array(
			'judul' => "kajur Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "kajur",
			'content' =>'data/content_kajur',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'datakajur' => $this->kajur_model->getRelasiAnd($table1,$table2,$table3,$table4,$where1,$where2,$where3,$where4,$where5,$where6,$kondisi,$desc)
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah kajur
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
			'judul' => "kajur Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah kajur",
			'url' =>"kajur/simpan",
			'tbutton' => 'tambah data',
			'subPage' => "tambah kajur",
			'content' =>'data/form_kajur',
			'kajur_id'=>"",
			'thn_ajaran_id'=>"",
			'tahun'=>"",
			'jurusan_id'=>"",
			'jurusan_nama'=>"",
			'guru_id'=>"",
			'guru_nama'=>"",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataGuru' => $this->kajur_model->getByAnd('tb_guru','guru_id !=0','guru_id'),
			'dataJurusan' => $this->primary_model->getAnd('tb_jurusan','jurusan_id','!=0','jurusan_id'),
			'activeThn' => $activeThn,
			'thn_ajaran_id' =>$thn_id,
			
		
			
		);
		
		$this->load->view('views',$data);
	}
	
	//metode edit kajur
	public function edit($id)
	{
		$kajur_id = $id;
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
		 $table1="tb_kajur";
		 $table2="tb_thn_ajaran";
		 $table3="tb_jurusan";
		 $table4="tb_guru";
		 $where1="tb_kajur.thn_ajaran_id";
		 $where2="tb_thn_ajaran.thn_ajaran_id";
		 $where3="tb_kajur.jurusan_id";
		 $where4="tb_jurusan.jurusan_id";
		 $where5="tb_kajur.guru_id";
		 $where6="tb_guru.guru_id";
		 $desc="kajur_id";
		 $kondisi="kajur_id =".$kajur_id;
		 
		 $kajur = $this->kajur_model->getRelasiAnd($table1,$table2,$table3,$table4,$where1,$where2,$where3,$where4,$where5,$where6,$kondisi,$desc);
		 foreach($kajur as $k)
		 {
			 $k_id = $k->kajur_id;
			 $th_id = $k->thn_ajaran_id;
			 $th = $k->tahun;
			 $j_id = $k->jurusan_id;
			 $j_nama = $k->jurusan_nama;
			 $g_id = $k->guru_id;
			 $g_nama = $k->guru_nama;
		 }
	
		
		$row = array(
			'kajur' => 0,
		);
		$data = array(
			'judul' => "kajur Edit",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Edit kajur dari",
			'url' =>"kajur/update",
			'tbutton' => 'update data',
			'subPage' => "edit kajur",
			'content' =>'data/form_kajur',
			'kajur_id'=>$k_id,
			'thn_ajaran_id'=>$th_id,
			'tahun'=>$th,
			'jurusan_id'=>$j_id,
			'jurusan_nama'=>$j_nama,
			'guru_id'=> $g_id,
			'guru_nama'=> $g_nama,
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'dataGuru' => $this->kajur_model->getByAnd('tb_guru','kajur =0','guru_id !=0','guru_id'),
			'dataJurusan' => $this->primary_model->getAnd('tb_jurusan','jurusan_id','!=0','jurusan_id'),
			'activeThn' => $activeThn,
			'thn_ajaran_id' =>$thn_id,
			
			
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk menyimpan data
	public function simpan()
	{
		$tgl_insert = date('Y-m-d H-i-s');
		$data = array(
			'thn_ajaran_id' => $this->input->post('thn_ajaran_id'),
			'jurusan_id' => $this->input->post('jurusan_id'),
			'guru_id' => $this->input->post('guru_id'),
			'tgl_insert' => $tgl_insert,
		);
		$id_guru = $this->input->post('guru_id');
		$guruUpdate=array(
			'kajur' => 1,
		);
		
			$insert =$this->primary_model->insertData('tb_kajur',$data);
			$this->primary_model->updateData('guru_id',$id_guru,'tb_guru',$guruUpdate);
			redirect('kajur');
	}

	//metode untuk update data
	public function update()
	{
		$tgl_update = date('Y-m-d H-i-s');
		$data = array(
			'thn_ajaran_id' => $this->input->post('thn_ajaran_id'),
			'jurusan_id' => $this->input->post('jurusan_id'),
			'guru_id' => $this->input->post('guru_id'),
			'tgl_update' => $tgl_update,
		);
		//indikator
		$id_kajur = $this->input->post('kajur_id');
			$this->primary_model->updateData('kajur_id',$id_kajur,'tb_kajur',$data);
			redirect('kajur');

	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$kajur_id = array(
			'kajur_id' => $id,
		);
	
		
		$this->primary_model->deleteData('tb_kajur',$kajur_id);

		redirect('kajur');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('kajur'));
			if($deleteData == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$id = $this->input->post('kajur');
				$this->primary_model->remove_checked($id,'kajur_id','tb_kajur');
				
				redirect('kajur');
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
					'judul' => "kajur Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'url' => "kajur/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak kajur",
					'guruID' => $GURUID,
					'content' =>'data/form_kajur_multi',
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
		//menangkap iabel inputan
		$kajur_nama = $this->input->post('kajur_nama');
		$kajur_singkat = $this->input->post('kajur_singkat');
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
	
	//metode tambah kajur
	
	
}

/* End of file kajur.php */
/* Location : ./application/modules/kajur/controllers/kajur.php */