<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//redirect ke hal login kalo blm login
		if ($this->session->userdata('status') != 'login') {
			redirect(base_url('login'));	
		}	
	}
	

	public function index()
	{
		$this->blade->view('pages.dashboard');
	}

}
