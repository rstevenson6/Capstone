<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
    $this->load->library('form_validation');
		$this->load->model('db_model');
	}

	public function index()
	{
		$this->load->library('encryption');
		$this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('landing');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$res = $this->db_model->loadUser($username);
			if ($res->num_rows() < 1) {
				$this->load->view('landing', ['error'=>'No user foud with that username.']);
			} else if ($res->num_rows() > 1) {
				echo "Error 2";
				throw new Exception("Error: found more than one user with username - ".$username);
			} else {
				$user_array = $res->result_array();
				$plainpass = $this->encryption->decrypt($user_array[0]['pass']);

				if ($password === $plainpass) {
					$_SESSION['logged_in'] = TRUE;
					$_SESSION['user'] = $username;
					redirect('timetable');
				} else {
					$this->load->view('landing', ['error'=>'Incorrect password.']);
				}
			}
		}
	}

	public function timetable()
  {
		$this->isLoggedIn();

    $this->load->view('timetable');
  }

	public function checkbox()
	{
		$this->isLoggedIn();

		$this->load->view('checkbox');
	}

	public function upload()
	{
		$this->isLoggedIn();

		$this->load->view('upload_form', array('error' => ''));
	}

	public function do_upload()
	{
		$this->isLoggedIn();

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

	public function logout()
	{
		$this->isLoggedIn();

		unset($_SESSION);
	}

	private function isLoggedIn()
	{
		if (!$this->session->userdata('logged_in')) {
			redirect('main/index');
		}
	}

	public function testE()
	{
		var_dump($this->db_model->loadUser('admin')->result_array());
	}
}
