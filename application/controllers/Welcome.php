<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// TODO: LDAP integration with login
		$this->load->library('users');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->helper('form');
    $this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
    //$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('landing');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password'); // unused for now
			$data['msg'] = $this->users->validateUser($username);
			$this->load->view('temp/display', $data);
		}
	}
}
