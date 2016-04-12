<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//load model primary_model
		$this->load->model('primary_model');


	}
	
	public function index()
	{
		$where = array(
			'admin_username' => $this->session->userdata('adminUsername'),
			'admin_password' => $this->session->userdata('adminPassword')
		);

	
		$data = array(
			'judul'		 	=> "Admin Page",
			'head'		 	=> "template/header",
			'pageTitle' 	=> "Dashboard",
			'subPage' 		=> "Welcome Administrator",
			'content' 		=>'data/content',
			'adminData' 	=> $this->primary_model->getDataBy('tb_user_admin',$where),
		);
		
		$this->load->view('views',$data);
	}
}

/* End of file dashboard.php */
/* Location : ./application/modules/dashboard/controllers/dashboard.php */