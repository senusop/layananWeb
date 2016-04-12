<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Murid extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('murid_model');
	}
	
	public function index()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		
	
		$data = array(
			'judul' => "Murid Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "murid",
			'content' =>'data/content_murid',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'murid' => $this->primary_model->getAll('tb_murid','murid_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah murid
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$data = array(
			'judul' => "murid Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'url' => "murid/nextData",
			'titleForm' => "Tambah murid",
			'tbutton' => 'Simpan Data',
			'subPage' => "tambah murid",
			'content' =>'data/form_tambah_murid',
			'murid_id' 					=> "",
			'no_induk' 					=> "",
			'nisn'						=> "",
			'nama_lengkap'				=> "",
			'nama_panggilan'			=> "",
			'angkatan'					=> "",
			'tempat_lahir'				=> "",
			'tgl_lahir'					=> "",
			'gender'					=> "",
			'gol_darah'					=> "",
			'agama_id'					=> "",
			'agama_nama'				=> "",
			'provinsi'					=> "",
			'kabupaten'					=> "",
			'kecamatan'					=> "",
			'desa'						=> "",
			'rt'						=> "",
			'rw'						=> "",
			'tlp_rumah'					=> "",
			'no_hp_murid'				=> "",
			'kode_pos'					=> "",
			'email'						=> "",
			'sd_asal'					=> "",
			'alamat_sd'					=> "",
			'thn_lulus_sd'				=> "",
			'smp_mts_asal'				=> "",
			'alamat_smp_mts'			=> "",
			'thn_lulus_smp_mts'			=> "",
			'nama_lengkap_ibu'			=> "",
			'pekerjaan_ibu'				=> "",
			'pendidikan_ibu'			=> "",
			'nama_lengkap_ayah'			=> "",
			'pekerjaan_ayah'			=> "",
			'pendidikan_ayah'			=> "",
			'alamat_ortu'				=> "",
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'agama' => $this->primary_model->get('tb_agama','agama_id'),
		);
		
		$this->load->view('views',$data);
	}
	
	//metode data lanjut
	public function nextData()
	{
		$where = array(
		'admin_username' => $this->session->userdata('adminUsername'),
		'admin_password' => $this->session->userdata('adminPassword')
		);
		
		$data = array(
			'no_induk' 					=> $this->input->post('no_induk'),
			'nisn'						=> $this->input->post('nisn'),
			'nama_lengkap'				=> $this->input->post('nama_lengkap'),
			'nama_panggilan'			=> $this->input->post('nama_panggilan'),
			'angkatan'					=> $this->input->post('angkatan'),
			);
			$insert =$this->primary_model->insertData('tb_murid',$data);
		
		$d=array(
			'no_induk' 					=> $this->input->post('no_induk'),
		);
		$murid=$this->primary_model->getDataBy('tb_murid',$d);
		foreach($murid as $z)
		{
			$mid=$z->murid_id;
		}
		
		redirect('murid/data_murid/'.$mid);
	}
	
	//metode edit murid
	public function data_murid($mid)
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		
		$d = array("murid_id" => $mid,);
		$muridData = $this->primary_model->getDataBy('tb_murid',$d);
		foreach($muridData as $row)
		{	
		$idAgama = 'agama_id ='. $row->agama_id; 
		$idAgamaNot = 'agama_id !='. $row->agama_id; 
		} 
		
		
		$agamaData =$this->primary_model->getDataBy('tb_agama',$idAgama);
		foreach($agamaData as $rowAgama)
		{
		}
		
		
		
		$data = array(
			'judul' 					=> "Murid Data",
			'head' 						=> "template/header",
			'pageTitle' 				=> "Master Data",
			'titleForm' 				=> "Update Data Murid",
			'url' 						=> "murid/update",
			'tbutton' 					=> "Simpan Data",
			'subPage'					=> "update murid",
			'content' 					=>'data/form_murid',
			'murid_id' 					=> $row->murid_id,
			'no_induk' 					=> $row->no_induk,
			'nisn'						=> $row->nisn,
			'nama_lengkap'				=> $row->nama_lengkap,
			'nama_panggilan'			=> $row->nama_panggilan,
			'foto'						=> $row->foto,
			'angkatan'					=> $row->angkatan,
			'tempat_lahir'				=> $row->tempat_lahir,
			'tgl_lahir'					=> $row->tgl_lahir,
			'gender'					=> $row->gender,
			'gol_darah'					=> $row->gol_darah,
			'agama_id'					=> $row->agama_id,
			'provinsi'					=> $row->provinsi,
			'kabupaten'					=> $row->kabupaten,
			'kecamatan'					=> $row->kecamatan,
			'desa'						=> $row->desa,
			'rt'						=> $row->rt,
			'rw'						=> $row->rw,
			'tlp_rumah'					=> $row->tlp_rumah,
			'no_hp_murid'				=> $row->no_hp_murid,
			'kode_pos'					=> $row->kode_pos,
			'email'						=> $row->email,
			'sd_asal'					=> $row->sd_asal,
			'alamat_sd'					=> $row->alamat_sd,
			'thn_lulus_sd'				=> $row->thn_lulus_sd,
			'smp_mts_asal'				=> $row->smp_mts_asal,
			'alamat_smp_mts'			=> $row->alamat_smp_mts,
			'thn_lulus_smp_mts'			=> $row->thn_lulus_smp_mts,
			'nama_lengkap_ibu'			=> $row->nama_lengkap_ibu,
			'pekerjaan_ibu'				=> $row->pekerjaan_ibu,
			'pendidikan_ibu'			=> $row->pendidikan_ibu,
			'nama_lengkap_ayah'			=> $row->nama_lengkap_ayah,
			'pekerjaan_ayah'			=> $row->pekerjaan_ayah,
			'pendidikan_ayah'			=> $row->pendidikan_ayah,
			'alamat_ortu'				=> $row->alamat_ortu,
			'adminData'					=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'agama' 					=> $this->primary_model->getDataBy('tb_agama',$idAgamaNot),
			'agama_nama'				=> $rowAgama->agama,
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
			$redirect="murid/tambah";
		}else
		{
			$redirect="murid";
		}
		
		$data = array(
			'no_induk' 					=> $this->input->post('no_induk'),
			'nisn'						=> $this->input->post('nisn'),
			'nama_lengkap'				=> $this->input->post('nama_lengkap'),
			'nama_panggilan'			=> $this->input->post('nama_panggilan'),
			'angkatan'					=> $this->input->post('angkatan'),
			'tempat_lahir'				=> $this->input->post('tempat_lahir'),
			'tgl_lahir'					=> $this->input->post('tgl_lahir'),
			'gender'					=> $this->input->post('gender'),
			'gol_darah'					=> $this->input->post('gol_darah'),
			'agama_id'					=> $this->input->post('agama_id'),
			'provinsi'					=> $this->input->post('provinsi'),
			'kabupaten'					=> $this->input->post('kabupaten'),
			'kecamatan'					=> $this->input->post('kecamatan'),
			'desa'						=> $this->input->post('desa'),
			'rt'						=> $this->input->post('rt'),
			'rw'						=> $this->input->post('rw'),
			'tlp_rumah'					=> $this->input->post('tlp_rumah'),
			'no_hp_murid'				=> $this->input->post('no_hp_murid'),
			'kode_pos'					=> $this->input->post('kode_pos'),
			'email'						=> $this->input->post('email'),
			'sd_asal'					=> $this->input->post('sd_asal'),
			'alamat_sd'					=> $this->input->post('alamat_sd'),
			'thn_lulus_sd'				=> $this->input->post('thn_lulus_sd'),
			'smp_mts_asal'				=> $this->input->post('smp_mts_asal'),
			'alamat_smp_mts'			=> $this->input->post('alamat_smp_mts'),
			'thn_lulus_smp_mts'			=> $this->input->post('thn_lulus_smp_mts'),
			'nama_lengkap_ibu'			=> $this->input->post('nama_lengkap_ibu'),
			'pekerjaan_ibu'				=> $this->input->post('pekerjaan_ibu'),
			'pendidikan_ibu'			=> $this->input->post('pendidikan_ibu'),
			'nama_lengkap_ayah'			=> $this->input->post('nama_lengkap_ayah'),
			'pekerjaan_ayah'			=> $this->input->post('pekerjaan_ayah'),
			'pendidikan_ayah'			=> $this->input->post('pendidikan_ayah'),
			'alamat_ortu'				=> $this->input->post('alamat_ortu'),
			
		);
			$insert =$this->primary_model->insertData('tb_murid',$data);
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
			$redirect="murid/data_murid/".$uri3."/".$uri4;
		}else
		{
			$redirect="murid";
		}
		$data = array(
			'murid_id' 					=> $this->input->post('murid_id'),
			'no_induk' 					=> $this->input->post('no_induk'),
			'nisn'						=> $this->input->post('nisn'),
			'nama_lengkap'				=> $this->input->post('nama_lengkap'),
			'nama_panggilan'			=> $this->input->post('nama_panggilan'),
			'angkatan'					=> $this->input->post('angkatan'),
			'tempat_lahir'				=> $this->input->post('tempat_lahir'),
			'tgl_lahir'					=> $this->input->post('tgl_lahir'),
			'gender'					=> $this->input->post('gender'),
			'gol_darah'					=> $this->input->post('gol_darah'),
			'agama_id'					=> $this->input->post('agama_id'),
			'provinsi'					=> $this->input->post('provinsi'),
			'kabupaten'					=> $this->input->post('kabupaten'),
			'kecamatan'					=> $this->input->post('kecamatan'),
			'desa'						=> $this->input->post('desa'),
			'rt'						=> $this->input->post('rt'),
			'rw'						=> $this->input->post('rw'),
			'tlp_rumah'					=> $this->input->post('tlp_rumah'),
			'no_hp_murid'				=> $this->input->post('no_hp_murid'),
			'kode_pos'					=> $this->input->post('kode_pos'),
			'email'						=> $this->input->post('email'),
			'sd_asal'					=> $this->input->post('sd_asal'),
			'alamat_sd'					=> $this->input->post('alamat_sd'),
			'thn_lulus_sd'				=> $this->input->post('thn_lulus_sd'),
			'smp_mts_asal'				=> $this->input->post('smp_mts_asal'),
			'alamat_smp_mts'			=> $this->input->post('alamat_smp_mts'),
			'thn_lulus_smp_mts'			=> $this->input->post('thn_lulus_smp_mts'),
			'nama_lengkap_ibu'			=> $this->input->post('nama_lengkap_ibu'),
			'pekerjaan_ibu'				=> $this->input->post('pekerjaan_ibu'),
			'pendidikan_ibu'			=> $this->input->post('pendidikan_ibu'),
			'nama_lengkap_ayah'			=> $this->input->post('nama_lengkap_ayah'),
			'pekerjaan_ayah'			=> $this->input->post('pekerjaan_ayah'),
			'pendidikan_ayah'			=> $this->input->post('pendidikan_ayah'),
			'alamat_ortu'				=> $this->input->post('alamat_ortu'),
		);
		$murid_id= $this->input->post('murid_id');
			$this->primary_model->updateData('murid_id',$murid_id,'tb_murid',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$murid_id = array(
			'murid_id' => $id,
		);
		$this->primary_model->deleteData('tb_murid',$murid_id);
		redirect('murid');
	}
	
	//metode untuk menghapus foto
	public function hapusFoto($id)
	{
		$murid_id = array(
			'murid_id' => $id,
		);
		$x = $this->primary_model->getDataBy('tb_murid',$murid_id);
		foreach($x as $m)
		{
			$foto=$m->foto;
		}
		$dir ="data/murid/photo/".$foto;
		unlink($dir);
		$data=array('foto' => '');
		$this->primary_model->updateData('murid_id',$id,'tb_murid',$data);
		$this->session->set_flashdata('msgFoto','Foto berhasil di hapus');
		redirect('murid/data_murid/'.$id);
		
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('murid_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('murid_id');
				$this->primary_model->remove_checked($id,'murid_id','tb_murid');
				redirect('murid');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('murid_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$murid_id =$this->input->post('murid_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "murid Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit murid",
					'url' => "murid/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak murid",
					'murid_id' => $murid_id,
					'content' =>'data/form_murid_multi',
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
		$murid_id = $this->input->post('murid_id');
		$murid = $this->input->post('murid');
	
		for($i =0;$i < count($murid_id); $i++)
		{
			$query = "update tb_murid set murid='$murid[$i]' WHERE murid_id = ".$murid_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('murid');
		
	}
	
	
	//METHOD UNTUK PENANGANAN WILAYAH
	
	public function provinsi()
	{
        $term =$this->input->get('term',TRUE);
		$query = "SELECT nama FROM provinsi WHERE nama LIKE '%".$term."%'";
		$row=$this->db->query($query)->result();
		$provinsi = array();
		foreach($row as $p)
		{
			$provinsi[] = array(
				'label'=>$p->nama,
			);
		}
		echo json_encode($provinsi);
		
    }
	
	public function kabupaten()
	{
        $term =$this->input->get('term',TRUE);
		$query = "SELECT nama FROM kabupaten WHERE nama LIKE '%".$term."%'";
		$row=$this->db->query($query)->result();
		$kab = array();
		foreach($row as $k)
		{
			$kab[] = array(
				'label'=>$k->nama,
			);
		}
		echo json_encode($kab);
    }
    
    public function kecamatan(){
		
		$term =$this->input->get('term',TRUE);
		$query = "SELECT nama FROM kecamatan WHERE nama LIKE '%".$term."%'";
		$row=$this->db->query($query)->result();
		$kec = array();
		foreach($row as $k)
		{
			$kec[] = array(
				'label'=>$k->nama,
			);
		}
		echo json_encode($kec);
    }
    
   public function desa(){
		$term =$this->input->get('term',TRUE);
		$query = "SELECT nama FROM desa WHERE nama LIKE '%".$term."%'";
		$row=$this->db->query($query)->result();
		$des = array();
		foreach($row as $d)
		{
			$des[] = array(
				'label'=>$d->nama,
			);
		}
		echo json_encode($des);
    }
	
	
	//METHOD MENANGANI FOTO
	public function uploadFoto()
	{
		$murid_id= $this->input->post('muridID');
		$nmfile=time();
		$path ='./data/murid/';
		$path_tumb=$path.'temp';
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'jpg|jpeg|gif|png';
		$config['max_size'] = 1024;
		
		$config['file_name'] = $nmfile;
		
		$this->load->library('upload',$config);
		if(!is_dir($path_tumb))
			{
				mkdir($path_tumb, 0755, TRUE);
			}
		
		if($this->upload->do_upload())
		{
				
			$datas = $this->upload->data();
			
			$file = $datas['file_name'];
			$conf['image_library'] = 'gd2';
			$conf['source_image'] = $path.$file;
			$conf['new_image'] = $path."temp/".$file;
			$conf['create_thumb'] = false;
			$conf['maintain_ratio'] = TRUE;
			$conf['width'] = 500;
			$conf['height'] = 700;
			$conf['quality'] = "100%";
		
			$this->load->library('image_lib', $conf); //initialize resize gambar

			$this->image_lib->resize(); //resize gambar
			$remove_img = $path.$file;
		    unlink($remove_img);
			$data= array(
			'murid_id' => $murid_id,
			'foto' => $file,
			'path' => $path_tumb,
			);
		
			$this->load->view('viewCrop',$data);
		}else{
			echo $this->upload->display_errors();
		}
	}
	
	
	
	function cropFoto()
	{		
        $X = $this->input->post('x');
        $Y = $this->input->post('y');
        $W = $this->input->post('w');
        $H = $this->input->post('h');
		$murid_id = $this->input->post('murid_id');
		$dataImg =array('murid_id' => $murid_id);
		$imgAwal = $this->primary_model->getDataBy('tb_murid',$dataImg);
		foreach($imgAwal as $z)
		{
			$link = $z->foto;
		}
		if(!empty($link))
		{
			//definisi direkotir foto yang sudah ada
			$dir ='data/murid/photo/'.$link;
			//hapus foto murid yang sudah ada;
			unlink($dir);
		}
		
		//definisi direktori dan nama foto
        $path = $this->input->post('path')."/".$this->input->post('foto');
		
		
		$new_path = './data/murid/photo';
		if(!is_dir($new_path))
			{
				mkdir($new_path, 0755, TRUE);
			}
		$source = $path;
		
		$config['crop'] =  array(
                  'image_library'   => 'gd2',
                  'maintain_ratio'  =>  FALSE,
                  'width'           =>  $W,
                  'height'          =>  $H,
                 
		);
        $config['image_library'] = 'gd2';
        $config['source_image'] = $source;
        $config['new_image'] = $new_path;
        $config['quality'] = "100%";
        $config['maintain_ratio'] = FALSE;
        $config['width'] = $W;
        $config['height'] = $H;
        $config['x_axis'] = $X;
        $config['y_axis'] = $Y;        
        $this->load->library('image_lib', $config);
 
        if (!$this->image_lib->crop())
        {
            echo $this->image_lib->display_errors();
        }
        else
        {
			unlink($source);
			$nameFoto = array(
			'foto' => $this->input->post('foto'),
			);
			$this->primary_model->updateData('murid_id',$murid_id,'tb_murid',$nameFoto);
			$this->session->set_flashdata('msgFoto',' Success update foto');
            redirect("murid/data_murid/".$murid_id);
        }
    
}
	
}

/* End of file murid.php */
/* Location : ./application/modules/murid/controllers/murid.php */