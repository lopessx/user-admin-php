<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		$this->load->view('login');
	}

	public function auth()
	{
		// TODO fix hash auth not working
		$this->load->model('User_model');

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->User_model->get_user_by_email($email);

		if ($user && password_verify($password, $user->password)) {
			$user_data = array(
				'user_id' => $user->id,
				'name' => $user->name,
				'email' => $user->email,
				'logged_in' => true
			);
			$this->session->set_userdata($user_data);

			redirect('profile/user/' . $user->id);
		} else {
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
