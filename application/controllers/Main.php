<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
    $this->load->library('form_validation');
	}

	public function index()
	{
    $this->load->library('users');
		$this->load->library('ldap');
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

			$this->ldap->connect();

			$msg = "";
			$msg .= $this->users->getUserRole($username)."<br />";
			$msg .= $this->ldap->auth_ldap($username,$password)."<br />";

			$data['msg'] = $msg;
			print_r($msg);

			//$this->load->view('temp/display', $data);
			//$this->load->view('timetable', $data);
		}
	}

	public function timetable()
    {
        $this->load->view('timetable');
    }

	public function checkbox()
	{
		$this->load->model('db_model');
		$this->load->view('checkbox');
	}

	public function upload()
	{
		$this->load->view('upload_form', array('error' => ''));
	}

	public function do_upload()
	{
		$config['upload_path'] 		= './files/';
		$config['allowed_types']	= 'xlsx';
		$config['overwrite']	= 'TRUE';
		$config['file_name']	= 'edplan.xlsx';
		$this->load->library('upload', $config);
		$this->load->helper('file');

		if (!$this->upload->do_upload('userfile'))
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
		else
		{
			// file uploaded
			$data = $this->upload->data();
			echo var_dump($data);
			echo $filepath = './files/'.$data['file_name'];
			$_SESSION['file'] = $filepath;
			// do import
			redirect('excel/import');
		}
	}
}
