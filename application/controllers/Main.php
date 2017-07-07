<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// TODO: LDAP integration with login
	}

	public function index()
	{
        $this->load->library('users');

		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('landing');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password'); // unused for now
			$data['msg'] = $this->users->getUserRole($username);
			$this->load->view('temp/display', $data);
		}
	}

	public function timetable()
    {
        $this->load->view('timetable');
    }

    public function dbtest()
    {
        $this->load->database();
        $this->load->view('dbtest');
    }
}
