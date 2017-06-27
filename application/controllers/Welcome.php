<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// TODO: LDAP integration with login
		//$this->load->helper('url_helper');
	}

	public function index()
	{
		$this->load->helper('form');
    $this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

		$this->load->view('landing');
	}
}
