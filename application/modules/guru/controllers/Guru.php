<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('primary_model');
		$this->load->model('guru_model');
	}
	
	public function index()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		
		$not ='!=0';
	
		$data = array(
			'judul' => "guru Page",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'subPage' => "guru",
			'content' =>'data/content_guru',
			'adminData' => $this->primary_model->getDataBy('tb_user_admin',$where),
			'guru' => $this->primary_model->getAnd('tb_guru','guru_id',$not,'guru_id')
		);
		
		$this->load->view('views',$data);
	}
	
	//metode tambah guru
	public function tambah()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$data = array(
			'judul' => "guru Tambah",
			'head' => "template/header",
			'pageTitle' => "Master Data",
			'titleForm' => "Tambah guru",
			'url' => "guru/nextData",
			'tbutton' => 'Simpan Data',
			'subPage' => "tambah guru",
			'content' =>'data/form_tambah_guru',
			'guru_id' 					=> "",
			'nip_guru' 					=> "",
			'nidn'						=> "",
			'nama_guru'					=> "",
			'pendidikan'				=> "",
			'thn_masuk'					=> "",
			'mapel_diampu'				=> "",
			'jurusan_nama'				=> "",
			'jurusan_singkat'			=> "",
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
			'no_hp_guru'				=> "",
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
			'mapel' => $this->primary_model->get('tb_mapel','mapel_id'),
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
			'guru_nip' 					=> $this->input->post('guru_nip'),
			'guru_nidn'					=> $this->input->post('guru_nidn'),
			'guru_nama'					=> $this->input->post('guru_nama'),
			'guru_status'				=> $this->input->post('guru_status'),
			'thn_masuk'					=> $this->input->post('thn_masuk'),
			'mapel_id'					=> $this->input->post('mapel_id'),
			);
			$insert =$this->primary_model->insertData('tb_guru',$data);
		
		$d=array(
			'guru_nip' 					=> $this->input->post('guru_nip'),
		);
		$guru=$this->primary_model->getDataBy('tb_guru',$d);
		foreach($guru as $z)
		{
			$gid=$z->guru_id;
		}
		
		redirect('guru/data_guru/'.$gid);
	}
	//metode edit guru
	public function data_guru($gid)
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);
		$xdata = array('guru_id' => $gid);
		$x= $this->primary_model->getDataBy('tb_guru',$xdata);
		foreach($x as $j)
		{
			$maid = $j->mapel_id;
		}
		$guruData = $this->guru_model->getDataRelasiBy('tb_guru','tb_mapel','tb_guru.mapel_id','tb_mapel.mapel_id','tb_guru.guru_id','tb_mapel.mapel_id',$gid,$maid);
		foreach($guruData as $row)
		{	
		}
		$idMapel = 'mapel_id !='. $row->mapel_id; 
		$idAgama = 'agama_id ='. $row->agama_id; 
		$idAgamaNot = 'agama_id !='. $row->agama_id; 
		
		$agamaData =$this->primary_model->getDataBy('tb_agama',$idAgama);
		foreach($agamaData as $rowAgama)
		{
		}
		
		
		
		$data = array(
			'judul' 					=> "Guru Update",
			'head' 						=> "template/header",
			'pageTitle' 				=> "Master Data",
			'titleForm' 				=> "Update Data guru",
			'url' 						=> "guru/update",
			'tbutton' 					=> "Simpan Data",
			'subPage'					=> "update guru",
			'content' 					=>'data/form_guru',
			'guru_id' 					=> $row->guru_id,
			'guru_nip' 					=> $row->guru_nip,
			'guru_nidn'					=> $row->guru_nidn,
			'guru_nama'					=> $row->guru_nama,
			'foto'						=> $row->foto,
			'guru_status'				=> $row->guru_status,
			'thn_masuk'					=> $row->thn_masuk,
			'pendidikan'				=> $row->pendidikan,
			'mapel_id'					=> $row->mapel_id,
			'mapel_nama'				=> $row->mapel_nama,
			'tempat_lahir'				=> $row->tempat_lahir,
			'tgl_lahir'					=> $row->tgl_lahir,
			'agama_id'					=> $row->agama_id,
			'gender'					=> $row->gender,
			'gol_darah'					=> $row->gol_darah,
			'provinsi'					=> $row->provinsi,
			'kabupaten'					=> $row->kabupaten,
			'kecamatan'					=> $row->kecamatan,
			'desa'						=> $row->desa,
			'rt'						=> $row->rt,
			'rw'						=> $row->rw,
			'no_hp'						=> $row->no_hp,
			'guru_email'				=> $row->guru_email,
			'adminData'					=> $this->primary_model->getDataBy('tb_user_admin',$where),
			'agama' 					=> $this->primary_model->getDataBy('tb_agama',$idAgamaNot),
			'mapel_diampu'				=> $this->primary_model->getDataBy('tb_mapel',$idMapel),
			'agama_nama'				=> $rowAgama->agama,
		);
		
		$this->load->view('views',$data);
	}
	
	
	//metode untuk update data
	public function update()
	{
		$redirect ="";
		$uri3=$this->input->post('uri3');
		$uri4=$this->input->post('uri4');
		if($this->input->post('saveOnly'))
		{
			$redirect="guru/data_guru/".$this->input->post('guru_id');
		}else
		{
			$redirect="guru";
		}
		$data = array(
			'guru_nip' 					=> $this->input->post('guru_nip'),
			'guru_nidn'					=> $this->input->post('guru_nidn'),
			'guru_nama'					=> $this->input->post('guru_nama'),
			'guru_status'				=> $this->input->post('guru_status'),
			'thn_masuk'					=> $this->input->post('thn_masuk'),
			'pendidikan'				=> $this->input->post('pendidikan'),
			'mapel_id'					=> $this->input->post('mapel_id'),
			'tempat_lahir'				=> $this->input->post('tempat_lahir'),
			'tgl_lahir'					=> $this->input->post('tgl_lahir'),
			'agama_id'					=> $this->input->post('agama_id'),
			'gender'					=> $this->input->post('gender'),
			'gol_darah'					=> $this->input->post('gol_darah'),
			'provinsi'					=> $this->input->post('provinsi'),
			'kabupaten'					=> $this->input->post('kabupaten'),
			'kecamatan'					=> $this->input->post('kecamatan'),
			'desa'						=> $this->input->post('desa'),
			'rt'						=> $this->input->post('rt'),
			'rw'						=> $this->input->post('rw'),
			'no_hp'						=> $this->input->post('no_hp'),
			'guru_email'				=> $this->input->post('guru_email'),
		);
		$guru_id= $this->input->post('guru_id');
			$this->primary_model->updateData('guru_id',$guru_id,'tb_guru',$data);
			redirect($redirect);
		
	
	}
	
	//metode untuk menghapus data
	public function hapus($id)
	{
		$guru_id = array(
			'guru_id' => $id,
		);
		$this->primary_model->deleteData('tb_guru',$guru_id);
		$update = array('guru_id' =>0);
		$this->primary_model->updateData('guru_id',$id,'tb_jurusan',$update);
		redirect('guru');
	}
	
	//metode untuk crud data lebih dari satu
	public function multi()
	{
		if($this->input->post('hapusBanyak'))
		{
			$deleteData =count($this->input->post('guru_id'));
			if($deleteData == 0)
			{
				echo "pilih data yang ingin di hapus ";
			}else
			{
				$id = $this->input->post('guru_id');
				$this->primary_model->remove_checked($id,'guru_id','tb_guru');
				$data=array('guru_id' => 0);
				$this->primary_model->update_checked($id,'guru_id','tb_jurusan',$data);
				redirect('guru');
			}
		}
		elseif($this->input->post('suntingBanyak'))
		{
			
			$dataid =count($this->input->post('guru_id'));
			if($dataid == 0)
			{
				echo "pilih data dulu";
			}else
			{
				$guru_id =$this->input->post('guru_id');
				$where = array(
					'admin_username' => $this->session->userdata('adminUsername'),
					'admin_password' => $this->session->userdata('adminPassword')
				);
				
				$data = array(
					'judul' => "guru Edit",
					'head' => "template/header",
					'pageTitle' => "Master Data",
					'titleForm' => "Edit guru",
					'url' => "guru/multi_update",
					'tbutton' => 'update data',
					'subPage' => "edit banyak guru",
					'guru_id' => $guru_id,
					'content' =>'data/form_guru_multi',
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
		$guru_id = $this->input->post('guru_id');
		$guru = $this->input->post('guru');
	
		for($i =0;$i < count($guru_id); $i++)
		{
			$query = "update tb_guru set guru='$guru[$i]' WHERE guru_id = ".$guru_id[$i];
			$this->db->query($query);
			
		}
		
		redirect('guru');
		
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
		$guru_id = $this->input->post('guru_id');
		$nmfile=time();
		$path ='./data/guru/';
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
			'guru_id' => $guru_id,
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
		$guru_id = $this->input->post('guru_id');
		$dataImg =array('guru_id' => $guru_id);
		$imgAwal = $this->primary_model->getDataBy('tb_guru',$dataImg);
		foreach($imgAwal as $z)
		{
			$link = $z->foto;
		}
		if(!empty($link))
		{
			//definisi direkotir foto yang sudah ada
			$dir ='data/guru/photo/'.$link;
			//hapus foto murid yang sudah ada;
			unlink($dir);
		}
		
		//definisi direktori dan nama foto
        $path = $this->input->post('path')."/".$this->input->post('foto');
		
		
		$new_path = './data/guru/photo';
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
			$this->primary_model->updateData('guru_id',$guru_id,'tb_guru',$nameFoto);
			$this->session->set_flashdata('msgFoto',' Success update foto');
            redirect("guru/data_guru/".$guru_id);
        }
    
	}
	
	//metode untuk menghapus foto
	public function hapusFoto($id)
	{
		$guru_id = array(
			'guru_id' => $id,
		);
		$x = $this->primary_model->getDataBy('tb_guru',$guru_id);
		foreach($x as $m)
		{
			$foto=$m->foto;
		}
		$dir ="data/guru/photo/".$foto;
		unlink($dir);
		$data=array('foto' => '');
		$this->primary_model->updateData('guru_id',$id,'tb_guru',$data);
		$this->session->set_flashdata('msgFoto','Foto berhasil di hapus');
		redirect('guru/data_guru/'.$id);
		
	}
	
}

/* End of file guru.php */
/* Location : ./application/modules/guru/controllers/guru.php */