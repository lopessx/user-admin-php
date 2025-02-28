<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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
		$this->load->view('register');
	}

	public function new()
	{
		$this->load->model('User_model');
		$this->load->model('Address_model');

		$dataUser = [
			'fullname'     => $this->input->post('name'),
			'email'    => $this->input->post('email'),
			'password_hash' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'active'   => '1'
		];
		$idUser = $this->User_model->store($dataUser);

		$dataAddress = [
			'zipcode' => $this->input->post('zipcode'),
			'state' => $this->input->post('state'),
			'city' => $this->input->post('city'),
			'street' => $this->input->post('street'),
			'number' => $this->input->post('number'),
			'user_id' => $idUser
		];
		
		$resultAddress = $this->Address_model->store($dataAddress);

		if ($resultAddress) {
			$user_data = array(
				'user_id' => $idUser,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'logged_in' => true
			);
			$this->session->set_userdata($user_data);

			redirect('profile/user/' . $idUser);
		} else {
			echo 'Error on register';
		}
	}
}
