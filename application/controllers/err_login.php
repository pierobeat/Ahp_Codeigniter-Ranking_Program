<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class err_login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
  }

	public function index()
	{
		$this->load->view('admin/v_err_login');
	}
}
?>
