<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('admin/v_login_page');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);

		$cek = $this->m_login->cek_login("tb_users",$where)->num_rows();

		if($cek > 0) {
			$data_session = array(
				'nama' => $username,
				'status' => "login"
			);

			$this->session->set_userdata($data_session);
			redirect("dashboard_admin");
		} else {
			redirect("err_login");
		}
	}

	public function out(){
		$this->session->unset_userdata('logged');
		$this->session->sess_destroy();
		$this->load->view('admin/v_login_page');
	}
}
?>
