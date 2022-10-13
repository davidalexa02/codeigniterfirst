<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('includes/header');
		$this->load->view('home.php');
		// $this->load->view('includes/footer');
	}

	function registerNow()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				$id = $this->db->insert_id();
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$data = array(
					'id' => $id,
					'username' => $username,
					'email' => $email,
					'password' => sha1($password),
					'status' => '1'
				);

				$this->load->model('user_model');
				$this->user_model->insertuser1($data);
				$this->session->set_flashdata('success', 'Utilizator creat cu succes');
				redirect(base_url('welcome/index'));
			} else {
				$this->session->set_flashdata('error', 'Completeaza toate campurile');
				redirect(base_url('welcome/register'));
				// $this->session->set_flashdata('error', 'Adresa de email este deja inregistrata');
				// redirect(base_url('welcome/register'));
			}
		}
	}

	function createNow()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('username', 'User Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				$id = $this->db->insert_id();
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$data = array(
					'id' => $id,
					'username' => $username,
					'email' => $email,
					'password' => sha1($password),
					'status' => '1'
				);

				$this->load->model('user_model');
				$this->user_model->insertuser1($data);
				$this->session->set_flashdata('success', 'Utilizator creat cu succes');
				redirect(base_url('users/index'));
			} else {
				$this->session->set_flashdata('error', 'Completeaza toate campurile');
				redirect(base_url('welcome/register'));
				// $this->session->set_flashdata('error', 'Adresa de email este deja inregistrata');
				// redirect(base_url('welcome/register'));
			}
		}
	}

	public function login()
	{
		// $this->load->view('includes/header');
		$this->load->view('login.php');
		// $this->load->view('includes/footer');
	}

	function loginnow()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run() == TRUE) {
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$password = sha1($password);

				$this->load->model('user_model');
				$status = $this->user_model->checkPassword($password, $email);
				if ($status != false) {
					$username = $status->username;
					$email = $status->email;
					$session_data = array(
						'username' => $username,
						'email' => $email,
					);

					$this->session->set_userdata('UserLoginSession', $session_data);

					redirect(base_url('users/index'));
				} else {
					$this->session->set_flashdata('error', 'Emailul sau parola sunt gresite');
					redirect(base_url('welcome/login'));
				}
			} else {
				$this->session->set_flashdata('error', 'Completeaza toate campurile');
				redirect(base_url('welcome/login'));
			}
		}
	}

	public function register()
	{
		// $this->load->view('includes/header');
		$this->load->view('register.php');
		// $this->load->view('includes/footer');
	}
}
