<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
    parent::__construct();
    $this->load->model('m_login');
  }

  public function index()
  {
    $this->load->view('login');
  }

  public function aksi_login()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('pass');

    $where = array('username' => $username, 'password' => md5($password));

    $cek = $this->m_login->cek_login("t_user",$where)->num_rows();
    if ($cek > 0) {

      $data_session = array(
				'nama' => $username,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
      redirect(base_url('dashboard'));
    } else {
  		redirect(base_url('login'));
    }
    

  }

  public function logout()
  {
    $this->session->sess_destroy();
		redirect(base_url('login'));
  }
}
