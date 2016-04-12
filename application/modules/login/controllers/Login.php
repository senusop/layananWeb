<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('array','captcha'));
		$this->load->model('mlogin');
		
	}
	
	public function index()
	{
		
		
		$data['judul']="Login User";
		$data['head']=$this->load->view('template/header');
		//sesi captcha
		$text = ucfirst(random_element($this->config->item('captcha_word')));
		$number = random_element($this->config->item('captcha_num'));
		$word =$text.$number;
			$this->load->helper('captcha');
			$vals = array(
				'img_path'	 => './captcha/',
                'img_url'	 => base_url().'captcha/',
                'img_width'	 => '200',
				'font_path' => './system/fonts/texb.TTF',
                'img_height' => 40,
                'border' => 1, 
				'word' => $word,
                'expiration' => 7200,
			);
			
			//create captcha image
			$cap = create_captcha($vals);
			//store image html code in a variabel
			$data['captcha'] = $cap['image'];
			//store the captcha word in a session
			$this->session->set_userdata('mycaptcha', $cap['word']);
		//end captcha
		$this->load->view('tampilLogin',$data);
		
	}
	
	//METHOD ACTION
	public function action()
	{
		
		$data=array(
			'admin_username' => $this->input->post('login-username'),
			'admin_password' => md5($this->input->post('login-password')),
		);
		
		$result=$this->mlogin->cek_data($data,'tb_user_admin');
		if($result){
		foreach($result as $row)
		{
		
			if($this->input->post('login-code') == $this->session->userdata('mycaptcha'))
			{
				$sesArray = array();
				$sessArray = array(
					'adminID' => $row->admin_id,
					'adminUsername' => $row->admin_username,
					'adminPassword' => $row->admin_password,
				);
				//create session
					$this->session->set_userdata($sessArray);
					
						redirect('dashboard');
			}	
				elseif($this->input->post('login-code') != $this->session->userdata('mycaptcha'))
				{
					$this->session->set_flashdata('message',' Kode Salah');
					redirect('login');
				}

		}
		}else
		{
			$this->session->set_flashdata('message',' username dan password salah');
			redirect('login');
		}
		
	}
	
	//METHOD LOGOUT
		function logout()
		{
			
			$this->session->unset_userdata('adminID');
			$this->session->unset_userdata('adminUsername');
			$this->session->unset_userdata('adminPassword');
			
		 
			redirect('login');
		}

}

/* End of file login.php */
/* Location : ./application/modules/login/controllers/login.php */